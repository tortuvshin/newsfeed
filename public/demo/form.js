(function ($) {
    app.ui.updateBulk = function () {
        if ($('table tr > td:first-child input:checkbox:checked').length > 0) {
            $('button[data-bulk-action]').prop('disabled', false);
        } else {
            $('button[data-bulk-action]').prop('disabled', true);
        }
    };

    app.ui.updateBulk2 = function () {
        if ($('.bulk-action-container .bulk-action-row .bulk-action-slave input:checkbox:checked').length > 0) {
            $('button[data-bulk-action]').prop('disabled', false);
        } else {
            $('button[data-bulk-action]').prop('disabled', true);
        }
    };

    app.ui.addBinding(function (scope) {
        $('[data-rel=tooltip]', scope).tooltip({ container: 'body' });
        $('[data-rel=popover]', scope).popover({
            container: 'body',
            html: true,
            content: function () {
                return $(this).find('.popover-content-container').html();
            }
        });

        setTimeout(function () {
            $('.slim-scroll', scope).each(function () {
                var $this = $(this);
                var height = $this.data('height');

                if (height === 'viewport') {
                    var parent = $this.parent();
                    var wh = $(window).height();
                    var ph = parent.height();
                    var py = parent.offset().top - $(window).scrollTop();
                                        
                    wh -= py;

                    if (ph > wh) {
                        height = wh;
                    } else {
                        //height = 'auto';
                        height = wh;
                    }
                } else if (height == 'full') {
                    height = '100%';
                }

                $this.slimScroll({
                    height: height || 100,
                    railVisible: true
                });
            });
        }, 50);        

        // enhance forms
        //$('input[type=checkbox],input[type=radio]', scope).each(function () {
        //    var cb = $(this);
        //    var hd = cb.next('input[type=hidden]');
        //    if (hd.length > 0) {
        //        var lb = hd.next('.lbl');
        //        if (lb.length > 0) {
        //            hd.remove();
        //            lb.after(hd);
        //        }
        //    }
        //});

        $('.chosen-select', scope).each(function () {
            var me = $(this);
            var options = { disable_search_threshold: 20 };
            if (me.attr('data-max-options')) {
                options.max_selected_options = me.attr('data-max-options');
            }

            me.chosen(options);
        });        

        $('.date-picker', scope).datepicker({ autoclose: true, language: 'mn', format: 'yyyy-mm-dd', weekStart: 1 }).next().on(app.click_event, function () {
            $(this).prev().focus();
        });

        $('.date-range-picker', scope).daterangepicker().prev().on(app.click_event, function () {
            $(this).next().focus();
        });

        $('.time-picker', scope).timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        }).next().on(app.click_event, function () {
            $(this).prev().focus();
        });

        $('.ace-file', scope).each(function () {
            var me = $(this);
            var fv = new app.util.FileValidator(me.attr('data-whitelist'), me.attr('data-size'));
            var onChange = me.attr('data-on-change') || null;

            me.ace_file_input({
                //style: 'well',
                no_file: fv.no_file,
                //no_icon: 'icon-cloud-upload',
                btn_choose: app.translate.file_choose || 'Choose',
                btn_change: app.translate.file_change || 'Change',
                droppable: false,
                onchange: null,
                thumbnail: me.attr('data-thumbnail') || false, // true | large | small | fit
                whitelist: me.attr('data-whitelist') || 'gif|png|jpg|jpeg', // 'gif|png|jpg|jpeg'
                //blacklist: me.attr('data-blacklist') || '', // 'exe|php'
                //,icon_remove:null//set null, to hide remove/reset button
                before_change: function (files, dropped) {
                    if (!fv.validate(files)) {
                        return false;
                    }

                    if (onChange !== null && window[onChange]) {
                        if (!$.proxy(window[onChange], me)(files)) {
                            return false;
                        }
                    }

                    return true;
                },
                before_remove: function () {
                    return true;
                },
                preview_error: function (filename, error_code) {
                    //name of the file that failed
                    //error_code values
                    //1 = 'FILE_LOAD_FAILED',
                    //2 = 'IMAGE_LOAD_FAILED',
                    //3 = 'THUMBNAIL_FAILED'
                    //alert(error_code);
                }
                //onchange:''
            });
        });

        // summernote twitter plugin
        (function ($) {
            // template, editor
            var tmpl = $.summernote.renderer.getTemplate();

            // core functions: range, dom
            var range = $.summernote.core.range;
            var dom = $.summernote.core.dom;

            var getSelectedRange = function ($editable) {
                $editable.focus();

                var rng = range.create();

                // if range on anchor, expand range with anchor
                if (rng.isOnAnchor()) {
                    var anchor = dom.ancestor(rng.sc, dom.isAnchor);
                    rng = range.createFromNode(anchor);
                }

                return rng;
            };
            
            // add hello plugin 
            $.summernote.addPlugin({
                // plugin's name
                name: 'twitter',

                buttons: { // define button that be added in the toolbar
                    // "twitter" button (key is a button's name)
                    twitter: function (lang) {

                        // create button template 
                        return tmpl.iconButton('icon-twitter', {
                            // set event's name to used as callback when this button is clicked
                            // add data-event='hello' in button element
                            event: 'twitter',
                            title: lang.twitter || 'Twitter',
                            hide: true
                        });
                    }
                },

                events: { // events
                    // run callback when hello button is clicked
                    twitter: function (event, editor, layoutInfo, value) {
                        // Get current editable node
                        var $editable = layoutInfo.editable();

                        var note = layoutInfo.holder();                        
                        var range = getSelectedRange($editable);
                        var text = range.toString();

                        var proceed = true;
                        if (range.ec && range.ec.parentNode) {
                            var tweetable = null;
                            var parent = $(range.ec.parentNode);
                            
                            if (parent.hasClass('tweetable')) {
                                tweetable = parent;                                
                            } else {
                                tweetable = parent.closest('.tweetable');                                
                            }

                            if (tweetable.length > 0) {
                                tweetable.contents().unwrap();
                                proceed = false;
                            }
                        }

                        if (proceed && text) {
                            editor.insertNode($editable, $('<span class="tweetable tweetable-editor">' + text + '</span>')[0]);
                        }
                    }
                },

                langs: {
                    'en-US': {
                        twitter: 'Twitter'
                    }
                }
            });
        })($);

        $('.wysiwyg-editor', scope).each(function () {
            var me = $(this);
            var fv = new app.util.FileValidator(me.attr('data-whitelist'), me.attr('data-size'));
            var uploadToken = me.attr('data-token');            
            var preset = me.attr('data-preset') || '';
            var tagName = me.prop('tagName');
            var input = null;
            if (tagName == 'INPUT' || tagName == 'TEXTAREA') {
                if (tagName == 'TEXTAREA' || me.attr('type') != 'hidden') {
                    // create hidden input
                    var hidden = $('<input type="hidden" />');
                    hidden.attr('name', me.attr('name'));
                    hidden.attr('id', me.attr('id'));
                    hidden.val(me.val());

                    me.before(hidden);
                    me.remove();
                    me = hidden;
                }

                input = me;
                me.removeClass('wysiwyg-editor');
                me = $('<div class="wysiwyg-editor"></div>');
                input.before(me);
            }

            var toolbar = [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'twitter']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ];

            if (preset == 'compact') {
                toolbar = [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'twitter']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ];
            }

            me.summernote({
                lang: app.lang,
                height: me.height(),
                toolbar: toolbar,
                onImageUpload: function (files, editor, welEditable) {
                    if (!uploadToken) {
                        app.ui.alert(app.translate.editor_image_upload_not_supported);

                        return;
                    }
                    
                    files = fv.validate(files);
                    if (files !== false) {
                        var file = files[0];

                        var data = new FormData();
                        data.append("file", file);
                        if (uploadToken) {
                            data.append('token', uploadToken);
                        }
                        if (app.csrf) {
                            data.append(app.csrf.getKey(), app.csrf.getValue());
                        }
                        $.ajax({
                            dataType: 'json',
                            data: data,
                            type: "POST",
                            url: app.file.upload,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (json) {
                                if (json.success) {
                                    if (input) {
                                        input.closest('form').append('<input type="hidden" name="' + input.attr('name') + 'Parts" value="' + json.token + '" />');
                                    }

                                    me.summernote('insertImage', json.url);
                                    //editor.insertImage(welEditable, json.url);
                                } else {
                                    app.ui.alert(json.message);
                                }
                            }
                        });
                    }
                }
            });

            if (input) {
                me.code(input.val());
                
                var form = input.closest('form');

                var modal = form.closest('.app-dialog');
                if (modal.length == 0) {
                    form.find('[type="submit"]').click(function () {
                        input.val(me.code());
                    });
                } else {
                    modal.on(app.event.MODAL_SUBMIT, function () {
                        input.val(me.code());
                    });
                }                
            }
        });

        // support bulk actions
        $('table th input:checkbox', scope).on('click', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
            .each(function () {
                this.checked = that.checked;
                $(this).closest('tr').toggleClass('selected');
            });
            app.ui.updateBulk();
        });

        $('table', scope).on('change', 'tr > td:first-child input:checkbox', function () {
            app.ui.updateBulk();
        });

        $('.bulk-action-master input:checkbox', scope).on('click', function () {
            var that = this;
            $(this).closest('.bulk-action-container').find('.bulk-action-row .bulk-action-slave input:checkbox')
            .each(function () {
                this.checked = that.checked;
                $(this).closest('.bulk-action-row').toggleClass('selected');
            });
            app.ui.updateBulk2();
        });

        $('.bulk-action-container', scope).on('change', '.bulk-action-row .bulk-action-slave input:checkbox', function () {
            app.ui.updateBulk2();
        });

        app.ui.updateBulk();
        app.ui.updateBulk2();
    });
}(jQuery));
