(function ($) {
    if (!app) {
        return false;
    }

    app.analytic = {};

    var a = app.analytic;
    a._ready = false;
    a._queue = [];
    a._accounts = [];
    a._tracker = null;
    a.create = function (accounts, options) {
        var defined = a.define();
        if (!defined) return;

        if (typeof accounts == 'string') {
            accounts = accounts.split(',');
        }

        options = options || 'auto';

        // first account is default tracker
        for (var i = 0; i < accounts.length; i++) {
            var config = {};

            var name = i > 0 ? 'tk' + i : '';
            if (i > 0) {
                config.name = name;
            }

            this._accounts.push({
                id: accounts[i],
                name: name
            });

            defined('create', accounts[i], options, config);
        }
    };
    a.multiplex = function () {
        var defined = a.define();
        if (!defined) return;

        var t = a._accounts;
        for (var i = 0; i < t.length; i++) {
            var args = [];
            for (var j = 0; j < arguments.length; j++) {
                var value = arguments[j];
                if (j == 0 && typeof value == 'string') {
                    value = (t[i].name ? t[i].name + '.' : '') + value;
                }
                args[j] = value;
            }

            defined.apply(undefined, args);
        }
    };
    a.tracker = function () {
        if (!a._ready) {
            a._queue.push(arguments);
        } else {
            var defined = a.define();
            if (defined) {
                defined.apply(undefined, arguments);
            }
        }        
    };
    a.define = function () {
        var ga = null;
        if (window.GoogleAnalyticsObject) {
            ga = window[window.GoogleAnalyticsObject];
        }
        return ga;
    };
    a.ready = function () {
        if (a._ready) return;
         
        a._ready = true;

        var defined = a.define();
        if (defined) {
            // begin support multiple trackers
            if (a._accounts.length > 1) {
                // if multiple accounts exist, multiplex them
                defined = a.tracker = a.multiplex;
            }
            // end support multiple trackers

            for (var i = 0; i < a._queue.length; i++) {
                defined.apply(undefined, a._queue[i]);
            }
            a._queue = [];
        }        
    };

    var CT_EVENT_CATEGORY = 'Reading';
    var CT_EVENT_ACTION_ARTICLE_LOADED = 'ArticleLoaded';
    var CT_EVENT_ACTION_START_READING = 'StartReading';
    var CT_EVENT_ACTION_CONTENT_BOTTOM = 'ContentBottom';
    var CT_EVENT_ACTION_PAGE_BOTTOM = 'PageBottom';

    a.ContentTracker = app.util.Class.extend({
        init: function (customScroll, contentSelector) {
            this._debug = false;
            this._callBackTime = 100;
            this._scrollThreshold = 150;
            this._contentThreshold = 60;

            this._timer = 0;
            this._scroller = false;
            this._endContent = false;
            this._didComplete = false;

            this._startTime = new Date();
            this._beginning = this._startTime.getTime();
            this._totalTime = 0;

            this._scrollStart = 0;

            this._customScroll = customScroll !== undefined ? customScroll : false;
            this._contentSelector = contentSelector || '.analytic-content';

            this.setup();
        },
        getLabel: function() {
            return document.title;
        },
        getContentThreshold: function() {
            return this._contentTreshold;
        },
        setup: function () {
            if (!this._debug) {
                a.tracker('send', 'event', CT_EVENT_CATEGORY, CT_EVENT_ACTION_ARTICLE_LOADED, this.getLabel(), { 'nonInteraction': 1 });
            } else {
                console.log('article loaded');
            }

            if (!this._customScroll) {
                var me = this;
                $(window).scroll(function () {
                    me.scroll($(window).height(), $(window).scrollTop(), $(document).height());
                });
            }
        },
        _track: function (viewPortHeight, viewPortScrollTop, targetHeight) {
            viewPortScrollTop = Math.abs(viewPortScrollTop);

            var bottom = viewPortHeight + viewPortScrollTop;
            if (!this._scroller && bottom > this._scrollThreshold) {
                var currentTime = new Date();
                this._scrollStart = currentTime.getTime();

                var timeToScroll = Math.round((this._scrollStart - this._beginning) / 1000);

                if (!this._debug) {
                    a.tracker('send', 'event', CT_EVENT_CATEGORY, CT_EVENT_ACTION_START_READING, this.getLabel(), timeToScroll, { 'metric1': timeToScroll });
                } else {
                    console.log('start reading: ' + timeToScroll);
                }

                this._scroller = true;
            }

            var contentBottom = 0;

            if (this._contentSelector) {
                var content = $(this._contentSelector);
                if (!this._customScroll) {
                    contentBottom = content.scrollTop() + content.innerHeight();
                } else {
                    var contentScrollTop = viewPortScrollTop - Math.abs(content.position().top);
                    if (contentScrollTop < 0) {
                        contentScrollTop = 0;
                    }

                    contentBottom = targetHeight - (targetHeight - content.height());
                }
            } else {
                contentBottom = targetHeight;
            }            
            
            if (!this._endContent && bottom >= contentBottom) {
                var currentTime = new Date();
                var contentScrollEnd = currentTime.getTime();
                var timeToContentEnd = Math.round((contentScrollEnd - this._scrollStart) / 1000);
                if (!this._debug) {
                    if (timeToContentEnd < this._contentThreshold) {
                        a.tracker('set', 'dimension2', 'Scanner');
                    } else {
                        a.tracker('set', 'dimension2', 'Reader');
                    }

                    a.tracker('send', 'event', CT_EVENT_CATEGORY, CT_EVENT_ACTION_CONTENT_BOTTOM, this.getLabel(), timeToContentEnd, { 'metric2': timeToContentEnd });
                } else {
                    if (timeToContentEnd < this._contentThreshold) {
                        console.log('content scanner');
                    } else {
                        console.log('content reader');
                    }

                    console.log('content bottom: ' + timeToContentEnd);
                }

                this._endContent = true;
            }

            if (!this._didComplete && bottom >= targetHeight) {
                var currentTime = new Date();
                var end = currentTime.getTime();

                this._totalTime = Math.round((end - this._scrollStart) / 1000);

                if (!this._debug) {
                    a.tracker('send', 'event', CT_EVENT_CATEGORY, CT_EVENT_ACTION_PAGE_BOTTOM, this.getLabel(), this._totalTime, { 'metric3': this._totalTime });
                } else {
                    console.log('page bottom: ' + this._totalTime);
                }

                this._didComplete = true;
            }
        },
        scroll: function (viewPortHeight, viewPortScrollTop, targetHeight) {
            if (this._timer) {
                clearTimeout(this._timer);
            }

            var me = this;
            this._timer = setTimeout(function () {
                me._track(viewPortHeight, viewPortScrollTop, targetHeight);
            }, this._callBackTime);
        }
    });
}(jQuery));
