<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="posts-container clear">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Grab different content parts depending on layout selection
						 */
						$monstera_archive_style = get_theme_mod('monstera_archive_layout', 'grid');
						if ($monstera_archive_style == 'grid'){
							get_template_part( 'template-parts/content', 'blocks' );
						} elseif ($monstera_archive_style == 'standard') {
							get_template_part( 'template-parts/content', 'posts' );
						} else {
							get_template_part( 'template-parts/content' );
						}
					?>

				<?php endwhile; ?>
			</div><!-- .posts-container -->
			
			<?php echo monstera_the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php $monstera_page_layout = get_theme_mod( 'monstera_archive_display_style', 'full_width');
		if ( $monstera_page_layout == 'sidebar') {
					get_sidebar(); //Do sidebar if sidebar enabled
				}
	?>

<?php get_footer(); ?>
