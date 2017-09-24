<?php
/**
 * Full screen mobile style template part.
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( 'fullscreen' != oceanwp_mobile_menu_style() ) {
	return;
}

// Navigation classes
$classes = array( 'clr' );

// If social
if ( true == get_theme_mod( 'ocean_menu_social', false ) ) {
	$classes[] = 'has-social';
}

// Turn classes into space seperated string
$classes = implode( ' ', $classes );

// Menu Location
$menu_location = apply_filters( 'ocean_main_menu_location', 'main_menu' );

// Menu arguments
$menu_args = array(
	'theme_location' => $menu_location,
	'menu_class'     => 'fs-dropdown-menu',
	'container'      => false,
	'fallback_cb'    => false,
);

// Check if custom menu
if ( $menu = oceanwp_header_custom_menu() ) {
	$menu_args['menu']  = $menu;
}

// Top bar menu Location
$top_menu_location = 'topbar_menu';

// Menu arguments
$top_menu_args = array(
	'theme_location' => $top_menu_location,
	'menu_class'     => 'fs-dropdown-menu',
	'container'      => false,
	'fallback_cb'    => false,
); ?>

<div id="mobile-fullscreen" class="clr">

	<div id="mobile-fullscreen-inner" class="clr">

		<a href="#" class="close">
			<div class="close-icon-wrap">
				<div class="close-icon-inner"></div>
			</div>
		</a>

		<nav class="<?php echo esc_attr( $classes ); ?>"<?php oceanwp_schema_markup( 'site_navigation' ); ?>>

			<?php
			// If has mobile menu
			if ( has_nav_menu( 'mobile_menu' ) ) {
				get_template_part( 'partials/mobile/mobile-nav' );
			} else {
				wp_nav_menu( $menu_args );

				// If has top bar menu
				if ( has_nav_menu( $top_menu_location ) ) {
					wp_nav_menu( $top_menu_args );
				}
			}

			// Mobile search form
		    if ( get_theme_mod( 'ocean_mobile_menu_search', true ) ) {
			    get_template_part( 'partials/mobile/mobile-fullscreen-search' );
			}

			// Social
			if ( true == get_theme_mod( 'ocean_menu_social', false ) ) {
				get_template_part( 'partials/header/social' );
			} ?>

		</nav>

	</div>

</div>