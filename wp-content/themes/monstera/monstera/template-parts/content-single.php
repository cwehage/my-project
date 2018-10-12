<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php $display_cats = get_theme_mod('display_cats', '1');
		if ($display_cats == '1') {
            	get_template_part( 'template-parts/content', 'category' ); 
		} ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php monstera_posted_on(); ?>
		</div><!-- .entry-meta -->
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
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'monstera' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php monstera_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

