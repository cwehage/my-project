<?php
/**
 * @package Monstera
 * Inspired by Make theme: https://github.com/thethemefoundry/make/blob/master/src/partials/footer-layout.php
 */

// Footer Options
$sidebar_count = (int) get_theme_mod( 'footer_col_number', 3 );

// Test for enabled sidebars that contain widgets
$has_active_sidebar = false;
if ( $sidebar_count > 0 ) {
	$i = 1;
	while ( $i <= $sidebar_count ) {
		if ( is_active_sidebar( 'footer-' . $i ) ) {
			$has_active_sidebar = true;
			break;
		}
		$i++;
	}
}?>


		<?php // Footer widget areas
		if ( true === $has_active_sidebar ) : ?>
		<div class="footer-widgets columns-<?php echo esc_attr( $sidebar_count ); ?>">
			<?php
			$current_sidebar = 1;
			while ( $current_sidebar <= $sidebar_count ) :
				get_sidebar( 'footer-' . $current_sidebar );
				$current_sidebar++;
			endwhile; ?>
		</div>
		<?php endif; ?>


