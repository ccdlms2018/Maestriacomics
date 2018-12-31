/**
 * avik-customizer.js
 *
 * author    Denis Franchi
 * package   Avik
 * version   1.3.2
 */

/* TABLE OF CONTENT

  1 - Site identity
  2 - Who we are
  3 - Services
  4 - Portfolio
  5 - Blog
  6 - Footer
  7 - Color Filter Header Home
*/

( function( $ ) {

/* ------------------------------------------------------------------------- *
## 1 Site identity */
/* ------------------------------------------------------------------------- */

// Site title and description.
wp.customize( 'blogname', function( value ) {
	value.bind( function( to ) {
	$( '.site-title a' ).text( to );
	} );
} );
wp.customize( 'blogdescription', function( value ) {
	value.bind( function( to ) {
	$( '.site-description' ).text( to );
	} );
} );

// Header text color.
wp.customize( 'header_textcolor', function( value ) {
	value.bind( function( to ) {
	if ( 'blank' === to ) {
	$( '.site-title, .site-description' ).css( {
			'clip': 'rect(1px, 1px, 1px, 1px)',
			'position': 'absolute'
	} );
	} else {
	$( '.site-title, .site-description' ).css( {
			'clip': 'auto',
			'position': 'relative'
	} );
	$( '.site-title a, .site-description' ).css( {
			'color': to
	} );
	}
	} );
} );

// Font-size logo
wp.customize('avik_font_size_logo', function(control) {
	control.bind(function( controlValue ) {
		$('.avik-logo img').css('width', controlValue + 'px');
	});
});

/* ------------------------------------------------------------------------- *
## 2 Who we are */
/* ------------------------------------------------------------------------- */

// Color title banner image
wp.customize( 'avik_color_title_image_banner_whoweare', function( value ) {
    value.bind( function( newval ) {
    $( '#typed' ).css( 'color', newval );
    } );
} );

// Color cursor banner image
wp.customize( 'avik_color_cursor_image_banner_whoweare', function( value ) {
    value.bind( function( newval ) {
    $( '.typed-cursor' ).css( 'color', newval );
    } );
} );

// Title Statistics 1
wp.customize( 'avik_title_1_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.one h4' ).html( newval );

	} );
} );

// Title Statistics 2
wp.customize( 'avik_title_2_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.two h4' ).html( newval );

	} );
} );

// Title Statistics 3
wp.customize( 'avik_title_3_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.three h4' ).html( newval );

	} );
} );

// Title Statistics 4
wp.customize( 'avik_title_4_statistics_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.statistics-text.four h4' ).html( newval );

	} );
} );

// Title general Team
wp.customize( 'avik_title_general_team_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.title-team h3' ).html( newval );

	} );
} );

// Title Partner
wp.customize( 'avik_title_partner_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.title-brands h3' ).html( newval );

	} );
} );

// Subtitle Partner
wp.customize( 'avik_subtitle_partner_whoweare', function( value ) {
	value.bind( function( newval ) {
		$( '.title-brands h4' ).html( newval );

	} );
} );

/* ------------------------------------------------------------------------- *
## 3 Services */
/* ------------------------------------------------------------------------- */

// Title  Services
wp.customize( 'avik_title_services', function( value ) {
	value.bind( function( newval ) {
		$( 'h1.tab__title ' ).html( newval );

	} );
} );

// Subtitle Services
wp.customize( 'avik_subtitle_services', function( value ) {
	value.bind( function( newval ) {
		$( '.tab__subheading h2' ).html( newval );

	} );
} );

// Title Partners
wp.customize( 'avik_title_partners_services', function( value ) {
	value.bind( function( newval ) {
		$( '.title-partenrs h2' ).html( newval );

	} );
} );

// Subtitle Partners
wp.customize( 'avik_subtitle_partners_services', function( value ) {
	value.bind( function( newval ) {
		$( '.title-partenrs h3' ).html( newval );

	} );
} );

// Title 1 Price quotation
wp.customize( 'avik_title_1_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.separator-price h2' ).html( newval );

	} );
} );

// Subitle 1 Price quotation
wp.customize( 'avik_subtitle_1_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.separator-price h3' ).html( newval );

	} );
} );

// Title 2 Price quotation
wp.customize( 'avik_title_2_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.subtitle-price h3' ).html( newval );

	} );
} );

// Subtitle 2 Price quotation
wp.customize( 'avik_subtitle_2_quotation_services', function( value ) {
	value.bind( function( newval ) {
		$( '.subtitle-price h4' ).html( newval );

	} );
} );

/* ------------------------------------------------------------------------- *
## 4 Portfolio */
/* ------------------------------------------------------------------------- */

// Title Portfolio
wp.customize( 'avik_title_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( '#control-portfolio h3' ).html( newval );

	} );
} );

// Title Nav All
wp.customize( 'avik_title_nav_all_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.all' ).html( newval );

	} );
} );

// Title Nav 1
wp.customize( 'avik_title_nav_1_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.one' ).html( newval );

	} );
} );

// Title Nav 2
wp.customize( 'avik_title_nav_2_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.two' ).html( newval );

	} );
} );

// Title Nav 3
wp.customize( 'avik_title_nav_3_portfolio', function( value ) {
	value.bind( function( newval ) {
		$( 'li.three' ).html( newval );

	} );
} );

/* ------------------------------------------------------------------------- *
## 5 Blog */
/* ------------------------------------------------------------------------- */

// Title Blog
wp.customize( 'avik_title_blog', function( value ) {
	value.bind( function( newval ) {
		$( 'h2.blog' ).html( newval );

	} );
} );

/* ------------------------------------------------------------------------- *
## 6 Footer */
/* ------------------------------------------------------------------------- */



/* ------------------------------------------------------------------------- *
## 7 Color Filter Header Home */
/* ------------------------------------------------------------------------- */

// Color Filter
wp.customize( 'avik_color_filter_header', function( value ) {
	value.bind( function( newval ) {
		$( '.filter-header' ).css('background-color', newval );

	} );
} );




} )( jQuery );
