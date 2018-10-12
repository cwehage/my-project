<?php
/**
 * Template part for displaying share and comment icons
 *
 * @package Monstera
 */

?>

<?php
	$monstera_comment_icon = get_theme_mod('monstera_comment_icon', 1);
	$monstera_share_icon = get_theme_mod('monstera_share_icon', 1);

	if (($monstera_comment_icon || $monstera_share_icon) == 1 ){
?>

<div class="comment-icons">

	<?php //Render comment icon if enabled in customizer
		if ($monstera_comment_icon == 1 ){
	?>

		<a href="<?php comments_link(); ?>">
			<span class="comment-icon"><i class="fa fa-comment"></i><span class="h4"><?php comments_number( '', '1', '%' ); ?></span></span>
		</a>
		
	<?php } //end comment icon

	//Render share icon is enabled in customizer
		if ($monstera_share_icon == 1 ){
	?>	
		
		<span class="share-icon"><i class="fa fa-share"></i>
			<div class="share-group share-hidden">
			    <h5 class="fb-share-button share-button button"> 
					<a href="#" onclick="
								window.open(
								  'https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>',
								  'facebook-share-dialog',
								  'width=625,height=430'
								); return false;" href="#" title="Facebook">			
				    	<?php _e('Share', 'monstera');?>
				    </a>
			    </h5>

				<h5 class="pinterest-share share-button button">
			    	<a data-pin-do="buttonBookmark" data-pin-custom="true" href="//www.pinterest.com/pin/create/button/" data-pin-url="<?php the_permalink(); ?>"><img src="#"><?php _e('Pin', 'monstera');?></a>
				</h5>

				<h5 class="twitter-share share-button button">
					<a class="twitter action-button" onclick="
								window.open(
								  'https://twitter.com/home?status=<?php the_title();?> <?php the_permalink();?>',
								  'twitter-share-dialog',
								  'width=625,height=430'
								); return false;" href="#" title="Twitter">
					<?php _e('Tweet', 'monstera');?>
				</a>
				</h5>

				<h5 class="email-share share-button button">
					<a href="mailto:"><?php _e('Email', 'monstera');?></a>
				</h5>

				<h5 class="comment-share share-button button">
					<a href="<?php echo the_permalink() . '#respond';?>"><?php _e('Comment', 'monstera');?></a>
				</h5>
			</div>
		</span>

	<?php  } //end share icon
	?>
</div>

<?php } ?>