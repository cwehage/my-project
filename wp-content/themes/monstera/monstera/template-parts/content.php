<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

?>

<article class="index-article row-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="index-featured" style="background: url('<?php echo the_post_thumbnail_url( 'full' ); ?>') no-repeat; background-position: 50%; background-size: cover;"></div>
	<?php 
		//render mobile image 
	?>
	<div class="index-featured mobile-only">
        <?php if (has_post_thumbnail()) { ?>
            <a href="<?php echo the_permalink();?>">
                <?php echo the_post_thumbnail('full'); ?>
            </a>
        <?php } ?>
    </div>

	<div class="index-content">
		<header class="entry-header">
			<?php 	
            	get_template_part( 'template-parts/content', 'category' ); 
			?>

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>


		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_excerpt( sprintf(
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

	</div><!-- .index-content -->
</article><!-- #post-## -->
