<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Monstera
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">

	<?php get_template_part( 'template-parts/footer', 'widgets' ); ?>
	<?php get_template_part( 'template-parts/footer', 'fullwidth' ); ?>

<?php wp_footer(); ?>

	<div class="site-info">
	    <?php
		    $coastal_display_copyright = get_theme_mod( 'copyright-footer' );
		    $coastal_stnsvn_credit = get_theme_mod( 'stnsvn-credit' );
		    if ( $coastal_display_copyright == '' ) {
		        echo '<h4 class="site-copyright">Copyright ' , date("Y ") , bloginfo("name");
		        }
		    else { 
		        echo '<h4 class="site-copyright">' , get_theme_mod( 'copyright-footer' ) ; 
		        }
		    if ( $coastal_stnsvn_credit == '') {
		    echo  '<span id="stnsvn-credit"> | ' , __('Site design handcrafted by ', 'monstera') , '<a href="http://stnsvn.com" target="_blank">Station Seven</a></span></h4>';
		    } else {
		    echo '</h4>'; //Close footer h4 tag
		    }
	    ?>
    	<?php do_action('stnsvn_btt_button'); ?>
    </div><!-- .site-info -->

</footer><!-- #colophon -->

</body>
</html>
