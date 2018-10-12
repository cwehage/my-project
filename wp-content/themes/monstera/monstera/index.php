<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php elseif ( is_search() ) : ?>
				<header>
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'monstera' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

			<?php endif; ?>

			<div class="posts-container clear">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Grab different content parts depending on layout selection
						 */
						$monstera_blog_style = get_theme_mod('monstera_blog_layout', 'featured');
						if ($monstera_blog_style == 'grid'){
							get_template_part( 'template-parts/content', 'blocks' );
						} 
						elseif ($monstera_blog_style == 'standard'){
							get_template_part( 'template-parts/content', 'posts' );
						} 
						elseif ( is_home() && $wp_query->current_post == 0 && !is_paged() && $monstera_blog_style == 'featured') {
							get_template_part( 'template-parts/content', 'featured-post' );
						    } 

					    else {
						/*
						 * Run row layout blog posts
						 */
						get_template_part( 'template-parts/content', get_post_format() );
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

	<?php $monstera_single_layout = get_theme_mod( 'monstera_blog_display_style', 'sidebar');
			if ( $monstera_single_layout == 'sidebar') {
					get_sidebar();
				} 
	?>

<?php get_footer(); ?>
