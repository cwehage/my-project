<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Monstera
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			 <?php
            $display_share = get_theme_mod('display_share_single', 1);
                if ($display_share == '1'){
                     get_template_part( 'template-parts/content', 'share' );
                 }
             ?>

			<?php do_action('monstera_after_entry'); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php $monstera_single_layout = get_theme_mod( 'monstera_display_style', 'sidebar');
			if ( $monstera_single_layout == 'sidebar') {
					get_sidebar();
				} 
	?>

<?php get_footer(); ?>
