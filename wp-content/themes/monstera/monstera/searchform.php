<?php
/**
 * Template for displaying search forms in Monstera
 *
 * @package Monstera
 * @author Station Seven <hello@stnsvn.com> 
 * @copyright Copyright (c) 2016, Station Seven
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'monstera' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'monstera' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'monstera' ); ?>" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'monstera' ); ?></span><i class="fa fa-search"></i></button>
</form>
