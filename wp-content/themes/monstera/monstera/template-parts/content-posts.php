<?php
/**
 * Template part for displaying normal blog posts posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

?>

<article class="monstera-posts" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="index-content">

		<header class="entry-header">
			<?php 
            	get_template_part( 'template-parts/content', 'category' ); 
			?>


			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php monstera_posted_on(); ?>
			</div>
			<?php get_template_part( 'template-parts/content', 'icons' ); ?>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php $single_featured_img = get_theme_mod('display_featured_img', '1');
		if ($single_featured_img == '1'){ ?>
			<div class="monstera-featured-img">
				<?php if (has_post_thumbnail()) {
					echo the_post_thumbnail('full'); 
				} ?>
			</div>
		<?php } ?>

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'monstera' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'monstera' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<!-- Hide entry footer... for now
		<footer class="entry-footer">
			<?php monstera_entry_footer(); ?>
		</footer>
		-->
	
	</div><!-- .index-content -->
</article><!-- #post-## -->
