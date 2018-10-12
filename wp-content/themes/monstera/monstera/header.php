<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Monstera
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php 
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
$thumb_url = $thumb_url_array[0];
?>

<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:type" content="blog"/>
<meta property="og:title" content="<?php the_title(); ?>"/>
<meta property="og:url" content="<?php the_permalink(); ?>"/>
<meta property="og:image" content="<?php echo $thumb_url; ?>"/>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if ( has_nav_menu( 'primary' ) ) { //Display nav only if set 
	?>

		<div class="primary-nav-container">
			<nav id="site-navigation" class="main-navigation" role="navigation">

					<?php //Display social icons
						$monstera_social_location = get_theme_mod('monstera_social_location', 'none');

						if ($monstera_social_location != 'none') { ?>
							<span class="header-icons <?php if ($monstera_social_location == 'nav_right'){ echo 'social-icons-right'; }?>">
            					<?php get_template_part( 'template-parts/content', 'social' ); ?>
            				</span>
            			<?php }
            		?>

					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'monstera' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

					<?php //Display WC cart icon if enabled
						$stnsvn_cart_display = get_theme_mod('stnsvn_cart_display', 0);
						if (class_exists( 'WooCommerce' ) && ($stnsvn_cart_display != 1)){ ?>
							<span class="header-icons cart-icon">
								<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
									<i class="fa fa-shopping-bag" fa-fw></i>
									<?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
								</a>
							</span>
						<?php } 
					?>

			</nav>
		</div><!-- #site-navigation -->
		
	<?php } //end nav conditional
	?>

	<header id="masthead" class="site-header" role="banner"
			<?php if ( get_header_image() ){
				echo 'style="background: url(\'' , header_image() , '\'), no-repeat; background-position: 50%; background-size: cover;"';
			} ?>
	>

		<?php //add class if full width logo enabled
		$full_width_logo = get_theme_mod( 'full_width_logo' );
			if( $full_width_logo == '1' ) {
				echo '<div class="full-logo site-branding">';
			} else {
				echo '<div class="site-branding">';
			}
		?>
			

			<?php   //If logo is uploaded, display it instead of site title
					$logo_upload = get_theme_mod( 'logo_upload' );
    				if( $logo_upload != '' ) {
						echo '<div class="header-logo" id="body-logo"><a href="' , get_home_url() , '"><img src="' , get_theme_mod('logo_upload') , '" alt="' , get_bloginfo ( 'name' ) , '"></a></div>';
						}					
					else if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

			<p class="site-description"><?php bloginfo( 'description' ); ?></p>

		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'monstera' ); ?></a>

		<?php if ( has_nav_menu( 'secondary' ) ) { //Display nav only if set 
		?>

			<div class="secondary-nav-container">
				<nav id="secondary-nav" class="secondary-nav" role="navigation">
					<button class="menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e( 'Secondary Menu', 'monstera' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
				</nav><!-- #secondary-nav -->
			</div>

		<?php } //end nav conditional
		?>

		<?php do_action('stnsvn_slider'); ?>

	<div id="content" class="site-content">

		<?php do_action('stnsvn_featured'); ?>