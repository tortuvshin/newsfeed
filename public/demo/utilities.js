(function ($) {
    var $window = $(window);

    app = window.app || {};

    app.event = {};
    app.util = {};
    app.ajax = {};
    app.form = {};
    app.ui = {};

    /* EVENT START */    
    app.event.NAVIGATING = "navigating.app";
    app.event.MODAL_LOADED = "modal:loaded.app";
    app.event.MODAL_SUBMIT = "modal:submit.app";
    app.event.UI_BINDING_APPLIED = "ui:bound.app";
        
    app.event.AJAXIFY_BEFORE_HANDLE = 'ajaxify:beforeHandle.app';
    app.event.AJAXIFY_AFTER_HANDLE = 'ajaxify:afterHandle.app';
    app.event.AJAXIFY_BEFORE_INSERT = 'ajaxify:beforeInsert.app';
    app.event.AJAXIFY_AFTER_INSERT = 'ajaxify:afterInsert.app';
    app.event.AJAXIFY_BEFORE_APPLY_BINDINGS = 'ajaxify:beforeApplyBindings.app';
    app.event.AJAXIFY_AFTER_APPLY_BINDINGS = 'ajaxify:afterApplyBindings.app';
    app.event.AJAXIFY_NAVIGATING = 'ajaxify:navigating.app';
    app.event.AJAXIFY_NAVIGATED = 'ajaxify:navigated.app';
    app.event.AJAXIFY_ACTIVATED = 'ajaxify:activated.app';
    app.event.AJAXIFY_CLICK = 'ajaxify:click.app';

    FORM_CLICK = "app.form._click";

    app.event.triggerNavigating = function (trigger) {
        var ev = $.Event(app.event.NAVIGATING);

        $window.trigger(ev, trigger);

        return !ev.isDefaultPrevented();
    };
    /* EVENT END */
    
    /* UTIL START */
    app.util.getUrl = function (baseUrl, extraParams) {        
        var url = new Url(baseUrl);
        for (var key in extraParams) {
            if (extraParams[key]) {
                url.query[key] = extraParams[key];
            } else {
                delete url.query[key];
            }            
        }

        return url.toString();
    };

    app.util.getParams = function (input) {
        var extraParams = {};
        var paramName = input.attr('name');
        if (input.attr('data-param-name')) {
            paramName = input.attr('data-param-name');
        }

        if (paramName) {
            extraParams[paramName] = input.val();
        }        

        var params = input.attr('data-params');
        if (params) {
            var paramSelectors = params.split(',');
            for (var i = 0; i < paramSelectors.length; i++) {
                var paramSelector = paramSelectors[i];
                var paramInput = $(paramSelector);
                if (paramInput) {
                    extraParams[paramInput.attr('name')] = paramInput.val();
                }
            }
        }
        return extraParams;
    };

    app.util.lookup = function (array, prop, value) {
        for (var i = 0, len = array.length; i < len; i++)
            if (array[i][prop] === value) return array[i];

        return null;
    };

    app.util.cloneArray = function (arr) {
        var tmp = [];
        for (var i = 0; i < arr.length; i++) {
            tmp.push($.extend(true, {}, arr[i]));
        }
        return tmp;
    };

    app.util.formatBytes = function (bytes, precision) {
        precision = precision || 0;

        var kilobyte = 1024;
        var megabyte = kilobyte * 1024;
        var gigabyte = megabyte * 1024;
        var terabyte = gigabyte * 1024;

        if ((bytes >= 0) && (bytes < kilobyte)) {
            return bytes + ' B';

        } else if ((bytes >= kilobyte) && (bytes < megabyte)) {
            return (bytes / kilobyte).toFixed(precision) + ' KB';

        } else if ((bytes >= megabyte) && (bytes < gigabyte)) {
            return (bytes / megabyte).toFixed(precision) + ' MB';

        } else if ((bytes >= gigabyte) && (bytes < terabyte)) {
            return (bytes / gigabyte).toFixed(precision) + ' GB';

        } else if (bytes >= terabyte) {
            return (bytes / terabyte).toFixed(precision) + ' TB';

        } else {
            return bytes + ' B';
        }
    };
    
    app.util.FileValidator = function (whitelist, size) {
        this.no_file = app.translate.file_empty || 'No File ...';
        this.size = size || (1024 * 1024 * 10); // default 10MB
        this.whitelist = whitelist || 'image';

        if (this.whitelist == 'image') {
            this.whitelist = 'jpe?g|png|gif|bmp';
            this.no_file = app.translate.file_no_file_image || 'Only images (jpg, png, gif, bmp)';
        } else if (this.whitelist == 'document') {
            this.whitelist = 'docx?|xlsx?|pdf';
            this.no_file = app.translate.file_no_file_document || 'Only documents (word, excel, pdf)';
        } else if (this.whitelist == 'video') {
            this.whitelist = 'mpe?g|flv|mov|avi|swf|mp4|mkv|webm|wmv|3gp';
            this.size = 1024 * 1024 * 1024 * 1; // 1GB
            this.no_file = app.translate.file_no_file_video || 'Only videos (mpeg, flv, mov, avi, mp4)';
        } else if (this.whitelist == 'audio') {
            this.whitelist = 'mp3|ogg|wav|wma|amr|aac';
            this.no_file = app.translate.file_no_file_audio || 'Only audios (mp3, ogg, wav, wma)';
        } else {
            this.no_file = '(' + this.whitelist.replace(/\|/g, ', ') + ')';
        }

        this.no_file += ' - ' + app.util.formatBytes(this.size);
    };

    app.util.FileValidator.prototype.validate = function (files) {
        if (this.whitelist == '*') return true;

        var regex1 = new RegExp('\.(' + this.whitelist + ')$', 'i');
        var regex2 = new RegExp('^image\/(' + this.whitelist + ')$', 'i');
        var allowed_files = [];
        for (var i = 0 ; i < files.length; i++) {
            var file = files[i];

            // file = { name: 'file.png', type: 'mimetype', size: 200 }
            // file = 'file.png' for IE and other browsers that don't support File object

            // check extension
            if (typeof file === "string") {
                //IE8 and browsers that don't support File Object
                if (!regexLegacy.test(file)) return false;
            } else {
                // just match file.name
                if (!regex1.test(file.name)) {
                    app.ui.alert((app.translate.file_invalid_ext || 'This file extension is not supported') + ': ' + file.name);

                    continue;
                }

                // check size
                if (file.size > this.size) {
                    app.ui.alert((app.translate.file_invalid_size || 'File size exceeded allowed maximum') + ': ' + app.util.formatBytes(this.size));

                    continue;
                }

                //var type = $.trim(file.type);
                //if ((type.length > 0 && !regex2.test(type))
                //|| (type.length == 0 && !regex1.test(file.name))//for android's default browser which gives an empty string for file.type
                //) continue;//not an image so don't keep this file
            }

            allowed_files.push(file);
        }
        if (allowed_files.length == 0) return false;

        return allowed_files;
    };

    app.util.navigateTo = function (url, refresh) {
        location.href = url;
    };

    app.util.detectScreenResolution = function () {
        if ($.cookies) {
            var stat_sw = $.cookies.get('stat_sw');
            if (stat_sw === null) {
                var width = screen.width || 0;
                var height = screen.height || 0;

                // check for windows off standard dpi screen res
                if (typeof (screen.deviceXDPI) == 'number') {
                    width *= screen.deviceXDPI / screen.logicalXDPI;
                    height *= screen.deviceYDPI / screen.logicalYDPI;
                }

                $.cookies.set('stat_sw', width, { path: '/' });
                $.cookies.set('stat_sh', height, { path: '/' });
            }
        }        
    };

    app.util.getFunction = function getFunction(code, argNames) {
        var fn = window, parts = (code || "").split(".");
        while (fn && parts.length) {
            fn = fn[parts.shift()];
        }
        if (typeof (fn) === "function") {
            return fn;
        }
        argNames.push(code);
        return Function.constructor.apply(null, argNames);
    };

    app.util.Class = (function () {
        var initializing = false, fnTest = /xyz/.test(function () { xyz; }) ? /\b_super\b/ : /.*/;

        // The base Class implementation (does nothing)
        this.Class = function () { };

        // Create a new Class that inherits from this class
        Class.extend = function (prop, klass) {
            var _super = this.prototype;

            // Instantiate a base class (but only create the instance,
            // don't run the init constructor)
            initializing = true;
            var prototype = new this();
            initializing = false;

            // Copy the static properties onto the class
            var global = Class;
            if (klass) {
                for (var name in klass) {
                    if (typeof klass[name] == "function") {
                        global[name] = (function (fn) {
                            return function () {
                                return fn.apply(global, arguments);
                            };
                        })(klass[name]);
                    } else {
                        global[name] = klass[name];
                    }                    
                }
            }

            // Set global class for this prototype
            prototype._class = global;

            // Copy the properties over onto the new prototype
            for (var name in prop) {
                // Check if we're overwriting an existing function
                prototype[name] = typeof prop[name] == "function" &&
                  typeof _super[name] == "function" && fnTest.test(prop[name]) ?
                  (function (name, fn) {
                      return function () {
                          var tmp = this._super;
                          
                          // Add a new ._super() method that is the same method
                          // but on the super-class
                          this._super = _super[name];

                          // The method only need to be bound temporarily, so we
                          // remove it when we're done executing
                          var ret = fn.apply(this, arguments);

                          this._super = tmp;

                          return ret;
                      };
                  })(name, prop[name]) : prop[name];
            }

            // The dummy class constructor
            function Class() {
                // All construction is actually done in the init method
                if (!initializing && this.init) {
                    this.init.apply(this, arguments);
                }                    
            }

            // Populate our constructed prototype object
            Class.prototype = prototype;

            // Enforce the constructor to be what we expect
            Class.prototype.constructor = Class;

            // And make this class extendable
            Class.extend = arguments.callee;

            return Class;
        };

        return this.Class;
    })();

    app.util._waiter = app.util.Class.extend({
        init: function (fnCondition, fnHandler) {
            this._condition = fnCondition;
            this._handler = fnHandler;
            this._timer = null;
            this._counter = 0;
        },
        execute: function () {
            if (this._timer) {
                clearTimeout(this._timer);
                this._timer = null;
            }

            this._counter += 1;

            if (this._counter > 10) {
                return;
            }

            if (this._condition()) {
                this._handler();
            } else {
                this._timer = setTimeout($.proxy(this.execute, this), 200);
            }
        }
    });

    app.util.wait = function (fnCondition, fnHandler) {
        new app.util._waiter(fnCondition, fnHandler).execute();
    };

    app.util.fillHeight = function (selector, extra) {
        var elem = $(selector);
        var viewportHeight = $(window).height();
        var remainingSpace = viewportHeight - (elem.offset().top - $(window).scrollTop());

        remainingSpace += (extra || 0);

        elem.height(remainingSpace);
    };

    /* UTIL END */

    /* AJAX START */    
    app.ajax.start = function (trigger) {
        if (trigger) {            
            var result = app.util.getFunction(trigger.attr('data-ajax-start'), []).apply(this, arguments);
            if (result === false) {
                return;
            }
        }

        NProgress.start();
    };

    app.ajax.progress = function (position, total, percentComplete, trigger) {
        if (trigger) {
            var result = app.util.getFunction(trigger.attr('data-ajax-progress'), []).apply(this, arguments);
            if (result === false) {
                return;
            }
        }

        if (percentComplete >= 0 && percentComplete <= 100) {
            NProgress.set(percentComplete / 100);
        }        
    };

    app.ajax.done = function (trigger) {
        if (trigger) {
            var result = app.util.getFunction(trigger.attr('data-ajax-done'), []).apply(this, arguments);
            if (result === false) {
                return;
            }
        }

        NProgress.done(true);
    };

    app.ajax.send = function (url, data, fnSuccess, fnComplete, ajaxOptions) {
        $.ajax($.extend({}, ajaxOptions, {
            url: url,
            data: data,
            success: function (result) {
                if (fnSuccess) {
                    fnSuccess(result);
                }
            },
            complete: function () {
                if (fnComplete) {
                    fnComplete();
                }                
            }
        }));
    };

    app.ajax.get = function (url, data, fnSuccess, fnComplete, ajaxOptions) {
        app.ajax.send(url, data, fnSuccess, fnComplete, $.extend({}, ajaxOptions, { type: 'GET' }));
    };

    app.ajax.post = function (url, data, fnSuccess, fnComplete, ajaxOptions) {
        if (app.csrf) {
            data = data || {};
            data[app.csrf.getKey()] = app.csrf.getValue();
        }

        app.ajax.send(url, data, fnSuccess, fnComplete, $.extend({}, ajaxOptions, { type: 'POST' }));
    };
    /* AJAX END */

    /* FORM START */
    app.form.submit = function (form, removeAfterSubmit, fnComplete, context) {
        form.submit();

        if (removeAfterSubmit) {
            form.remove();
        }

        if (fnComplete) {
            fnComplete();
        }
    };

    app.form._timer = null;
    app.form.disableButton = function (button) {
        var submit = $(button);        
        if (!submit.attr('disabled')) {            
            submit.attr('disabled', 'disabled');
            submit.data('_disabled', true);
        }
    };
    app.form.enableButton = function (button) {
        var submit = $(button);
        if (submit.data('_disabled') === true) {
            submit.removeAttr('disabled');
            submit.removeData('_disabled');
        }
    };
    app.form.start = function (form) {
        if (app.form._timer) {
            clearTimeout(app.form._timer);

            app.ui.unblock();
        }

        app.form._timer = window.setTimeout(function () {
            app.ui.block($(form).attr('data-block-text') || app.translate.block_text || 'We are processing your request now, please wait few moments ..');
        }, 1000);

        $('[type=submit]', form).each(function () {
            app.form.disableButton(this);
        });

        // if form was submitted via external button
        var trigger = $(form).data(FORM_CLICK);
        if (trigger) {
            trigger = $(trigger);
            if (trigger.length > 0) {
                app.form.disableButton(trigger);
            }
        }
    };

    app.form.done = function (form) {        
        if (app.form._timer) {
            clearTimeout(app.form._timer);

            app.form._timer = null;

            $('[type=submit]', form).each(function () {
                app.form.enableButton(this);
            });

            var trigger = $(form).data(FORM_CLICK);
            if (trigger) {
                trigger = $(trigger);
                if (trigger.length > 0) {
                    app.form.enableButton(trigger);
                }
            }            

            app.ui.unblock();
        }
    };

    app.form.onSubmit = function (form) {
        if (!app.event.triggerNavigating(form)) {
            return false;
        }

        if (form.valid()) {
            app.form.start(form);

            return true;
        }

        return false;
    };
    /* FORM END */

    /* PLUGINS START */
    $.fn.bootstrapifyValidation = function () {
        var caller = this;
        function boostrapHighlight(element) {
            $(element).closest(".form-group").addClass("has-error");
            $(element).trigger('highlated');
        };

        function boostrapUnhighlight(element) {
            $(element).closest(".form-group").removeClass("has-error");
            $(element).trigger('unhighlated');
        };

        caller.each(function (i, o) {
            var validator = $(o).data('validator');
            if (validator) {
                var settings = validator.settings;
                settings.highlight = boostrapHighlight;
                settings.unhighlight = boostrapUnhighlight;
            }
        });

        var vs = caller.find("div.validation-summary-errors");
        var vsParent = vs.parent();

        if (!vsParent.hasClass('disable-alert')) {
            vs.addClass("alert alert-block alert-error");
        }
    };
    /* PLUGINS END */

    $.fn.enableValidation = function (enabled) {
        var caller = this;

        if (enabled) {
            $('[data-disabled="true"]').attr('data-val', 'true');
        } else {
            $('[data-val="true"]').attr('data-val', 'false').attr('data-disabled', 'true');
        }

        this.removeData('unobtrusiveValidation');
        this.removeData('validator');

        $.validator.unobtrusive.parse(this);
    };

    app.ui.startLoading = function (triggers, form) {
        // must return function which will be called to complete loading
        if (!$.isArray(triggers)) {
            triggers = [triggers];
        }

        var doneLoading = [];
        for (var i = 0; i < triggers.length; i++) {
            (function () {
                var trigger = triggers[i];
                if (!trigger.hasClass('disabled')) {
                    trigger.addClass('disabled');
                }

                if (trigger.prop('tagName') === 'select') {
                    var spinner = $('<i class="icon-spinner icon-spin orange bigger-150"></i>');
                    var chosen = update.next('.chosen-container');

                    if (chosen.length > 0) {
                        chosen.after(spinner);
                    } else {
                        trigger.after(spinner);
                    }
                    
                    doneLoading.push(function () {
                        spinner.remove();
                    });
                } else if (trigger.attr('data-action')) {
                    var spinner = $('<i class="icon-spinner icon-spin"></i>');
                    var originalIcon = trigger.find('i');
                    if (originalIcon.length > 0) {
                        originalIcon.hide();
                        trigger.append(spinner);

                        doneLoading.push(function () {
                            spinner.remove();
                            originalIcon.show();
                        });
                    }
                }

                doneLoading.push(function () {
                    trigger.removeClass('disabled');
                });
            })();                        
        }

        return function () {
            for (var i = 0; i < doneLoading.length; i++) {
                doneLoading[i]();
            }
        };
    };

    /* UI START */
    app.ui._blocked = false;
    app.ui._permanent = false;
    app.ui.alert = function (text, title, fnCallback) {
        if (typeof title === 'function') {
            fnCallback = title;
        }

        if ($.gritter) {
            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: title,
                // (string | mandatory) the text inside the notification
                text: text,
                class_name: ''
            });
        } else if (bootbox) {
            bootbox.alert(text, fnCallback);
        } else {
            alert(text);
        }
        
        return false;
    };
    app.ui.confirm = function (text, fnCallback) {
        if (bootbox) {
            bootbox.confirm(text, fnCallback);
        } else {
            var result = confirm(text);
            if (fnCallback) {
                fnCallback(result);
            }
        }
    };
    app.ui.prompt = function (text, fnCallback) {
        if (bootbox) {
            bootbox.prompt(text, fnCallback);
        } else {
            var result = prompt(text);
            if (fnCallback) {
                fnCallback(result);
            }
        }
    };
        
    app.ui.block = function (message, permanent) {
        if (permanent) {
            app.ui._permanent = true;
        }

        $.blockUI({
            message: message,
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .8,
                color: '#fff'
            },
            overlayCSS: {
                opacity: 0
            },
            baseZ: 2000
        });

        app.ui._blocked = true;
    };

    app.ui.unblock = function () {        
        if (app.ui._blocked && !app.ui._permanent) {
            $.unblockUI();

            app.ui._blocked = false;
        }        
    };    

    app.ui.scrollTo = function (elem) {
        // do nothing
    };

    app.ui.openWindow = function (url, width, height, scroll) {
        var l = (screen.width - width) / 2;
        var t = (screen.height - height) / 2;

        winprops = 'resizable=0, height=' + height + ',width=' + width + ',top=' + t + ',left=' + l + 'w';
        if (scroll) winprops += ',scrollbars=1';

        var f = window.open(url, "_blank", winprops);
    };

    app.ui.load = function (trigger, loadInPlace, extraParams, callback) {
        var trigger = $(trigger);
        if (trigger.length > 0) {
            extraParams = extraParams || {};

            var target = !loadInPlace ? ($(trigger.attr('href')) || $(trigger.attr('data-target'))) : trigger;
            var ajax = trigger.attr('data-ajax');
            var cache = trigger.attr('data-cache') || true;
            if (ajax) {
                ajax = app.util.getUrl(ajax, extraParams);

                var load = true;
                var cacheKey = 'content:' + ajax;

                if (cache && trigger.data(cacheKey)) {
                    target.html(trigger.data(cacheKey));
                    load = false;
                }

                if (load) {
                    app.ajax.get(ajax, null, function (html) {
                        trigger.data(cacheKey, html);

                        target.html(html);

                        app.ui.applyBindings(target);

                        if (callback) {
                            callback(trigger);
                        }
                    }, null, {
                        error: function () {
                            target.empty();
                        }
                    });
                } else if (callback) {
                    callback(trigger);
                }
            }
        }
    };

    app.ui.recreateChosen = function (target) {
        target = $(target);
        if (target.chosen) {
            target.chosen('destroy').chosen({ disable_search_threshold: 20 });
        }        
    };

    app.ui._afterShown = [];
    app.ui.addAfterShown = function (fn) {
        app.ui._afterShown.push(fn);
    };

    app.ui.recreateAfterShown = function (target) {        
        $('.chosen-select', target).each(function () {
            app.ui.recreateChosen($(this));
        });        

        app.ui._afterShown.forEach(function (fn) { fn(target); });
    };
    
    app.ui.toggleCheckbox = function (checkbox) {
        var target = $(checkbox).attr('data-toggle');
        var invert = $(checkbox).attr('data-invert');
        if (target) {
            target = $(target);

            var checked = checkbox.checked;
            if (invert) {
                checked = !checked;
            }

            if (checked) {
                target.fadeIn('fast').removeClass('hide');

                app.ui.recreateAfterShown(target);
            } else {
                target.fadeOut('fast');
            }
            
            target.trigger(checked ? 'shown.app' : 'hidden.app', [checkbox]);
        }
    };

    app.ui.handleExecute = function (trigger) {
        var trigger = $(trigger);
        var target = trigger.attr('data-target');
        var action = trigger.attr('data-execute');

        if (target) {
            target = $(target);

            if (action == 'show' && target.is(":visible")) {
                action = 'hide';
            } else if (action == 'hide' && !target.is(":visible")) {
                action = 'show';
            }

            if (action == 'show') {
                target.fadeIn('fast').removeClass('hide');

                app.ui.recreateAfterShown(target);

                target.trigger('shown.app', [trigger]);
            } else if (action == 'hide') {
                target.fadeOut('fast');

                target.trigger('hidden.app', [trigger]);
            } else if (action == 'empty') {
                target.empty();

                target.trigger('emptied.app', [trigger]);
            }
        }
    };

    app.ui.handleRelation = function (group) {
        // you must sort checkboxes in the group (if they are layout correctly and jQuery returns them in order, it is ok)
        // but who knows
        $(group).find('[data-parent]:checkbox').each(function () {
            var me = $(this);
            var parent = $('#' + $(this).attr('data-parent'));
            if (!parent.is(':checked')) {
                me.removeAttr('checked').attr('disabled', '');
            } else {
                me.removeAttr('disabled');
            }

            if (me.is(':checked')) {
                parent.removeAttr('disabled').attr('checked', '');
            }
        });
    };

    app.ui.fillSelect = function (select, url, postData, triggers) {
        select = $(select);

        var spinner = $('<i class="icon-spinner icon-spin orange bigger-150"></i>');
        select.next('.chosen-container').after(spinner);

        postData = postData || {};
        if (app.csrf) {
            postData[app.csrf.getKey()] = app.csrf.getValue();
        }
        postData = app.ui.modal._prepareForm(select, postData);

        var doneLoading = app.ui.startLoading(triggers || [select]);

        app.ajax.send(url, postData, function (items) {
            var optionalLabel = null; //$('option[value=""]', select).text();
            var options = $('option', select);
            for (var i = 0; i < options.length; i++) {
                var v = $(options[i]).attr('value');
                if (v === undefined || v === null || v === '') {
                    optionalLabel = $(options[i]).text();
                    break;
                }
            }

            var html = '';
            select.empty();
            if (optionalLabel) {
                html = '<option value>' + optionalLabel + '</option>';
            }
            for (var i = 0; i < items.length; i++) {
                html += '<option value="' + items[i].id + '">' + items[i].title + '</option>';
            }
            select.html(html);
            select.trigger('chosen:updated');
        }, function () {
            doneLoading();

            spinner.remove();
        }, { type: 'POST', dataType: 'json' });
    };

    app.ui._bindings = [];
    app.ui.addBinding = function (fn) {
        app.ui._bindings.push(fn);
    };

    app.ui.applyBindings = function (scope, skipEnabled) {
        scope = scope || document.body;
        if (skipEnabled == undefined) {
            skipEnabled = true;
        }
        // what if some parts of the scope does not want apply bindings

        if (skipEnabled) {
            var skips = $('.skip-apply-bindings', scope);
            var reverses = [];
            if (skips.length > 0) {
                skips.each(function () {
                    var skip = $(this);
                    skip.wrapAll('<div class="skip-apply-bindings-placeholder"></div>');
                    var wrapper = skip.parent();

                    skip.remove();

                    (function (s, w) {
                        reverses.push(function () {
                            s.appendTo(w);
                            // unwrap method requires condiserable amount of time, so let's just leave it there
                            //s.unwrap();
                        });
                    })(skip, wrapper);
                })
            }
        }        
                
        /* GLOBAL BINDINGS */
        $('form', scope).bootstrapifyValidation();

        $('.ajax-content', scope).each(function () {
            app.ui.load(this, true);
        });
        $('.nav-tabs', scope).each(function () {
            // find active tab
            $(this).find('.active > [data-toggle="tab"]').each(function () {
                $(this).trigger('show.bs.tab');
            });
        });
        $('[data-toggle]:checkbox', scope).each(function () {
            app.ui.toggleCheckbox(this);
        });
        $('[data-toggle]:radio', scope).each(function () {
            app.ui.toggleCheckbox(this);
        });
        $('[data-execute]', scope).each(function () {
            //app.ui.handleExecute(this);
        });
        $('.checkbox-group', scope).each(function () {
            app.ui.handleRelation(this);
        });

        $("img.lazy", scope).show().lazyload({ event: 'scroll lazyScroll' });

        if (app.player) {
            jwplayer.key = app.player.key;
        }        
        $('.video-player', scope).each(function () {
            var me = $(this);
            var options = {};
            if (me.attr('data-options')) {
                options = $.parseJSON(me.attr('data-options'));
                me.removeAttr('data-options');
            }

            options.modes = [
                    { type: 'html5' },
                    { type: 'flash' }
            ];

            jwplayer(this.id).setup(options);
        });

        $('.audio-player', scope).each(function () {
            var me = $(this);
            jwplayer(this.id).setup({
                file: me.attr('data-file'),
                width: 480,
                height: 30
            });
        });
        
        if ($.validator && $.validator.unobtrusive) {
            $.validator.unobtrusive.parse(scope);
        }
        
        app.ui._bindings.forEach(function (fn) { fn(scope); });

        $window.trigger(app.event.UI_BINDING_APPLIED, [scope]);

        for (var i = 0; i < reverses.length; i++) {
            reverses[i]();
        }
    };

    /* UI END */

    /* DETECT SCREEN RESOLUTION */
    app.util.detectScreenResolution();

    /* UI MODAL START */
    app.ui.modal = {};
    app.ui.modal._pool = [];
    app.ui.modal._stack = [];
    
    app.ui.modal.build = function (id, type) {
        var template = '<div class="modal fade app-dialog" id="appdialog' + id + '" tabindex="-1" role="dialog" aria-hidden="true" data-dialog-id="' + id + '">' +
            '<div class="modal-dialog' + (type ? ' ' + type : '') + '">' +
            '<div class="modal-content">' +
                '<div class="modal-header">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                    '<h3 class="modal-title"></h3>' +
                '</div>' +
                '<div class="modal-body" id="appdialog' + id + '_body">' +
                '</div>' +
                '<div class="modal-footer hide">' +
                    '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
                    '<button type="button" class="btn btn-primary">Save changes</button>' +
                '</div>' +
            '</div>' +
            '</div>' +
        '</div>';

        return template;
    };

    app.ui.modal.find = function (id) {        
        if (id.jquery) {
            id = id.attr('data-dialog-id');
        }
        
        var pool = app.ui.modal._pool;
        
        var slot = null;
        for (var i = 0; i < pool.length; i++) {
            if (pool[i]._id == id) {
                slot = pool[i];
                break;
            }
        }

        return slot;
    };

    app.ui.modal.take = function (type) {
        if (type === undefined) {
            type = '';
        }

        var pool = app.ui.modal._pool;

        var slot = null;
        for (var i = 0; i < pool.length; i++) {
            // select only non active, non animating slot
            if (!pool[i].active && !pool[i]._animating && pool[i]._type === type) {
                slot = pool[i];
                break;
            }
        }

        if (slot === null) {
            slot = { ui: null, active: false, visible: false, trigger: null, url: null, _soh: false, _id: (app.ui.modal._pool.length + 1), _type: type, _animating: false };

            slot.ui = $(app.ui.modal.build(slot._id, slot._type));
            slot.ui.appendTo(document.body);
            slot.ui.modal({
                show: false,
                backdrop: false
            }).on('show.bs.modal', function () {
                slot._animating = true;
            }).on('hide.bs.modal', function () {
                slot._animating = true;
            }).on('shown.bs.modal', function () {
                if (slot._animating) {
                    slot.visible = true;
                    slot._animating = false;

                    if (slot._soh) {
                        // show method called
                        slot._soh = false;
                    } else {
                        // open method called
                        //app.ui.modal._stack.unshift(slot);
                    }
                }                
            }).on('hidden.bs.modal', function () {
                if (slot._animating) {
                    slot.visible = false;
                    slot._animating = false;

                    if (slot._soh) {
                        // hide method called
                        slot._soh = false;
                    } else {
                        // ESC key, CLOSE button pressed or close method called
                        app.ui.modal.return2(slot);
                    }
                }                
            });
            
            pool.push(slot);
        }

        return slot;
    };

    app.ui.modal.return2 = function (slot) {
        if (!slot.active) {
            return;
        }

        var stack = app.ui.modal._stack;

        // remove from stack
        var index = -1;
        for (var i = 0; i < stack.length; i++) {
            if (slot == stack[i]) {
                index = i;
                break;
            }
        }

        if (index != -1) {
            stack.splice(index, 1);
        }
        
        if (index === 0) {
            // this is top level item
            if (stack.length > 0) {                
                var top = stack[0];
                if (!top.visible) {
                    app.ui.modal.show(top);
                }
            }
        }

        // reset to default
        slot.active = false;
        slot.visible = false;
        slot.trigger = null;
        slot.url = null;
        slot._soh = false;
        slot._animating = false;
        slot.ui.find('.modal-title,.modal-body').html('&nbsp;');
        slot.ui.find('.modal-footer').hide();
    };

    app.ui.modal.top = function () {
        if (app.ui.modal._stack.length > 0) {
            return app.ui.modal._stack[0];
        }

        return null;
    };

    app.ui.modal.load = function (url, slot) {
        app.ajax.start(slot.trigger);

        slot.ui.find('.modal-body').load(url, function () {
            app.ajax.done(slot.trigger);

            app.ui.modal.onLoaded(url, slot, this);
        });
    };

    app.ui.modal.onLoaded = function (url, slot, html, title) {
        var slotTitle = slot.ui.find('.modal-title');
        slotTitle.html('&nbsp;');

        if (title) {
            slotTitle.html(title);
        }

        var header = $('[data-modal-title]', html);
        if (header.length > 0) {
            slotTitle.html(header.attr('data-modal-title'));
        }

        var slotFooter = slotFooter = slot.ui.find('.modal-footer');

        var form = $('form', html);
        if (form.length > 0) {
            slotFooter.empty();
        }

        var modalActions = $('.modal-action', html);
        if (modalActions.length > 0) {
            slotFooter.empty();
            modalActions.appendTo(slotFooter);

            slotFooter.removeClass('hide').show();
        }

        slot.ui.trigger(app.event.MODAL_LOADED, [slot, html, form]);

        if (form.length > 0) {
            var buttons = form.find('button');
            if (buttons.length > 0) {
                var formActions = buttons.closest('.form-actions');
                if (formActions.length > 0) {
                    formActions.remove();
                } else if (!buttons.parent().is('form')) {
                    buttons.parent().remove();
                } else {
                    buttons.remove();
                }

                buttons.appendTo(slotFooter);

                slotFooter.removeClass('hide').show();

                slotFooter.find('[type="submit"]').on('click', function (e) {
                    form.data(FORM_CLICK, this);

                    slot.ui.trigger(app.event.MODAL_SUBMIT, [slot, html, form, $(this)]);

                    form.submit();
                });

                slotFooter.find('[type="reset"]').on('click', function (e) {
                    form[0].reset();
                });
            }
        }        
    };

    app.ui.modal.open = function (url, trigger) {
        var top = app.ui.modal.top();
        if (top && top.visible) {
            app.ui.modal.hide(top);
        }
                
        var modal = null;
        if (typeof trigger == 'string') {
            modal = trigger;

            trigger = null;
        } else if (trigger instanceof jQuery) {
            modal = trigger.attr('data-modal');
        }

        var slot = app.ui.modal.take(modal);
                
        slot.ui.find('.modal-body').html('Loading ..');

        slot.active = true;
        slot.trigger = trigger;
        slot.url = url;

        app.ui.modal._stack.unshift(slot);

        slot.ui.modal('show');

        app.ui.modal.load(url, slot);

        return slot;
    };

    app.ui.modal.close = function (slot) {
        if (slot === undefined) {
            slot = app.ui.modal.top();
        }

        if (slot && slot.active) {            
            var wasVisible = slot.visible;

            app.ui.modal.return2(slot);

            if (wasVisible) {
                slot.ui.modal('hide');
            }
        }
    };

    app.ui.modal.clear = function () {
        var stack = app.ui.modal._stack;
        for (var i = 0; i < stack.length; i++) {            
            app.ui.modal.close(stack[i]);
        }
    };

    app.ui.modal.show = function (slot) {
        if (slot && slot.active && !slot.visible) {
            slot._soh = true;

            slot.ui.modal('show');
        }
    };

    app.ui.modal.hide = function (slot) {
        if (slot && slot.active && slot.visible) {
            slot._soh = true;

            slot.ui.modal('hide');
        }
    };

    app.ui.modal._prepareForm = function (context, form) {
        var slot = null;
        var modal = context.closest('.app-dialog');
        if (modal.length > 0) {
            slot = app.ui.modal.find(modal);
        }

        if (slot) {
            if (typeof form == 'string') {
                form = form + '<input type="hidden" name="modal" value="true" />';
            } else if (typeof form == 'object') {
                form['modal'] = 'true';
            }
        }

        return form;
    };

    /* UI MODAL END */

    // small fix for app.ready
    var domReady = false;
    app.ready = function (fn) {
        if (domReady) {
            fn();
        } else {
            app._readies.push(fn);
        }
    };
        
    $(function () {
        domReady = true;

        $(document.body).on('click', '[data-modal]', function (e) {
            e.preventDefault();
            
            var trigger = $(this);
            var url = trigger.attr('href') || trigger.attr('data-target');

            if (app.event.triggerNavigating(trigger)) {
                app.ui.modal.open(url, trigger);
            }            
        });

        $(window).on(app.event.AJAXIFY_NAVIGATED, function (e) {
            app.ui.modal.clear();
        });

        $(document).on('change', 'select[data-target],input[data-target]', function () {
            var select = $(this);
            var extraParams = app.util.getParams(select);

            var slot = null;
            var modal = select.closest('.app-dialog');
            if (modal.length > 0) {
                slot = app.ui.modal.find(modal);
            }

            var href = app.util.getUrl($(this).attr('data-target') || (slot ? slot.url : null), extraParams);

            if (select.hasClass('disabled')) {
                return false;
            }

            if (select.attr('data-form')) {
                // use invisible form so that redirect will work                
                var html = '<form method="POST" action="' + href + '" style="display: none">';
                if (app.csrf) {
                    html += app.csrf.input;
                }
                html = app.ui.modal._prepareForm(select, html);
                html += '</form>';
                var form = $(html);
                form.appendTo(document.body);
                
                var doneLoading = app.ui.startLoading(select, form);

                app.form.submit(form, true, function () {
                    doneLoading();
                }, select);
            } else if (select.attr('data-update')) {
                var update = $(select.attr('data-update'));

                app.ui.fillSelect(update, href, null, [select, update]);
            } else if (slot) {               
                app.ui.modal.load(href, slot);
            } else {
                app.util.navigateTo(href);
            }
        });        
        
        $(document.body).on('click', '[data-action]', function (e) {
            var context = this;
            var $this = $(this);
            var action = $this.attr('data-action');
            var url = $this.attr('href') || $this.attr('data-target');
            var id = $this.attr('data-id') || '';
            var methodOverride = $this.attr('data-method') || '';
            var handler = window[$this.attr('data-handler')];
            
            e.preventDefault();

            if (!app.event.triggerNavigating($this) || $this.hasClass('disabled')) {                
                return false;
            }

            var requestType = 'POST';
            var showLoading = false;

            // hook
            if (action === ':ajax') {
                var update = $this.attr('data-update') || '';

                if (update) {                    
                    requestType = 'GET';
                    action = null;
                    id = null;
                    showLoading = true;
                                        
                    var oldHandler = handler;
                    handler = function (result) {
                        var target = $(update);

                        target.html(result);

                        app.ui.applyBindings(target);

                        if (oldHandler) {
                            oldHandler(result);
                        }

                        app.ui.scrollTo(target);
                    };
                }                
            }
            // hook

            var shim = function () {
                if (handler) {
                    $this.attr('disabled', 'disabled');

                    var postData = { };

                    if (action) {
                        postData['item_action'] = action;
                    }
                    if (id !== null && id !== undefined) {
                        postData['id'] = id;
                        postData['item_id'] = id;
                    }

                    if (app.csrf && requestType !== 'GET') {
                        postData[app.csrf.getKey()] = app.csrf.getValue();
                    }

                    if (methodOverride) {
                        postData['X-HTTP-Method-Override'] = methodOverride.toUpperCase();
                    }



                    var extraParams = app.util.getParams($this);
                    for (var key in extraParams) {
                        postData[key] = extraParams[key];
                    }

                    // if it is form element like button then append value
                    var myName = $this.attr('name');
                    if (myName) {
                        postData[myName] = $this.val();
                    }

                    postData = app.ui.modal._prepareForm($this, postData);

                    var doneLoading = app.ui.startLoading($this);
                    if (showLoading) {
                        app.ajax.start();
                    }

                    app.ajax.send(url, postData, function (result) {
                        if (handler) {
                            $.proxy(handler, context)(result);
                        } else {
                            //console.log('no handler with name: ' + handler);
                        }
                    }, function () {
                        doneLoading();

                        $this.removeAttr('disabled');

                        if (showLoading) {
                            app.ajax.done();
                        }
                    }, { type: requestType });
                } else {
                    // use invisible form so that redirect will work                
                    var html = '<form method="POST" action="' + url + '" style="display: none">';
                    if (methodOverride) {
                        html += '<input type="hidden" name="X-HTTP-Method-Override" value="' + methodOverride.toUpperCase() + '" />';
                    }
                    html += '<input type="hidden" name="item_action" value="' + action + '" />';
                    html += '<input type="hidden" name="item_id" value="' + id + '" />';
                    html += '<input type="hidden" name="id" value="' + id + '" />';
                    html = app.ui.modal._prepareForm($this, html);
                    if (app.csrf) {
                        html += app.csrf.input;
                    }

                    var extraParams = app.util.getParams($this);
                    for (var key in extraParams) {
                        html += '<input type="hidden" name="' + key + '" value="' + extraParams[key] + '" />';
                    }

                    html += '</form>';
                    var form = $(html);
                    form.appendTo(document.body);
                    
                    var doneLoading = app.ui.startLoading($this, form);
                    
                    app.form.submit(form, true, function () {
                        doneLoading();
                    }, $this);
                }                
            };
            
            if ($this.attr('data-confirm')) {
                app.ui.confirm($this.attr('data-confirm'), function (result) {
                    if (result) {
                        shim();
                    }
                });
            } else {
                shim();
            }
        });

        $(document.body).on('click', '[data-bulk-action]', function () {
            var $this = $(this);
            var action = $this.attr('data-bulk-action');
            var url = $this.attr('data-bulk-target');
            var min = $this.attr('data-bulk-min') || 1;
            var max = $this.attr('data-bulk-max') || 0;
            var method = $this.attr('data-method') || '';
            
            if (!action || !url) {
                // invalid bulk action
                return;
            }

            if (!app.event.triggerNavigating($this) || $this.hasClass('disabled')) {
                return false;
            }

            var handler = function () {
                var selected = [];
                $('[data-action="' + action + '"]').each(function () {
                    var item = $(this);
                    if (!item.attr('data-id')) {
                        // invalid item
                        return;
                    }

                    var checkboxSelector = '> td > label > input[type="checkbox"]';
                    var bitem = item.closest('tr');
                    if (bitem.length == 0) {
                        bitem = item.closest('.bulk-action-row');
                        checkboxSelector = '.bulk-action-slave input[type="checkbox"]';
                    }

                    if (bitem.find(checkboxSelector).is(':checked')) {
                        var exists = false;
                        for (var i = 0; i < selected.length; i++) {
                            if (item.attr('data-id') == selected[i].attr('data-id')) {
                                exists = true;
                                break;
                            }
                        }

                        if (!exists) {
                            selected.push(item);
                        }                        
                    }
                });
                
                if (selected.length == 0) {
                    app.ui.alert(app.translate.bulk_empty || 'Please select 1 or more items to apply this bulk action');
                    return;
                }

                if (min > 0 && max > 0 && min == max && min != selected.length) {
                    //console.log(app.translate.bulk_equal);
                    app.ui.alert((app.translate.bulk_equal || 'You have to select exactly {0} items to apply this action').replace('{0}', min));
                    return;
                }

                if (min > 0 && selected.length < min) {
                    app.ui.alert((app.translate.bulk_min || 'You have to select at least {0} items to apply this action').replace('{0}', min));
                    return;
                }

                if (max > 0 && selected.length < max) {
                    app.ui.alert((app.translate.bulk_max || 'You have to select at most {0} items to apply this action').replace('{0}', min));
                    return;
                }

                var fnHandlerName = $this.attr('data-handler');
                if (fnHandlerName) {
                    window[fnHandlerName](selected);
                    return;
                }
                
                var html = '<form method="POST" action="' + url + '" style="display: none">';
                if (method) {
                    html += '<input type="hidden" name="X-HTTP-Method-Override" value="' + method.toUpperCase() + '" />';
                }
                html += '<input type="hidden" name="bulk_action" value="' + action + '" />';
                for (var i = 0; i < selected.length; i++) {
                    var item = selected[i];
                    html += '<input type="hidden" name="bulk_values" value="' + item.attr('data-id') + '" />';
                }
                if (app.csrf) {
                    html += app.csrf.input;
                }
                html = app.ui.modal._prepareForm($this, html);
                html += '</form>';
                var form = $(html);
                form.appendTo(document.body);
                
                var doneLoading = app.ui.startLoading(selected, form);

                app.form.submit(form, true, function () {
                    doneLoading();
                }, $this);
            };
            
            if ($this.attr('data-confirm')) {
                app.ui.confirm($this.attr('data-confirm'), function (result) {
                    if (result) {
                        handler();
                    }
                });
            } else {
                handler();
            }
        });        

        $(document.body).on("show.bs.tab", function (e) {
            var $anchor = $(e.target);
            var target = $anchor.attr("href");
            var url = $anchor.attr('data-ajax');
            if (url) {
                var cachedData = $anchor.data('_ajax');
                if (cachedData) {
                    //$(target).html(cachedData);                    
                    return;
                }

                app.ajax.get(url, null, function (data) {
                    $(target).html(data);

                    app.ui.applyBindings($(target));

                    $anchor.data('_ajax', data);
                });
            }            
        });

        $(document.body).on("shown.bs.tab", function (e) {
            app.ui.recreateAfterShown(this);
        });

        $(document.body).on("shown.bs.modal", function (e) {
            app.ui.recreateAfterShown(this);
        });  

        $(document.body).on('click', '[data-toggle]:checkbox', function (e) {
            app.ui.toggleCheckbox(this);
        });

        $(document.body).on('click', '.radio-group :radio', function (e) {            
            var group = $(this).closest('.radio-group');            
            group.find('[data-toggle]:radio').each(function () {
                app.ui.toggleCheckbox(this);                
            });
        });

        $(document.body).on('click', '[data-execute]', function (e) {
            app.ui.handleExecute(this);

            return false;
        });

        $(document.body).on('click', '.checkbox-group :checkbox', function (e) {            
            var group = $(this).closest('.checkbox-group');
            app.ui.handleRelation(group);
        });

        $(document.body).on('submit', 'form', function (e) {            
            return app.form.onSubmit($(this));
        });

        $(window).resize(function () {
            app.ui.recreateAfterShown(document.body);
        });
    });
}(jQuery));
