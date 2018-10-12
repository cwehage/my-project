<?php
/**
 * Monstera functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Monstera
 */

if ( ! function_exists( 'monstera_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function monstera_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on monstera, use a find and replace
	 * to change 'monstera' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'monstera', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages. Register custom sizes.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'multi-slide', 700, 700, TRUE );
	add_image_size( 'index-featured', 500, 500, TRUE );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'monstera' ),
		'secondary' => esc_html__( 'Secondary Menu', 'monstera'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // monstera_setup
add_action( 'after_setup_theme', 'monstera_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function monstera_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'monstera_content_width', 986 );
}
add_action( 'after_setup_theme', 'monstera_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function monstera_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'monstera' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Full Width Footer', 'monstera' ),
		'id'            => 'full-width-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );		

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'monstera' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'monstera' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'monstera' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );	

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'monstera' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	
}
add_action( 'widgets_init', 'monstera_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function monstera_scripts() {
	wp_enqueue_style( 'monstera-style', get_stylesheet_uri() );

	wp_enqueue_script( 'monstera-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'monstera-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'pinterest', '//assets.pinterest.com/js/pinit.js', '', '', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', '', '3.1.8', true );
    wp_enqueue_script( 'flickity', get_template_directory_uri() . '/js/flickity.pkgd.min.js', '', '1.0.0', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', '', '0.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'monstera_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file if jetpack installed.
 */
if ( class_exists( 'Jetpack' )){
require get_template_directory() . '/inc/jetpack.php';
}

/*
 * If WooCommerce installed, load WC functions.
 */
if (class_exists( 'WooCommerce' )){
require get_template_directory() . '/inc/woocommerce.php';
}

/*
 * Setup third party plugins
 */
require_once('inc/plugins/tgm-plugin-activation/tgm-plugin-activation-config.php');

/*
 * Setup one click install
 * If WooCommerce is installed, don't call one click install files (creates conflict with product inventory)
 */
if (!class_exists( 'WooCommerce' )){
require get_template_directory() .'/inc/plugins/radium-one-click-demo-install/init.php';
}

/**
 * Station Seven Functions Begin
 *
 * 
 */

/**
* Load Google Fonts
*/
add_action( 'wp_enqueue_scripts', 'monstera_google_fonts' );
function monstera_google_fonts() {
    wp_enqueue_style( 'monstera-google-fonts', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Montserrat:400,700', array(), null );
}

/**
* Load Font Awesome
*/
add_action( 'wp_enqueue_scripts', 'monstera_font_awesome' );
function monstera_font_awesome() {
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
}

//Manage Featured Slider customizer actions

    //Implement featured slider settings
    add_action('wp_footer','monstera_featured_autoscroll');
    function monstera_featured_autoscroll() {
        $monstera_autoscroll_delay = get_theme_mod( 'monstera_autoscroll', 0 );
        $monstera_draggable = get_theme_mod( 'monstera_draggable', 0);
        $monstera_slider_arrows = get_theme_mod( 'monstera_slider_arrows', 0);

        //Set variable for draggable
        if ($monstera_draggable == 1) {
            $monstera_is_draggable = 'false';
        } else {
            $monstera_is_draggable = 'true';
        }

        //Set variable for arrow toggle
        if ($monstera_slider_arrows == 1) {
            $monstera_has_arrows = 'false';
        } else {
            $monstera_has_arrows = 'true';
        }

        //Localize the script
        wp_localize_script( 'main', 'MonsteraSlider', array('delay' => $monstera_autoscroll_delay, 'draggable' => $monstera_is_draggable, 'arrows' => $monstera_has_arrows) );
    }

//Register slider display
add_action( 'stnsvn_slider', 'stnsvn_display_slider', 1 );

function stnsvn_display_slider(){
	$slider_home = get_theme_mod( 'slider_home', 0 );
	if ($slider_home != 1 && is_home()) {
		get_template_part( 'template-parts/content', 'slider' );
	}
}

/**
* Remove default "read more" for excerpts
*/
// Changing excerpt more
   function monstera_excerpt_more($more) {
   global $post;
   return '...';
   }
   add_filter('excerpt_more', 'monstera_excerpt_more');

/**
* Remove default "read more" for custom excerpts
*/
// Changing excerpt more
   function monstera_custom_excerpt_more($more) {
   global $post;
   return $more . '<h5 class="read-more"><a href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a></h5>';
   }
   add_filter('the_excerpt', 'monstera_custom_excerpt_more');

/**
* Customize the Read More quicktag
*/
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
	global $post;
   	return '<h5 class="read-more"><a href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a></h5>';
}

/**
* Customize Jetpack "Older Posts"
*/
function monstera_filter_jetpack_is( $settings ) {
	$settings['text'] = __( 'Load More', 'monstera' );
	return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'monstera_filter_jetpack_is' );

/**
* Control Sidebar Layouts
*/

//Single Posts
function monstera_sidebar_posts(){
			add_filter( 'body_class', 'monstera_post_sidebar_classes' ); //Add class to body
		    function monstera_post_sidebar_classes( $classes ) {
		    	$monstera_page_layout = get_theme_mod( 'monstera_display_style', 'sidebar');
					if ( $monstera_page_layout == 'sidebar' && (is_singular('post') || is_singular('jetpack-portfolio') ) ) {
			     	   $classes[] = 'sidebar-layout';
			    	}
			    	return $classes;
				} 
			}
add_action('after_setup_theme', 'monstera_sidebar_posts');

//Single Pages
function monstera_sidebar_pages(){
			add_filter( 'body_class', 'monstera_page_sidebar_classes' ); //Add class to body
		    function monstera_page_sidebar_classes( $classes ) {
		    	$monstera_page_layout = get_theme_mod( 'monstera_page_display_style', 'full_width');
					if ( $monstera_page_layout == 'sidebar' && is_singular('page') && !is_page_template('page-landing.php') && !(class_exists( 'WooCommerce' ) && (is_checkout() || is_cart() ) )) {
			     	   $classes[] = 'sidebar-layout';
			    	}
			    	return $classes;
				} 
			}

add_action('after_setup_theme', 'monstera_sidebar_pages');

//Archive Pages
function monstera_sidebar_archives(){
			add_filter( 'body_class', 'monstera_archive_sidebar_classes' ); //Add class to body
		    function monstera_archive_sidebar_classes( $classes ) {
		    	$monstera_page_layout = get_theme_mod( 'monstera_archive_display_style', 'full_width');
					if ( $monstera_page_layout == 'sidebar' && is_archive() && !(class_exists( 'WooCommerce' ) && is_woocommerce()) ) {
			     	   $classes[] = 'sidebar-layout';
			    	}
			    	return $classes;
				} 
			}
add_action('after_setup_theme', 'monstera_sidebar_archives');

//Blog Page
function monstera_sidebar_blog(){
			add_filter( 'body_class', 'monstera_blog_sidebar_classes' ); //Add class to body
		    function monstera_blog_sidebar_classes( $classes ) {
		    	$monstera_page_layout = get_theme_mod( 'monstera_blog_display_style', 'sidebar');
					if ( $monstera_page_layout == 'sidebar' && (is_home() || is_search())) {
			     	   $classes[] = 'sidebar-layout';
			    	}
			    	return $classes;
				} 
			}
add_action('after_setup_theme', 'monstera_sidebar_blog');

//Control Block Layout Class
function monstera_sidebar_blocks(){
			add_filter( 'body_class', 'monstera_sidebar_block_classes' ); //Add block-layout class to body
		    function monstera_sidebar_block_classes( $classes ) {
				$monstera_blog_style = get_theme_mod('monstera_blog_layout', 'featured');
				$monstera_archive_style = get_theme_mod('monstera_archive_layout', 'grid');
				if ( ($monstera_blog_style == 'grid' && (is_home() || is_search()) ) || ($monstera_archive_style == 'grid' && is_archive()) ){
			     	$classes[] = 'block-layout';
			     }
			    return $classes;
			} 
		}
 
add_action('after_setup_theme', 'monstera_sidebar_blocks');

/**
* Control Placeholder Text
*/
//Edit comment form placeholder text
add_filter( 'comment_form_default_fields', 'stnsvn_comment_placeholders' );
function stnsvn_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
            . _x(
                'Name',
                'comment form placeholder',
                'monstera'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="email"',
        '<input type="email" placeholder="'.__('Email').'"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="url"',
        '<input placeholder="'.__('Url').'" id="url" name="url" type="url"',
        $fields['url']
    );

    return $fields;
}

//* Modify comments title text in comments
add_filter( 'comment_form_defaults', 'stnsvn_comment_form_defaults' );
function stnsvn_comment_form_defaults( $defaults ) {
 
    $defaults['title_reply'] = __( 'Leave a Comment', 'monstera' );
    return $defaults;
}

//* Modify post navigation
function monstera_custom_nav(){
	$navigation = '';
	$previous   = get_previous_post_link( '<div class="nav-previous">%link</div>', __('Previous Post', 'monstera') );
	$next       = get_next_post_link( '<div class="nav-next">%link</div>', __('Next Post', 'monstera') );

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
		$navigation = _navigation_markup( $previous . $next, 'post-navigation' );
	}

	echo $navigation;
}

add_action('monstera_after_entry', 'monstera_custom_nav', 15);

//*Modify Index navigation
function monstera_the_posts_navigation( $args = array() ) {
  $navigation = '';
 
  // Don't print empty markup if there's only one page.
  if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
      $args = wp_parse_args( $args, array(
          'prev_text'         => __( 'Older posts', 'monstera' ), 
          'next_text'         => __( 'Newer posts', 'monstera' ), 
          'screen_reader_text' => __( 'Posts navigation', 'monstera' ), 
      ) );
 
      $next_link = get_previous_posts_link( $args['next_text'] );
      $prev_link = get_next_posts_link( $args['prev_text'] );
 
      if ( $prev_link ) {
          $navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
      }
 
      if ( $next_link ) {
          $navigation .= '<div class="nav-next">' . $next_link . '</div>';
      }
 
      $navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );
  }
 
  return $navigation;
}

