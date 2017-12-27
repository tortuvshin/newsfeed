(function ($) {
    // prepare our variables
    var
		History = window.History,
		document = window.document;

    if (!app) {
        return false;
    }

    // check to see if History.js is enabled for our Browser
    if ( !History.enabled ) {
        return false;
    }

    // make jQuery.ajax with progress
    //is onprogress supported by browser?
    var hasOnProgress = ("onprogress" in $.ajaxSettings.xhr());

    //If not supported, do nothing
    if (!hasOnProgress) {
        return;
    }

    //patch ajax settings to call a progress callback
    var oldXHR = $.ajaxSettings.xhr;
    $.ajaxSettings.xhr = function () {
        var xhr = oldXHR();
        if (xhr instanceof window.XMLHttpRequest) {
            xhr.addEventListener('progress', this.progress, false);
        }

        if (xhr.upload) {
            xhr.upload.addEventListener('progress', this.progress, false);
        }

        return xhr;
    };

    $.ajaxQ = (function () {
        var id = 0, Q = {};
        $(document).ajaxSend(function (e, jqx) {
            jqx._id = ++id;
            Q[jqx._id] = jqx;
        });
        $(document).ajaxComplete(function (e, jqx) {
            delete Q[jqx._id];
        });

        return {
            abortAll: function () {
                var r = [];
                $.each(Q, function (i, jqx) {
                    r.push(jqx._id);
                    jqx.abort();
                });

                if (r) {
                    $.each(r, function(i, jqx) {
                        delete Q[jqx._id];
                    });
                }
                
                return r;
            },
            abort: function (fn) {
                if (typeof fn != 'function') {
                    var id = fn;

                    fn = function (jqx) { return jqx._id == id };
                }

                var r = null;
                $.each(Q, function (i, jqx) {
                    if (fn(jqx)) {
                        r = jqx;
                        jqx.abort();                                               
                    }
                });

                if (r) {
                    delete Q[r._id];
                }
                return r;
            }
        };
    })();
    
    $(function () {
        var $content = $('#page_container'),
            $window = $(window),
			$body = $(document.body),
			rootUrl = History.getRootUrl(),
            applyScriptsImmediately = true,
            headerKey = 'X-Requested-By',
            headerValue = 'Composer',
            scrollDisabled = $('html').hasClass('disable-scroll'),
			scrollOptions = {
			    duration: 800,
			    easing: 'in'
			};
        
        $.expr[':'].internal = function (obj, index, meta, stack) {
            // prepare
            var
				$this = $(obj),
				url = $this.attr('href') || '',
				isInternalLink;
            
            // check link
            //isInternalLink = (url && url[0] != '#') && (url.indexOf('://') === -1 && url.substring(0, rootUrl.length) === rootUrl);
            isInternalLink = url && url[0] === '/';

            // ignore or keep
            return isInternalLink;
        };

        function getHeaders(requestedBy, type) {
            var headers = {};
            headers[headerKey] = requestedBy || headerValue;

            if (type === 'dialog') {
                headers['X-Page-Url'] = makeRelative(document.location.href);
            } else if (type === 'ajax') {
                headers['X-Page-Type'] = type;
            }

            return headers;
        }

        function makeRelative(url) {
            var relativeUrl = url.replace(rootUrl, '');

            if (relativeUrl && relativeUrl.indexOf('://') === -1 && relativeUrl[0] != '/') {
                relativeUrl = '/' + relativeUrl;
            }

            return relativeUrl;
        };

        function loadUrl(url, title, reload) {
            title = title || null;
            reload = reload || false;

            if (reload) {
                var state = History.getState();                
                if (state && makeRelative(state.url) === makeRelative(url)) {
                    loadPage(state);

                    return;
                }
            }
            
            History.pushState({ ajaxified: true }, title, url);
        };

        function loadPage(state) {
            // check if this state was loaded via ajaxify
            if (state.data && state.data.ajaxified) {
                var relativeUrl = makeRelative(state.url);

                $window.trigger(app.event.AJAXIFY_NAVIGATING, [state.url, relativeUrl]);

                app.ajax.load(state.url).then(function() {
                    $window.trigger(app.event.AJAXIFY_NAVIGATED, [state.url, relativeUrl]);
                });                
            } else {
                document.location.href = state.url;
            }
        };

        function appendUnique(elements, elemName, attrNames, container) {            
            $(elements).filter(elemName).each(function () {                
                var elem = $(this);
                if (!(attrNames instanceof Array)) {
                    attrNames = [attrNames];
                }
                var atLeastOneAttrExists = false;

                for (var i = 0; i < attrNames.length; i++) {
                    var attrName = attrNames[i];
                    var attrValue = elem.attr(attrName);
                    if (attrValue) {
                        var attrSelector = elemName + '[' + attrName + '="' + attrValue + '"]';
                        if ($(attrSelector, container).length == 0) {
                            container.append(elem);

                            console.log('appendUnique: ' + attrSelector);
                        } else {
                            console.log('skip appendUnique: ' + attrSelector + ' already exists');
                        }

                        atLeastOneAttrExists = true;
                        break;
                    }
                }                           
                
                if (!atLeastOneAttrExists && $.trim(elem.html())) {                    
                    $(elemName, container).each(function () {
                        var prev = $(this);
                        
                        if (prev.html() === elem.html()) {
                            prev.remove();
                        }
                    });

                    container.append(elem);
                }
            })
        };

        function prepareCallbacks(callbacks) {
            if (!callbacks) {
                callbacks = {};
            }

            var bh = callbacks.beforeHandle;
            var ah = callbacks.afterHandle;            
            var bi = callbacks.beforeInsert;
            var ai = callbacks.afterInsert;
            var bab = callbacks.beforeApplyBindings;
            var aab = callbacks.afterApplyBindings;

            var bhtml = callbacks.beforeProcessHtml;
            var bpage = callbacks.beforeProcessPage;

            callbacks.beforeHandle = function (data) {
                var result = true;
                if (bh) {
                    result = bh(data);
                }

                $window.trigger(app.event.AJAXIFY_BEFORE_HANDLE, [data]);

                return result;
            };

            callbacks.afterHandle = function (data) {
                $window.trigger(app.event.AJAXIFY_AFTER_HANDLE, [data]);

                if (ah) {
                    ah(data);
                }
            };

            callbacks.beforeProcessHtml = function (data) {
                var result = true;
                if (bhtml) {
                    result = bhtml(data);
                }

                return result;
            };

            callbacks.beforeProcessPage = function (data) {
                var result = true;
                if (bpage) {
                    result = bpage(data);
                }

                return result;
            };

            callbacks.afterInsert = function (data) {
                if (ai) {
                    ai(data);
                }

                $window.trigger(app.event.AJAXIFY_AFTER_INSERT, [data]);
            };

            callbacks.beforeInsert = function (data) {
                var result = true;
                if (bi) {
                    result = bi(data);
                }

                $window.trigger(app.event.AJAXIFY_BEFORE_INSERT, [data]);

                return result;
            };

            callbacks.afterInsert = function (data) {
                if (ai) {
                    ai(data);
                }

                $window.trigger(app.event.AJAXIFY_AFTER_INSERT, [data]);
            };

            callbacks.beforeApplyBindings = function (data) {
                var result = true;
                if (bab) {
                    result = bab(data);
                }

                $window.trigger(app.event.AJAXIFY_BEFORE_APPLY_BINDINGS, [data]);

                return result;
            };

            callbacks.afterApplyBindings = function (data) {
                if (aab) {
                    aab(data);
                }

                $window.trigger(app.event.AJAXIFY_AFTER_APPLY_BINDINGS, [data]);
            };

            return callbacks;
        };

        // this method should return a promise to let caller know the animation has completed
        function animateUpdate(url, update, animationEnabled) {
            if (animationEnabled) {
                var result = app.fx.animate(update, url);
                if (result !== null) {
                    return result;
                }
            }

            var deferred = $.Deferred();
            deferred.resolve();

            if (update.modifier === 'prepend') {
                $('#' + update.targetId).prepend(update.html);
            } else if (update.modifier == 'append') {
                $('#' + update.targetId).append(update.html);
            } else {
                $('#' + update.targetId).html(update.html);
            }

            return deferred.promise();
        };

        // callbacks (beforeInsert, afterInsert, beforeApplyBindings, afterApplyBindings)
        // returns Promise
        function updateSection(url, updates, callbacks, ev, updateCsrf, scrollTarget, transitTarget) {
            var appliedBindings = {};
            var sortedUpdates = [];

            // parse and validate updates (updates without modifier are placed first)
            for (var key in updates) {
                var modIndex = key.indexOf(':');
                var targetId = key;
                var modifier = null;
                if (modIndex !== -1) {
                    targetId = key.substring(0, modIndex);
                    modifier = key.substring(modIndex + 1);
                }

                var target = $('#' + targetId);
                var html = updates[key];

                if (target.length > 0) {
                    // ok valid update
                    var update = {
                        key: key,
                        targetId: targetId,
                        modifier: modifier,
                        target: target,
                        html: html
                    };

                    if (modifier === null) {
                        sortedUpdates.splice(0, 0, update);
                    } else {
                        sortedUpdates.push(update);
                    }                    
                }
            }

            // chain each animate one after another
            return sortedUpdates.reduce(function (l, update) {
                return l.then(function () {
                    var ev2 = $.extend({}, ev, update);
                    var asyncResult = null;
                    
                    var inserted = false;
                    if (callbacks.beforeInsert(ev2) !== false) {
                        inserted = true;

                        asyncResult = animateUpdate(url, update, update.key === transitTarget);
                    } else {
                        var tmpResult = $.Deferred();
                        tmpResult.resolve();
                        asyncResult = tmpResult.promise();
                    }

                    return asyncResult.then(function () {                        
                        // refetch
                        var target = $('#' + update.targetId);
                        ev2.target = target;

                        if (inserted) {
                            callbacks.afterInsert(ev2);
                        }
                                                       
                        // automatically apply bindings regardless of inserted or not
                        if (!appliedBindings[update.targetId]) {
                            appliedBindings[update.targetId] = true;

                            if (callbacks.beforeApplyBindings(ev2) !== false) {
                                app.ui.applyBindings(target);
                            }

                            callbacks.afterApplyBindings(ev2);
                        }

                        if (updateCsrf && modifier === null && app.csrf) {
                            // extract anti forgery token values and update them
                            var csrf = $('input[name="' + app.csrf.getKey() + '"]', target);
                            if (csrf.length > 0) {
                                app.csrf.input = csrf[0].outerHTML;
                            }
                        }

                        // if required scroll to
                        if (scrollTarget && scrollTarget === update.targetId) {
                            if (!scrollDisabled) {
                                app.ui.scrollTo(target);
                            } else {
                                app.ui.scrollTo(0);
                            }                            
                        }
                    });
                });
            }, $.Deferred().resolve().promise());
        };

        function updatePage(page, processTitle) {
            if (processTitle === true && page.title) {
                document.title = page.title;
                try {
                    document.getElementsByTagName('title')[0].innerHTML = document.title.replace('<', '&lt;').replace('>', '&gt;').replace(' & ', ' &amp; ');
                }
                catch (Exception) { }
            }

            if (page.styles) {
                appendUnique(page.styles, 'link', 'href', $body);
            }

            if (page.styleBlocks) {
                appendUnique(page.styleBlocks, 'style', 'href', $body);
                appendUnique(page.styleBlocks, 'link', 'href', $body);
            }

            if (page.scripts) {
                appendUnique(page.scripts, 'script', 'src', $body);
            }

            if (page.scriptBlocks) {
                appendUnique(page.scriptBlocks, 'script', ['src', 'id'], $body);
            }

            if (page.onReadies) {
                appendUnique(page.onReadies, 'script', 'src', $body);
            }
        };

        // returns Promise
        function handleResponse(json, url, xhr, context, callbacks) {
            app.ui.unblock();

            var ev = {
                json: json,
                url: url,
                relativeUrl: makeRelative(url),
                context: context
            };

            if (!context) {
                context = {};
            }

            callbacks = prepareCallbacks(callbacks);

            // small option processing, do this before handling
            var hasOption = false;
            var updatePageRun = false;
            if (json.type != 'error' && json.option) {
                if (json.option.close) {
                    app.ui.modal.close(app.ui.modal.top());
                }

                if (json.option.closeAll) {
                    app.ui.modal.clear();
                }

                hasOption = true;
            };
                        
            var async = $.Deferred();
            async.resolve();
            async = async.promise();

            if (callbacks.beforeHandle(ev) !== false) {
                if (json.type == 'html') {
                    if (json.html) {
                        if (callbacks.beforeProcessHtml(ev) !== false) {
                            var newAsync = updateSection(url, json.html, callbacks, ev, true, context.scrollTarget, context.transitTarget);
                            // uncomment below line to apply script processing after animation
                            if (!applyScriptsImmediately) {
                                async = newAsync;
                            }                            
                        }                        
                    }

                    async.then(function () {
                        if (callbacks.beforeProcessPage(ev) !== false) {
                            updatePage(json, true);

                            updatePageRun = true;
                        }
                    });                                        
                } else if (json.type == 'redirect') {
                    var option = json.option || {};
                    
                    if (option.dialog) {
                        app.ui.modal.open(json.redirect.url, option.dialog);
                    } else if (option.target) {
                        app.ajax.start();
                        app.ajax.get(json.redirect.url, null, function (html) {
                            $('#' + option.target).html(html);
                        }, function () {
                            app.ajax.done();
                        });
                    } else {
                        if (context.form && context.form.hasClass('full-redirect')) {
                            json.redirect.full = true;
                        }

                        if (json.redirect.full && json.redirect.waitingText) {
                            app.ui.block(json.redirect.waitingText, true);
                        }

                        app.util.navigateTo(json.redirect.url, true, json.redirect.full);
                    }
                } else if (json.type == 'error') {
                    app.ui.alert(json.error.message);
                } else if (json.type == 'json') {
                    var c = context.form;
                    if (c && c.attr('data-handler')) {
                        window[c.attr('data-handler')](json.json);
                    }
                } else if (json.type == 'javascript') {
                    if (json.javascript) {
                        eval(json.javascript);
                    }
                } else if (json.type == 'text') {
                    app.ui.alert(json.text);
                }

                callbacks.afterHandle(ev);
            }                       
            
            // now process option if available
            if (hasOption) {
                async.then(function () {
                    if (json.option.events) {
                        for (var i = 0; i < json.option.events.length; i++) {
                            var clientEvent = json.option.events[i];

                            $(window).triggerHandler(clientEvent.name, [clientEvent.data]);
                        }
                    }

                    if (json.option.updates) {
                        var oupdates = {};
                        for (var i = 0; i < json.option.updates.length; i++) {
                            var sectionUpdate = json.option.updates[i];
                            oupdates[sectionUpdate.selector] = sectionUpdate.content;
                        }

                        var ocallbacks = {
                            beforeInsert: function () { },
                            afterInsert: function () { },
                            beforeApplyBindings: function () { },
                            afterApplyBindings: function () { }
                        };

                        updateSection(url, oupdates, ocallbacks, false, null, null).then(function() {
                            if (!updatePageRun) {
                                updatePage(json);
                            }
                        });                        
                    }
                });                
            }

            return async;
        };

        /* OVERRIDE APP METHODS */
        app.util._navigateTo = app.util.navigateTo;
        app.form._submit = app.form.submit;
        app.form._onSubmit = app.form.onSubmit;

        app.ui.scrollTo = function (elem) {
            if (elem) {
                elem = $(elem);
                if (elem.ScrollTo) {
                    elem.ScrollTo({ duration: 400, easing: 'swing' });
                }
            } else if (typeof elem == 'number') {
                if ($.scrollTo) {
                    $.scrollTo(elem);
                }
            } 
        };

        app.util.navigateTo = function (url, refresh, forceFull) {
            var relativeUrl = makeRelative(url);
            if (forceFull === undefined) {
                forceFull = false;
            }
            if (refresh === undefined) {
                refresh = false;
            }

            if (!forceFull && $('<a href="' + relativeUrl + '"></a>').is('a:internal')) {
                loadUrl(relativeUrl, null, refresh);
            } else {
                app.util._navigateTo(url);
            }
        };

        app.form.onSubmit = function (form) {
            return app.form.submit(form, false);
        };

        app.form.submit = function (form, removeAfterSubmit, fnComplete, context) {
            if (!app.event.triggerNavigating(form)) {
                return false;
            }

            if (form.attr('data-ajax') === 'true' || form.hasClass('no-ajaxify')) {
                return true;
            }

            var url = form.attr('action');
            
            var slot = null;
            var modal = form.closest('.app-dialog');
            if (modal.length == 0 && context) {
                modal = context.closest('.app-dialog');
            }

            if (modal.length > 0) {
                slot = app.ui.modal.find(modal);
            }

            var data = {};
            var buttonClicked = form.find('[type="submit"]:focus');
            if (buttonClicked.length > 0 && buttonClicked.attr('name')) {
                data[buttonClicked.attr('name')] = buttonClicked.attr('name');
            }
            
            if (form.attr('method') && form.attr('method').toLowerCase() === 'get') {
                if (url.indexOf('?') === -1) {
                    url += '?';
                } else {
                    url += '&';
                }

                // fix some nuances
                if (app.csrf) {                    
                    form.find(':input[name="' + app.csrf.getKey() + '"]').remove();
                }
                
                url += form.serialize();
                
                if (slot) {
                    app.ui.modal.load(url, slot);
                } else {
                    app.util.navigateTo(url);
                }
                
                return false;
            }
            
            var shim = function () {
                form.ajaxSubmit({
                    dataType: 'json',
                    data: data,
                    headers: getHeaders(slot ? 'Dialog=' + slot._id : null, slot ? 'dialog' : null),
                    beforeSubmit: function (arr, $form, options) {
                        if (!$form.valid()) {
                            return false;
                        }

                        app.ajax.start(form);

                        app.form.start(form);

                        return true;
                    },
                    progress: function (e) {
                        if (e.lengthComputable) {
                            var pct = (e.loaded / e.total) * 100;

                            app.ajax.progress(e.loaded, e.total, pct, form);
                        }
                    },
                    error: function () {

                    },
                    success: function (json, statusText, xhr, $form) {
                        if (slot) {
                            handleResponse(json, url, xhr, {
                                modal: true,
                                trigger: slot.trigger,
                                slot: slot,
                                form: $form
                            }, {
                                beforeApplyBindings: function (data) {
                                    app.ui.modal._onLoaded(data);
                                }
                            });
                        } else {
                            handleResponse(json, url, xhr, {
                                form: $form
                            });
                        }
                    },
                    complete: function () {
                        app.ajax.done(form);

                        app.form.done(form);

                        if (removeAfterSubmit) {
                            form.remove();
                        }

                        if (fnComplete) {
                            fnComplete();
                        }
                    },
                    uploadProgress: function (e, position, total, percentComplete) {
                        app.ajax.progress(position, total, percentComplete, form);
                    }
                });
            };

            if (form.attr('data-confirm')) {
                app.ui.confirm(form.attr('data-confirm'), function (result) {
                    if (result) {
                        shim();
                    }
                });
            } else {
                shim();
            }

            return false;
        };
                
        app.ajax.send = function (url, data, fnSuccess, fnComplete, ajaxOptions) {
            $.ajax($.extend({}, ajaxOptions, {
                url: url,
                dataType: 'json',
                data: data,
                headers: getHeaders(null, 'ajax'),
                success: function (json, textStatus, xhr) {
                    if (json.type == 'html' || json.type == 'json' || json.type == 'text') {
                        var result = json[json.type];
                        if (json.type == 'html' && json.html) {
                            result = json.html[json.target];
                        }

                        var extraData = null;
                        if (json.option && json.option !== undefined) {
                            extraData = json.option.data;
                        }

                        if (fnSuccess) {
                            fnSuccess(result, extraData);
                        }

                        if (json.type == 'html' || json.type == 'text') {
                            updatePage(json);
                        }
                    }

                    handleResponse(json, url, xhr, null, {
                        beforeHandle: function(data) {
                            if (data.json.type == 'html' || data.json.type == 'json' || data.json.type == 'text') {
                                return false;
                            }
                        },
                        beforeProcessHtml: function (data) {
                            return false;
                        }
                    });                    
                },
                complete: function () {
                    if (fnComplete) {
                        fnComplete();
                    }                    
                }
            }));
        };

        app.ajax.load = function (url) {
            $.ajaxQ.abort(function (jqx) { return jqx._ajaxify === true; });

            var async = $.Deferred();
            $.ajax({
                url: url,
                dataType: 'json',
                headers: getHeaders(),
                beforeSend: function (xhr) {
                    xhr._ajaxify = true;

                    app.ajax.start();
                },
                progress: function(e) {
                    if (e.lengthComputable) {
                        var pct = (e.loaded / e.total) * 100;

                        app.ajax.progress(e.loaded, e.total, pct);
                    }
                },
                success: function (json, textStatus, xhr) {
                    handleResponse(json, url, xhr, {
                        transitTarget: json.target,
                        scrollTarget: json.target
                    }).then(function() {
                        async.resolve();
                    });
                },
                complete: function () {
                    app.ajax.done();

                    prevRequest = null;
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    async.resolve();

                    if (jqXHR.status === 404) {
                        // not found
                        app.ui.alert((app.translate.page_not_found || 'Path you requested does not exist on the server') + ': ' + url);
                        return false;
                    }

                    document.location.href = url;

                    return false;
                }
            });
            return async.promise();
        };

        app.ui.modal._onLoaded = function (data) {
            if (data.json.type === 'html' && data.key.indexOf('appdialog') !== -1 && data.modifier === null) {                
                app.ui.modal.onLoaded(data.url, data.context.slot, data.context.slot.ui.find('.modal-body'), (data.json.breadcrumb && data.json.breadcrumb.selected) ? data.json.breadcrumb.selected.title : null);
            }
        };

        app.ui.modal.load = function (url, slot) {
            $.ajax({
                url: url,
                dataType: 'json',
                headers: getHeaders('Dialog=' + slot._id, 'dialog'),
                beforeSend: function (xhr) {
                    app.ajax.start(slot.trigger);
                },
                progress: function (e) {
                    if (e.lengthComputable) {
                        var pct = (e.loaded / e.total) * 100;

                        app.ajax.progress(e.loaded, e.total, pct, slot.trigger);
                    }
                },
                success: function (json, textStatus, xhr) {
                    handleResponse(json, url, xhr, {
                        modal: true,
                        trigger: slot.trigger,
                        slot: slot
                    }, {
                        beforeApplyBindings: function (data) {
                            app.ui.modal._onLoaded(data);
                        }
                    });                 
                },
                complete: function () {
                    app.ajax.done(slot.trigger);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);

                    return false;
                }
            });
        };

        /* INTERCEPT BROWSER EVENTS */

        $body.on('click', 'a:internal:not(.no-ajaxify):not([data-action]):not([data-bulk-action]):not([data-ajax]):not([data-modal])', function (event) {
            var trigger = $(this);
            var url = trigger.attr('href');
            var title = trigger.attr('title') || null;

            if (app.event.triggerNavigating(trigger)) {
                // continue as normal for cmd clicks etc
                if (event.which == 2 || event.metaKey) { return true; }

                var slot = null;
                var modal = trigger.closest('.app-dialog');
                if (modal.length > 0) {
                    slot = app.ui.modal.find(modal);
                }

                if (slot) {
                    app.ui.modal.load(url, slot);
                } else {
                    // ajaxify this link
                    $(window).trigger(app.event.AJAXIFY_CLICK, [ trigger ]);

                    loadUrl(url, title, trigger.hasClass('reload-ajaxify'));
                }                
            }            

            event.preventDefault();
            return false;
        });
                
        $window.bind('statechange', function () {
            var state = History.getState();            

            loadPage(state);
        });

        $window.bind(app.event.AJAXIFY_AFTER_HANDLE, function (e, data) {
            if (data.json.type === 'html') {
                // Inform Google Analytics of the change
                if (typeof window._gaq !== 'undefined') {
                    //window._gaq.push(['_trackPageview', data.relativeUrl]);
                }

                // Inform ReInvigorate of a state change
                if (typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined') {
                    //reinvigorate.ajax_track(data.url);
                    // ^ we use the full url here as that is what reinvigorate supports
                }
            }

            $('a[data-ajaxify-url]').each(function () {
                var $this = $(this);
                var paramName = $this.attr('data-ajaxify-url');
                var href = $this.attr('href');

                if (paramName && paramName[0] !== ':') {
                    var url = new Url(href);
                    url.query[paramName] = data.relativeUrl;

                    $this.attr('href', url.toString());
                } else if (paramName === ':tenant' && data.json.tenant) {
                    $this.attr('href', data.json.tenant.url);
                }
            });
        });

        $window.bind(app.event.AJAXIFY_NAVIGATING, function (e, url) {
            $.ajaxQ.abortAll();
        });

        /* ACTIVATE AJAXIFY */
        $(window).trigger(app.event.AJAXIFY_ACTIVATED);

        // register initial fx history
        app.fx.registerHistory(location.href);
    });
}(jQuery));
