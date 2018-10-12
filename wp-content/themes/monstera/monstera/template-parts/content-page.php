<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

			<?php if (!has_post_thumbnail()) {  //If no post thumbnail, just do normal page title ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('no-featured'); ?>>
			<?php } else { ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php } ?>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'monstera' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

		</article><!-- #post-## -->

		<?php
	
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
	?>

	</main><!-- #main -->
</div><!-- #primary -->