//*Modify excerpt length
function monstera_excerpt_length( $length ) {
	$monstera_excerpt = get_theme_mod('monstera_excerpt_length', '55');
	return $monstera_excerpt;
	}

add_filter( 'excerpt_length', 'monstera_excerpt_length' );


// Set default attachment display settings
function monstera_image_defaults() {
    // Set default values for the upload media box
    update_option('image_default_align', 'center' );
    update_option('image_default_link_type', 'none' );
    update_option('image_default_size', 'full' );
}
add_action('after_setup_theme', 'monstera_image_defaults');

/**
 * Enables Jetpack's Infinite Scroll in search pages, disables it in product archives
 * @return bool
 */
function monstera_jetpack_infinite_scroll_supported() {
	return current_theme_supports( 'infinite-scroll' ) && ( is_home() || is_archive() ) && ! is_post_type_archive( 'product' ) && !is_search();
}
add_filter( 'infinite_scroll_archive_supported', 'monstera_jetpack_infinite_scroll_supported' );

/**
* Configure ACF Pro
*/

    // 1. customize ACF path
    add_filter('acf/settings/path', 'monstera_acf_settings_path');
     
    function monstera_acf_settings_path( $path ) {
     
        // update path
        $path = get_template_directory() . '/inc/plugins/advanced-custom-fields-pro/';
        
        // return
        return $path;
        
    }
     
    // 2. customize ACF dir
    add_filter('acf/settings/dir', 'monstera_acf_settings_dir');
     
    function monstera_acf_settings_dir( $dir ) {
     
        // update path
        $dir = get_template_directory_uri() . '/inc/plugins/advanced-custom-fields-pro/';
        
        // return
        return $dir;
        
    }
     
    // 3. Hide ACF field group menu item
    $monstera_acf_pro = get_theme_mod('monstera_acf_pro', 0);
    if ($monstera_acf_pro != 1) {
        add_filter('acf/settings/show_admin', '__return_false');
    }
    
    // 4. Include ACF
    include_once( get_template_directory() . '/inc/plugins/advanced-custom-fields-pro/acf.php' );
    require_once('inc/plugins/monstera-acf-pro-settings.php');


