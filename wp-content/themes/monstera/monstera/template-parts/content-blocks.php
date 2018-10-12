<?php
/**
 * Template part for displaying posts in block format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Monstera
 */

?>


			                            <div class="monstera-col-4 monstera-column block-post">
			                            	
			                                <a href="<?php the_permalink(); ?>">
			                                	<?php
			                                    	if ( has_post_thumbnail() ) {

															the_post_thumbnail('index-featured');
													
													}

												?>
										 		<h4><?php the_title(); ?></h4>
										 
											</a>
			                            </div>




