/**
 * color-scheme.js
 *
 * author    Denis Franchi
 * package   Avik
 * version   1.3.2
 */

(function(api) {
    var cssTemplate = wp.template('avik-color-scheme'),
        colorSettings = [
            'link_color',
            'button_background_color',
            'button_hover_background_color',
            'text_slider_color',
            'background_slider_color',
            'background_whoweare_color',
            'subtitle_banner_color',
		    'cursor_banner_color',
            'background_services_color',
            'background_price_color',
            'background_footer_color',
            'text_footer_color',
            'background_scroll_to_top_color',
            'scroll_to_top_color',
            'hover_scroll_to_top_color',
            'hover_social_slider_footer_color',
            'social_contact_color',
            'hover_social_contact_color',
            'social_team_color',
            'social_share_color',
            'hover_social_share_color',
            'background_breadcrumbs_color',
            'background_preloader_color',
            'preloader_color',

        ];

    // Update list of colors when select a color scheme.
    function updateColors(scheme) {
        scheme = scheme || 'default';
        var colors = AvikColorScheme[scheme].colors;
        _.each(colorSettings, function(key, index) {
            var color = colors[index];
            api(key).set(color);
            api.control(key).container.find('.color-picker-hex')
                .data('data-default-color', color)
                .wpColorPicker('defaultColor', color);
        });
    }
    api.controlConstructor.select = api.Control.extend({
        ready: function() {
            if ('avik_color_scheme' === this.id) {
                this.setting.bind('change', updateColors);
            }
        }
    });

    // Update the CSS whenever a color setting is changed.
    function updateCSS() {
        var scheme = api('avik_color_scheme')(),
            css,
            colors = _.object(colorSettings, AvikColorScheme[scheme].colors);

        _.each(colorSettings, function(setting) {
            colors[setting] = api(setting)();
        });

        css = cssTemplate(colors);
        api.previewer.send('update-color-scheme-css', css);
    }
    _.each(colorSettings, function(setting) {
        api(setting, function(setting) {
            setting.bind(updateCSS);
        });
    });
})(wp.customize);
