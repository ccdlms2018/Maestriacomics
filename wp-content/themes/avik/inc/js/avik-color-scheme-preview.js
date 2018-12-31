/**
 * avik-color-scheme-preview.js
 *
 * author    Denis Franchi
 * package   Avik
 * version   1.3.2
 */

(function($) {
    var style = $('#avik-color-scheme-css'),
        api = wp.customize;

    if (!style.length) {
        style = $('head').append('<style id="avik-color-scheme-css" />')
            .find('#avik-color-scheme-css');
    }
    // Color Scheme CSS.
    api.bind('preview-ready', function() {
        api.preview.bind('update-color-scheme-css', function(css) {
            style.html(css);
        });
    });
})(jQuery);
