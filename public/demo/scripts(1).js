(function ($) {    
    $(function () {
        app.ui.applyBindings();

        if (app._readies) {
            app._readies.forEach(function (fn) { fn(); });
        }
    });    
})(jQuery);