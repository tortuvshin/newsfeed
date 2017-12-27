(function ($) {
    // prepare our variables
    var $html = $('html');

    if (!app) {
        return false;
    }

    if (!$.support.transition)
        $.fn.transition = $.fn.animate;    
        
    var PageTransition = app.util.Class.extend({
        requiresStage: function() {
            return true;
        },
        requiresWrapper: function () {
            return false;
        },
        requiresInPage: function() {
            return true;
        },
        requiresAbsolutePosition: function() {
            return true;
        },
        requiresPerspective: function() {
            return false;
        },
        getPerspective: function() {
            return 100;
        },
        getClipMode: function () {
            return app.fx.CLIP_MODE_HIDDEN;
        },
        prepare: function (scene) {

        },
        // should return Promise
        animate: function (scene) {

        },
        done: function (scene) {

        }
    });

    var EffectManager = app.util.Class.extend({
        CLIP_MODE_HIDDEN: 'hidden',
        CLIP_MODE_VISIBLE: 'visible',

        _defaultOptions: {
            animationOptions: {
                duration: 500,
                easing: 'easeInCubic', //'easeInBack'
            },
            defaultEffect: 'slideLeft'
        },
        _effects: {},
        _history: [],
        _pairs: [],
        _pattern: ['slideLeft', 'slideDown', 'slideRight', 'slideUp'/*, 'flipLeft', 'fade', 'flipUp'*/, 'zoomIn', 'spinLeft', 'scaleIn' ],
        _prevScene: null,

        prepare: function(html) {
            var transitions = html.data('animation-pattern');            
            if (transitions) {
                var tmp = [];
                var parts = transitions.split(',');
                for (var i = 0; i < parts.length; i++) {
                    var part = $.trim(parts[i]);
                    if (part && this._effects[part]) {
                        tmp.push(part);
                    }
                }
                if (tmp.length > 0) {
                    this._pattern = tmp;
                }
            }
        },
        registerEffect: function(name, effect) {
            if (!this._effects[name]) {
                this._effects[name] = effect;
            }
        },
        registerHistory: function (url, effectName) {
            var tmp = [];
            for (var i = 0; i < this._history.length; i++) {
                if (this._history[i].url != url) {
                    tmp.push(this._history[i]);
                }
            }

            tmp.push({
                url: url,
                effect: effectName || null
            });

            this._history = tmp;
        },
        registerPair: function(left, right) {
            this._pairs.push({
                left: left,
                right: right
            });
        },
        getReverseEffect: function(name) {
            for (var i = 0; i < this._pairs.length; i++) {
                var pair = this._pairs[i];
                if (pair.left == name) {
                    return pair.right;
                } else if (pair.right == name) {
                    return pair.left;
                }
            }

            return null;
        },
        getEffect: function (name) {
            if (name) {
                return this._effects[name];
            }

            return null;
        },
        getEffectName: function (scene, url) {
            //return 'scaleOut';
            var effect = null;

            // calculate next effect
            if (url) {
                var match = -1;
                for (var i = this._history.length - 1; i >= 0; i--) {
                    if (this._history[i].url == url) {
                        match = i;
                        break;
                    }
                }
                
                // only if it's going back by 1 step, let's reverse the effect
                if (match != -1 && match == this._history.length - 2) {
                    effect = this.getReverseEffect(this._history[this._history.length - 1].effect);
                }

                // get new effect based on certain pattern or random
                if (!effect) {
                    var lastEffect = null;
                    if (this._history.length > 0) {
                        lastEffect = this._history[this._history.length - 1].effect;
                    }

                    if (lastEffect) {
                        var match = this._pattern.indexOf(lastEffect);
                        if (match != -1 && (match + 1) < this._pattern.length) {
                            effect = this._pattern[match + 1];
                        }
                    }
                }
            }

            if (effect == null) {
                effect = this._defaultOptions.defaultEffect;
            }

            //console.log('select effect: ' + effect + ', ' + this._history.length);

            return effect;
        },

        // scene: { targetId: 'target', target: null, modifier: 'append|prepend|null', html: '', ease: 'swing', duration: 500 }
        // url: optional
        // returns: Promise
        animate: function (scene, url) {            
            if (url === undefined) {
                url = null;
            }
                        
            var animatePage = $html.hasClass('animate-page');
            if (!animatePage) {
                return null;
            }

            // stop previous scene if required
            if (this._prevScene != null) {
                if (this._prevScene.wrapper) {
                    this._prevScene.wrapper.css('animation', 'none');
                }
                if (this._prevScene.inPage) {
                    this._prevScene.inPage.css('animation', 'none');
                }
                if (this._prevScene.outPage) {
                    this._prevScene.outPage.css('animation', 'none');
                }
            }

            scene.option = this._defaultOptions.animationOptions;
            scene.stage = null;
            scene.wrapper = null;
            scene.inPage = null;
            scene.outPage = null;

            scene.stageWidth = scene.stageHeight = 0;
            scene.inPageWidth = scene.inPageHeight = scene.inPageLeft = scene.inPageTop = 0;
            scene.outPageWidth = scene.outPageHeight = scene.outPageLeft = scene.outPageTop = 0;

            // set out page
            scene.outPage = $('#' + scene.targetId);
            scene.outPageWidth = scene.outPage.width();
            scene.outPageHeight = scene.outPage.height();

            // choose effect
            var effect = null;
            var effectName = this.getEffectName(scene, url);
            if (effectName) {
                effect = this.getEffect(effectName);
            }

            if (effect == null) {
                return null;
            }
                        
            var perspective = 0;
            if (effect.requiresStage()) {
                scene.stage = scene.outPage.offsetParent();
                                
                scene.stageWidth = scene.stage.width(); // - 12 (this is no longer necessary)
                scene.stageHeight = scene.stage.height();

                if (scene.outPageHeight > scene.stageHeight) {
                    scene.stageHeight = scene.outPageHeight;
                }
                
                // first set overflow so that scroll bars won't show up
                scene.stage.css('overflow', effect.getClipMode());
                scene.stage.width(scene.stageWidth);
                scene.stage.height(scene.stageHeight);                

                if (effect.requiresPerspective()) {
                    perspective = effect.getPerspective();
                    scene.stage.css('perspective', perspective);
                }
            }            
            
            if (effect.requiresAbsolutePosition()) {
                var offset = scene.outPage.position();
                scene.outPageTop = offset.top;
                scene.outPageLeft = offset.left;
                scene.outPage.css({ position: 'absolute', top: offset.top, left: offset.left }).width(scene.outPageWidth);
            }

            if (effect.requiresInPage()) {
                scene.inPage = $('<div/>');
                scene.inPage.attr('id', scene.outPage.attr('id')).attr('class', scene.outPage.attr('class'));
                scene.inPage.html(scene.html);

                scene.outPage.removeAttr('id');

                if (effect.requiresAbsolutePosition()) {
                    // by default place inPage at the left side of the outPage
                    scene.inPageTop = scene.outPageTop;
                    scene.inPageLeft = -scene.outPageWidth;
                    scene.inPage.css({ position: 'absolute', top: scene.inPageTop, left: scene.inPageLeft }).width(scene.outPageWidth);
                }

                scene.outPage.before(scene.inPage);

                scene.inPageWidth = scene.inPage.width();
                scene.inPageHeight = scene.inPage.height();

                // make sure stage is tall enough to encompass in and out pages
                if (scene.stage && scene.stageHeight < scene.inPageHeight) {
                    scene.stageHeight = scene.inPageHeight;
                    scene.stage.height(scene.stageHeight);
                }
            }

            if (effect.requiresWrapper() && scene.stage) {
                scene.outPage.parent().children().wrapAll('<div style="width:100%;height:100%;position:absolute;top:0;left:0"></div>');
                scene.wrapper = scene.outPage.parent();
            }
            
            effect.prepare(scene);

            this._prevScene = scene;

            //return $.when(function () { });
            var caller = this;
            return effect.animate(scene).then(function () {                
                caller._prevScene = null;

                caller.registerHistory(url, effectName);

                // ok transition completed, now clean up
                effect.done(scene);

                if (scene.inPage) {
                    scene.outPage.remove();
                    scene.inPage.css({ width: '', top: '', left: '', transform: 'none', position: '' });
                    scene.inPage.removeAttr('style'); // make sure every style is removed
                }

                if (scene.wrapper) {
                    scene.wrapper.children().unwrap();
                }

                if (scene.stage) {
                    scene.stage.css({ width: '', height: '', overflow: '', perspective: '', position: '' });
                    scene.stage.removeAttr('style'); // make sure every style is removed
                }
            });            
        },
        _animate: function (target, option) {
            option = $.extend({}, this._defaultOptions.animationOptions, option);

            target.transition(option);
        }
    });

    app.fx = new EffectManager();

    // create custom jquery plugin for animation
    $.fn.fx = function (option) {
        app.fx._animate(this, option);

        return this;
    };

    ////////// PAGE TRANSITIONS //////////////
    var SlideLeft = PageTransition.extend({
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageWidth + scene.outPageLeft });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                x: -scene.outPageWidth,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                x: -scene.outPageWidth, // move element to the right by x pixel from it's current position
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var SlideRight = PageTransition.extend({
        prepare: function (scene) {

        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                x: scene.outPageWidth,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                x: scene.outPageWidth + scene.outPageLeft, // move element to the right by x pixel from it's current position
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var SlideUp = PageTransition.extend({
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageLeft, top: scene.outPageHeight + scene.outPageTop });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                y: -(scene.outPageHeight + scene.outPageTop),
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                y: -scene.outPageHeight,
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var SlideDown = PageTransition.extend({
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageLeft, top: -(scene.outPageHeight + scene.outPageTop) });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                y: scene.outPageHeight,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                y: scene.outPageHeight + scene.outPageTop,
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var FlipX = PageTransition.extend({
        init: function (degree) {
            this.degree = degree;
        },
        requiresWrapper: function () {
            return true;
        },
        requiresPerspective: function () {
            return true;
        },
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageLeft, top: scene.outPageTop, transform: 'rotateX(' + this.degree + ')', backfaceVisibility: 'hidden', zIndex: 1 });
            scene.outPage.css({ backfaceVisibility: 'hidden', zIndex: 2 });

            scene.wrapper.css({ 'transformStyle': 'preserve-3d' });
        },
        done: function (scene) {
            scene.inPage.css({ transform: '', backfaceVisibility: '' });
        },
        animate: function (scene) {
            scene.wrapper.fx({
                rotateX: this.degree
            });

            return scene.wrapper.promise();
        }
    });

    var FlipY = PageTransition.extend({
        init: function(degree) {
            this.degree = degree;
        },
        requiresWrapper: function () {
            return true;
        },
        requiresPerspective: function () {
            return true;
        },
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageLeft, top: scene.outPageTop, transform: 'rotateY(' + this.degree + ')', backfaceVisibility: 'hidden', zIndex: 1 });
            scene.outPage.css({ backfaceVisibility: 'hidden', zIndex: 2 });

            scene.wrapper.css({ 'transformStyle': 'preserve-3d' });
        },
        done: function (scene) {
            scene.inPage.css({ transform: '', backfaceVisibility: '' });
        },
        animate: function (scene) {
            scene.wrapper.fx({
                rotateY: this.degree
            });

            return scene.wrapper.promise();
        }
    });    

    var Rotate = PageTransition.extend({
        init: function (degree) {
            this.degree = degree;
        },
        getClipMode: function () {
            return PageTransition.CLIP_MODE_VISIBLE;
        },
        prepare: function (scene) {
            scene.inPage.css({ opacity: 0, left: scene.outPageLeft, top: scene.outPageTop });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                rotate: this.degree,
                opacity: 0,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                rotate: this.degree,
                opacity: 1,
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var Fade = PageTransition.extend({
        prepare: function (scene) {
            scene.inPage.css({ opacity: 0, left: scene.outPageLeft, top: scene.outPageTop });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                opacity: 0,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                opacity: 1,
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var ZoomIn = PageTransition.extend({
        getClipMode: function() {
            return PageTransition.CLIP_MODE_VISIBLE;
        },
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageLeft, top: scene.outPageTop, scale: 2 });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                scale: 0,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                scale: 1,
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var ZoomOut = PageTransition.extend({
        getClipMode: function () {
            return PageTransition.CLIP_MODE_VISIBLE;
        },
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageLeft, top: scene.outPageTop, scale: 0 });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                scale: 2,
                opacity: 0,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                scale: 1,
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    var Scale = PageTransition.extend({
        init: function(inPageTransformOrigin, outPageTransformOrigin) {
            this.inPageTransformOrigin = inPageTransformOrigin || 'top right';
            this.outPageTransformOrigin = outPageTransformOrigin || 'bottom left';
        },
        getClipMode: function () {
            return PageTransition.CLIP_MODE_VISIBLE;
        },
        prepare: function (scene) {
            scene.inPage.css({ left: scene.outPageLeft, top: scene.outPageTop, scale: 0, opacity: 0, transformOrigin: this.inPageTransformOrigin });
            scene.outPage.css({ transformOrigin: this.outPageTransformOrigin });
        },
        animate: function (scene) {
            var async1 = $.Deferred();
            var async2 = $.Deferred();
            scene.outPage.fx({
                scale: 0,
                queue: false,
                complete: function () {
                    async1.resolve();
                }
            });

            scene.inPage.fx({
                scale: 1,
                opacity: 1,
                queue: false,
                complete: function () {
                    async2.resolve();
                }
            });

            return $.when(async1, async2);
        }
    });

    app.fx.registerEffect('slideLeft', new SlideLeft());
    app.fx.registerEffect('slideRight', new SlideRight());
    app.fx.registerEffect('slideUp', new SlideUp());
    app.fx.registerEffect('slideDown', new SlideDown());
    app.fx.registerEffect('flipLeft', new FlipY('-180deg'));
    app.fx.registerEffect('flipRight', new FlipY('180deg'));
    app.fx.registerEffect('flipUp', new FlipX('-180deg'));
    app.fx.registerEffect('flipDown', new FlipX('180deg'));
    app.fx.registerEffect('rotateLeft', new Rotate('-360deg'));
    app.fx.registerEffect('rotateRight', new Rotate('360deg'));
    app.fx.registerEffect('spinLeft', new Rotate('-1080deg'));
    app.fx.registerEffect('spinRight', new Rotate('1080deg'));
    app.fx.registerEffect('fade', new Fade());
    app.fx.registerEffect('zoomIn', new ZoomIn());
    app.fx.registerEffect('zoomOut', new ZoomOut());
    app.fx.registerEffect('scaleIn', new Scale());
    app.fx.registerEffect('scaleOut', new Scale('bottom left', 'top right'));

    app.fx.registerPair('slideLeft', 'slideRight');
    app.fx.registerPair('slideUp', 'slideDown');
    app.fx.registerPair('flipLeft', 'flipRight');
    app.fx.registerPair('flipUp', 'flipDown');
    app.fx.registerPair('rotateLeft', 'rotateRight');
    app.fx.registerPair('spinLeft', 'spinRight');
    app.fx.registerPair('zoomIn', 'zoomOut');
    app.fx.registerPair('scaleIn', 'scaleOut');

    app.fx.prepare($html);
}(jQuery));
