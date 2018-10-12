<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Monstera
 */

/**
 * Add theme support for Infinite Scroll.
 */


function monstera_jetpack_setup() {
//Register Infinite Scroll
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'monstera_infinite_scroll_render',
		'footer'    => 'false',
		'footer_widgets' => 'true',
	) );
} // end function monstera_jetpack_setup
add_action( 'after_setup_theme', 'monstera_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function monstera_infinite_scroll_render() {
/**
*Choose render style based on customizer settings
*/
        //Set vars
        $monstera_archive_layout = get_theme_mod('monstera_archive_layout', 'grid');
        $monstera_blog_layout = get_theme_mod('monstera_blog_layout', 'featured');

        //For block layouts
        if ((is_archive() && $monstera_archive_layout == 'grid') || (is_home() && $monstera_blog_layout == 'grid')){
                echo '<div class="infinite-posts clear">';
                    while ( have_posts() ) {
                    the_post();
                        get_template_part( 'template-parts/content', 'blocks' );
                    }
            echo'</div>';
        }

        //Or do rows
        elseif ((is_archive() && $monstera_archive_layout == 'standard') || (is_home() && ($monstera_blog_layout == 'standard'))) {
        	    while ( have_posts() ) {
                the_post();
                	get_template_part( 'template-parts/content', 'posts' );
                }
        } 

        //Otherwise, do standard
        else {
                while ( have_posts() ) {
                the_post();
                    get_template_part( 'template-parts/content', get_post_format() );
                }  
        }
    }

//* Configure JP Related Posts
//* Check for JP Related Posts before running
if ( class_exists( 'Jetpack_RelatedPosts' ) ) {

    //* Edit RP headline
    function stnsvn_related_posts_headline( $headline ) {
    $headline = sprintf(
                '<h3 class="stnsvn-relatedposts-headline">%s</h3>',
                esc_html( 'You might also like...', 'monstera' )
                );
    return $headline;
    }
    add_filter( 'jetpack_relatedposts_filter_headline', 'stnsvn_related_posts_headline' );

    //* Remove context meta
    add_filter( 'jetpack_relatedposts_filter_post_context', '__return_empty_string' );

    // change thumbnail size
    function stnsvn_jetpackchange_image_size ( $thumbnail_size ) {
        $thumbnail_size['width'] = 512;
        $thumbnail_size['height'] = 540;
        $thumbnail_size['crop'] = true;
        return $thumbnail_size;
    }
    add_filter( 'jetpack_relatedposts_filter_thumbnail_size', 'stnsvn_jetpackchange_image_size' );

        //* Unhook standard instance of RP
    function stnsvn_remove_rp() {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
    add_filter( 'wp', 'stnsvn_remove_rp', 20 );

    //* Include RP related posts in new spot
    add_action( 'monstera_after_entry', 'stnsvn_related_posts', 10 );

    function stnsvn_related_posts() { 
                if ( ! is_singular( 'post' ) )  return; 
                            echo    '<div class="stnsvn-rp-container">' , 
                                        do_shortcode( '[jetpack-related-posts]' ) , 
                                    '</div>';
    };

} //End Related Posts
