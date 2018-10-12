<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>



	<?php $monstera_page_layout = get_theme_mod( 'monstera_page_display_style', 'full_width');
			$monstera_wc_layout = get_theme_mod( 'monstera_woocommerce_style', 'full_width');
		if ( $monstera_page_layout == 'sidebar' && !(class_exists( 'WooCommerce' ) && (is_checkout() || is_cart() ) )) {
			get_sidebar(); //Do sidebar if sidebar enabled
		} elseif ( 
			$monstera_wc_layout == 'sidebar' && (class_exists( 'WooCommerce' ) && (is_checkout() || is_cart()))) {
			get_sidebar(); //Do WooCommerce sidebar if sidebar enabled
		}
	?>

<?php get_footer(); ?>