/**
*Include shortcodes and Stnsvn widgets
*/
require_once('inc/shortcodes.php');
require_once('inc/stnsvn-social-widget.php');
require_once('inc/stnsvn-nopadding-widget.php');
require_once('inc/stnsvn-about-widget.php');

/**
* Initialize Update Checker
*/
require ('inc/plugins/automatic-theme-updates/theme-updates/theme-update-checker.php');
$monstera_update_checker = new ThemeUpdateChecker(
    'monstera',
    'http://updates.stnsvn.com/monstera/monstera-theme-updates.json'
);

/**
* Enable back to top
*/

	//Add anchor to head
	add_action ('wp_head', 'stnsvn_btt_anchor');
	function stnsvn_btt_anchor(){ 
		//If disabled in customizer, no output
		$stnsvn_btt_display = get_theme_mod('stnsvn_btt_display', 0);
		if ($stnsvn_btt_display != 1) { ?>
			<span id="top"></span><!-- Back to top anchor -->
		<?php }
	 } 

	//Add btt button to footer
	add_action('stnsvn_btt_button', 'stnsvn_button_settings');
	function stnsvn_button_settings(){
		$stnsvn_btt_text = get_theme_mod('stnsvn_btt_text', 'Back to top <i class="fa fa-chevron-up"></i>' );
		$stnsvn_btt_display = get_theme_mod('stnsvn_btt_display', 0);
			if (($stnsvn_btt_display != 1) && ($stnsvn_btt_text != '')) { ?>
					<a href="#top" class="stnsvn-btt" style="float: right;"><h5><?php echo $stnsvn_btt_text; ?></h5></a><!--Back to top button -->
				<?php }
	 }

// Display full width featured images on single pages and posts
	add_action('stnsvn_slider', 'monstera_wide_featured', 10);

	function monstera_wide_featured() {
		$monstera_page_featured = get_theme_mod('monstera_page_featured', 1);
		$monstera_post_featured = get_theme_mod('monstera_post_featured', 1);

		if ( (is_page() && ($monstera_page_featured == 1)) ||
			 (is_single() && ($monstera_post_featured == 1) && !(class_exists( 'WooCommerce' ) && is_product()) )
			 ) {
				if (has_post_thumbnail()) {  // If has post thumbnail, display it
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
					$thumb_url = $thumb_url_array[0];	
					?>
			            		<div class="page-featured-img" style="background: url('<?php echo $thumb_url; ?>'); background-position: 50%; background-size: cover;"></div>
			<?php }
 		}
	}


