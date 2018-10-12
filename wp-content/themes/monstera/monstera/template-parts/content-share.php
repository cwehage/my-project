<?php
/**
 * Template part for displaying the share icons.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

?>

<div class="share-group">
    <h5 class="fb-share-button share-button"> 
		<a href="#" onclick="
					window.open(
					  'https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>',
					  'facebook-share-dialog',
					  'width=625,height=430'
					); return false;" href="#" title="Facebook">			
	    	<?php _e('Share', 'monstera');?>
	    </a>
    </h5>

	<h5 class="pinterest-share share-button">
    	<a data-pin-do="buttonBookmark" data-pin-custom="true" href="//www.pinterest.com/pin/create/button/" data-pin-url="<?php the_permalink(); ?>"><img src="#"><?php _e('Pin', 'monstera');?></a>
	</h5>

	<h5 class="twitter-share share-button">
		<a class="twitter action-button" onclick="
					window.open(
					  'https://twitter.com/home?status=<?php the_title();?> <?php the_permalink();?>',
					  'twitter-share-dialog',
					  'width=625,height=430'
					); return false;" href="#" title="Twitter">
		<?php _e('Tweet', 'monstera');?>
	</a>
	</h5>

	<h5 class="email-share share-button">
		<a href="mailto:"><?php _e('Email', 'monstera');?></a>
	</h5>

	<h5 class="comment-share share-button">
		<a href="<?php echo the_permalink() . '#respond';?>"><?php _e('Comment', 'monstera');?></a>
	</h5>
</div>
