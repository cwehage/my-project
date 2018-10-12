<?php
/*
 * Configure WooCommerce
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Unhook WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Set WooCommerce wrappers
add_action('woocommerce_before_main_content', 'stnsvn_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'stnsvn_wrapper_end', 10);

function stnsvn_wrapper_start() {
  echo '<div id="primary" class="content-area">
  			<main id="main" class="site-main" role="main">';
}

function stnsvn_wrapper_end() {
  echo '</main>
    	<!-- #main -->
  		</div>
  		<!-- #primary -->';
}

// Display full width featured images on single pages and posts
    add_action('stnsvn_slider', 'monstera_shop_featured', 10);

    function monstera_shop_featured() {
        $monstera_shop_featured = get_theme_mod('monstera_shop_featured', 1);
        $monstera_product_featured = get_theme_mod('monstera_product_featured', 1);
        $shop_id = wc_get_page_id('shop');

        if (is_shop() && ($monstera_shop_featured == 1) && has_post_thumbnail($shop_id) ) {  // If has post thumbnail, display
                $thumb_id = get_post_thumbnail_id($shop_id);
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                $thumb_url = $thumb_url_array[0]; ?>
                    <div class="page-featured-img" style="background: url('<?php echo $thumb_url; ?>'); background-position: 50%; background-size: cover;"></div>
        <?php } 

        else if (is_product() && ($monstera_product_featured == 1) && has_post_thumbnail() ) { // If has post thumbnail, display it
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                $thumb_url = $thumb_url_array[0]; ?>
                    <div class="page-featured-img" style="background: url('<?php echo $thumb_url; ?>'); background-position: 50%; background-size: cover;"></div>  
        <?php }  
    }

//Add shop class to shop page
if (class_exists( 'WooCommerce' )) {
    add_filter( 'body_class', 'monstera_shop_class' );
    function monstera_shop_class( $classes ) {
            if ( is_shop( ) ) {
                $classes[] = 'shop-page';
            } 
            return $classes;
        }
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'monstera_loop_columns');
if (!function_exists('monstera_loop_columns')) {
    function monstera_loop_columns() {
        return 3; // 3 products per row
    }
}

// Changes number of products shown in WC
add_action('wp_loaded', 'monstera_number_wc_products');

function monstera_number_wc_products(){
    $number_products = get_theme_mod('wc_number_products', '6');
    add_filter( 'loop_shop_per_page', function( $cols ) use ( $number_products ) {
            return $number_products;
        }, 20
    );
}

//Configure WC Sidebar
add_action('woocommerce_sidebar', 'monstera_remove_wc_sidebar', 5);

function monstera_remove_wc_sidebar() {
    $monstera_wc_sidebar = get_theme_mod('monstera_woocommerce_style', 'full_width');
    if ($monstera_wc_sidebar == 'full_width'){
    	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
    }
}

//WC Sidebar
function monstera_sidebar_wc(){
			add_filter( 'body_class', 'monstera_wc_sidebar_classes' ); //Add class to body
		    function monstera_wc_sidebar_classes( $classes ) {
		    	$monstera_wc_layout = get_theme_mod( 'monstera_woocommerce_style', 'full_width');
					if ( $monstera_wc_layout == 'sidebar' && (class_exists( 'WooCommerce' ) && (is_checkout() || is_cart() || is_woocommerce()) )) {
			     	   $classes[] = 'sidebar-layout';
			    	}
			    	return $classes;
				} 
			}

add_action('after_setup_theme', 'monstera_sidebar_wc');

//Add placeholder text to WooCommerce fields
    add_action( 'wp_head', 'monstera_review_inputs' );
    function monstera_review_inputs() {
        if (is_product()) {
         ?>       <script>
                jQuery(document).ready(function() {
                  jQuery('#author').attr('placeholder', 'Name');
                  jQuery('#email').attr('placeholder', 'Email');
                });
                </script>
        <?php
            }
    }

// Ensure cart contents update when products are added to the cart via AJAX
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
        <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
            <i class="fa fa-shopping-bag" fa-fw></i>
            <?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
        </a> 
    <?php
    
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return $fragments;
}

//Add support for WC3.0 gallery features

add_action( 'after_setup_theme', 'monstera_wc3_setup' );

function monstera_wc3_setup() {
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}
