<?php
/**
 * Template part for displaying the share icons.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

?>

<?php //grab vars from customizer
    $monstera_fb_link = get_theme_mod( 'monstera_fb_link', '' );
    $monstera_pinterest_link = get_theme_mod( 'monstera_pinterest_link', '' );
    $monstera_instagram_link = get_theme_mod( 'monstera_instagram_link', '' );
    $monstera_twitter_link = get_theme_mod( 'monstera_twitter_link', '' );
    $monstera_google_link = get_theme_mod( 'monstera_google_link', '' );
    $monstera_bloglovin_link = get_theme_mod( 'monstera_bloglovin_link', '' );
    $monstera_custom_icon_1 = get_theme_mod( 'monstera_custom_icon_1', '' );
    $monstera_custom_icon_1_link = get_theme_mod( 'monstera_custom_icon_1_link', '' );
    $monstera_custom_icon_2 = get_theme_mod( 'monstera_custom_icon_2', '' );
    $monstera_custom_icon_2_link = get_theme_mod( 'monstera_custom_icon_2_link', '' );
    $monstera_custom_icon_3 = get_theme_mod( 'monstera_custom_icon_3', '' );
    $monstera_custom_icon_3_link = get_theme_mod( 'monstera_custom_icon_3_link', '' );
    $monstera_custom_icon_4 = get_theme_mod( 'monstera_custom_icon_4', '' );
    $monstera_custom_icon_4_link = get_theme_mod( 'monstera_custom_icon_4_link', '' );
    $monstera_custom_icon_5 = get_theme_mod( 'monstera_custom_icon_5', '' );
    $monstera_custom_icon_5_link = get_theme_mod( 'monstera_custom_icon_5_link', '' );
    $monstera_custom_icon_6 = get_theme_mod( 'monstera_custom_icon_6', '' );
    $monstera_custom_icon_6_link = get_theme_mod( 'monstera_custom_icon_6_link', '' );
    $monstera_target_blank = get_theme_mod( 'monstera_target_blank', 1 );
?>

<span class="monstera-social-icons">
	<?php //Facebook
		if ($monstera_fb_link || '' ){ ?>
			<a href="<?php echo $monstera_fb_link; ?>" 
				<?php //set target blank
					if ($monstera_target_blank == 1){ 
						echo 'target="_blank"'; 
				} ?> 
			>
				<i class="fa fa-facebook fa-fw"></i>
			</a>
	<?php } ?>

	<?php //Pinterest
		if ($monstera_pinterest_link || '' ){ ?>
			<a href="<?php echo $monstera_pinterest_link; ?>" 
				<?php //set target blank
					if ($monstera_target_blank == 1){ 
						echo 'target="_blank"'; 
				} ?> 
			>
				<i class="fa fa-pinterest-p fa-fw"></i>
			</a>
	<?php } ?>

	<?php //Instagram
		if ($monstera_instagram_link || '' ){ ?>
			<a href="<?php echo $monstera_instagram_link; ?>" 
				<?php //set target blank
					if ($monstera_target_blank == 1){ 
						echo 'target="_blank"'; 
				} ?> 
			>
				<i class="fa fa-instagram fa-fw"></i>
			</a>
	<?php } ?>

	<?php //Twitter
		if ($monstera_twitter_link || '' ){ ?>
			<a href="<?php echo $monstera_twitter_link; ?>" 
				<?php //set target blank
					if ($monstera_target_blank == 1){ 
						echo 'target="_blank"'; 
				} ?> 
			>
				<i class="fa fa-twitter fa-fw"></i>
			</a>
	<?php } ?>

	<?php //Google+
		if ($monstera_google_link || '' ){ ?>
			<a href="<?php echo $monstera_google_link; ?>" 
				<?php //set target blank
					if ($monstera_target_blank == 1){ 
						echo 'target="_blank"'; 
				} ?> 
			>
				<i class="fa fa-google-plus fa-fw"></i>
			</a>
	<?php } ?>

	<?php //Bloglovin'
		if ($monstera_bloglovin_link || '' ){ ?>
			<a href="<?php echo $monstera_bloglovin_link; ?>" 
				<?php //set target blank
					if ($monstera_target_blank == 1){ 
						echo 'target="_blank"'; 
				} ?> 
			>
				<i class="fa fa-heart fa-fw"></i>
			</a>
	<?php } ?>

	<?php //Custom icon 1
		if ( $monstera_custom_icon_1 || '' ){ ?>
			<a href="<?php echo $monstera_custom_icon_1_link; ?>" 
				<?php //set target blank
					if ($monstera_target_blank == 1){ 
						echo 'target="_blank"'; 
				} ?> 
			>

				<?php //Display custom FA icon ?>
				<i class="fa fa-<?php echo $monstera_custom_icon_1; ?> fa-fw"></i>
			</a>
	<?php } ?>

	<?php //Custom icon 2
	if ( $monstera_custom_icon_2 || '' ){ ?>
		<a href="<?php echo $monstera_custom_icon_2_link; ?>" 
			<?php //set target blank
				if ($monstera_target_blank == 1){ 
					echo 'target="_blank"'; 
			} ?> 
		>

			<?php //Display custom FA icon ?>
			<i class="fa fa-<?php echo $monstera_custom_icon_2; ?> fa-fw"></i>
		</a>
	<?php } ?>

	<?php //Custom icon 3
	if ( $monstera_custom_icon_3 || '' ){ ?>
		<a href="<?php echo $monstera_custom_icon_3_link; ?>" 
			<?php //set target blank
				if ($monstera_target_blank == 1){ 
					echo 'target="_blank"'; 
			} ?> 
		>

			<?php //Display custom FA icon ?>
			<i class="fa fa-<?php echo $monstera_custom_icon_3; ?> fa-fw"></i>
		</a>
	<?php } ?>

	<?php //Custom icon 4
	if ( $monstera_custom_icon_4 || '' ){ ?>
		<a href="<?php echo $monstera_custom_icon_4_link; ?>" 
			<?php //set target blank
				if ($monstera_target_blank == 1){ 
					echo 'target="_blank"'; 
			} ?> 
		>

			<?php //Display custom FA icon ?>
			<i class="fa fa-<?php echo $monstera_custom_icon_4; ?> fa-fw"></i>
		</a>
	<?php } ?>

	<?php //Custom icon 5
	if ( $monstera_custom_icon_5 || '' ){ ?>
		<a href="<?php echo $monstera_custom_icon_5_link; ?>" 
			<?php //set target blank
				if ($monstera_target_blank == 1){ 
					echo 'target="_blank"'; 
			} ?> 
		>

			<?php //Display custom FA icon ?>
			<i class="fa fa-<?php echo $monstera_custom_icon_5; ?> fa-fw"></i>
		</a>
	<?php } ?>

	<?php //Custom icon 6
	if ( $monstera_custom_icon_6 || '' ){ ?>
		<a href="<?php echo $monstera_custom_icon_6_link; ?>" 
			<?php //set target blank
				if ($monstera_target_blank == 1){ 
					echo 'target="_blank"'; 
			} ?> 
		>

			<?php //Display custom FA icon ?>
			<i class="fa fa-<?php echo $monstera_custom_icon_6; ?> fa-fw"></i>
		</a>
	<?php } ?>

</span>
