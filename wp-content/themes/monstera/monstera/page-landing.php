<?php
/*
Template Name: Landing Page
*/
/**
 * Template used for the custom static landing page
 * 
 * @package Monstera
 * @author Station Seven <hello@stnsvn.com> 
 * @copyright Copyright (c) 2016, Station Seven
 * 
 */ 

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php //conditional for password protected pages
			if ( ! post_password_required( $post ) ) {

							//Do Landing Page slider ?>
							<?php if( have_rows('featured_slides') ): 	?>

							     <div class="main-gallery landing-slider landing-section">

							     <?php while( have_rows('featured_slides') ): the_row();

							          // vars
							          $image = get_sub_field('slide_image');
							          $title = get_sub_field('slide_title');
							          $subtitle = get_sub_field('slide_subtitle');
							          $button_text = get_sub_field('slide_button_text');
							          $link = get_sub_field('slide_link'); ?>

												<div class="home-gallery-cell">
							                        		<div class="home-gallery-img" style="background: url('<?php echo $image; ?>'); background-position: 50%; background-size: cover;">
							                          			<?php if( $title ): ?>
								                          			<div class="entry-header">
															                    <h2 class="entry-title"><?php echo $title; ?></h2>
															               <?php if( $subtitle ): ?>
															                    <h5><?php echo $subtitle; ?></h5>
															               <?php endif; ?>

															               <?php if( $button_text ): ?>
															               					                 
															                    <div class="read-more">
															                    	<a href="<?php echo $link; ?>">
															                    		<h5><?php echo $button_text; ?></h5>
															                    	</a>
															                    </div>
															               <?php endif; ?>
																	</div>
																<?php endif; ?>
							                          		</div>
												</div>

								<?php endwhile; ?>

							     </div>

							<?php endif; ?>	


				<?php

				// check if the flexible content field has rows of data
				if( have_rows('landing_content_sections') ):

				     // loop through the rows of data
				    while ( have_rows('landing_content_sections') ) : the_row();

				        if( get_row_layout() == 'text_section' ):
				        	//vars
							$title = get_sub_field('title');
				        	$text_content = get_sub_field('text_content');
				        	$link_button_text = get_sub_field('link_button_text');
				        	$link_button_url = get_sub_field('link_button_url');
				        	$landing_text_bg = get_sub_field('landing_text_bg');
				        	$landing_text_color = get_sub_field('landing_text_color');
				        	?>

				        	 <div class="landing-content landing-section" style="background-color: <? echo $landing_text_bg; ?>; color: <? echo $landing_text_color; ?>;">
				        	 	<div class="landing-inner">
					        	 	<?php if( $title ): ?>
					                    <h2><?php echo $title; ?></h2>
					                <?php endif; ?>

					                <?php if( $text_content ): ?>
					                    <div class="text-content"><?php echo $text_content; ?></div>
					                <?php endif; ?>

					                <?php if( $link_button_url ): ?>
					                	<div class="read-more">
					                    <a href="<?php echo $link_button_url; ?>">
					                <?php endif; ?>

						                <?php if( $link_button_text ): ?>
						                    <h5><?php echo $link_button_text; ?></h5>
						                <?php endif; ?>

					                <?php if( $link_button_url ): ?>
					                    </a>
					                </div>
					                <?php endif; ?>
				            	</div>
				        	 </div>

				        <?php
				        
				        elseif( get_row_layout() == 'image_blocks' ): 
				        	//vars
							$number_of_cols = get_sub_field('number_of_columns');
				        	$col1_img = get_sub_field('column_1_image');
				        	$col1_text = get_sub_field('column_1_text');
				        	$col1_link = get_sub_field('column_1_link');
				        	$col2_img = get_sub_field('column_2_image');
				        	$col2_text = get_sub_field('column_2_text');
				        	$col2_link = get_sub_field('column_2_link');
				        	$col3_img = get_sub_field('column_3_image');
				        	$col3_text = get_sub_field('column_3_text');
				        	$col3_link = get_sub_field('column_3_link');
				        	$image_blocks_bg = get_sub_field('image_blocks_bg');
				        	?>
				        	 <div class="landing-image-blocks monstera-columns-<?php echo $number_of_cols; ?> landing-section" style="background-color: <?php echo $image_blocks_bg; ?>;">
				        	 	<div class="landing-inner">
					        	 	<div class="image-block monstera-column" style="background: url('<?php echo $col1_img; ?>'), no-repeat; background-position: 50%; background-size: cover;">
						 		        <?php if( $col1_link ): ?>
						                    <a href="<?php echo $col1_link; ?>">
						                <?php endif; ?>

							                <?php if( $col1_text ): ?>
							                    <h3><?php echo $col1_text; ?></h3>
							                <?php endif; ?>

						                <?php if( $col1_link ): ?>
						                    </a>
						                <?php endif; ?>
					        	 	</div>

						 		    <?php if( $number_of_cols != '1' ): ?>
						 		    	<div class="table-spacer"></div>
						        	 	<div class="image-block monstera-column" style="background: url('<?php echo $col2_img; ?>'), no-repeat; background-position: 50%; background-size: cover;">
							 		        <?php if( $col2_link ): ?>
							                    <a href="<?php echo $col2_link; ?>">
							                <?php endif; ?>

								                <?php if( $col2_text ): ?>
								                    <h3><?php echo $col2_text; ?></h3>
								                <?php endif; ?>

							                <?php if( $col2_link ): ?>
							                    </a>
							                <?php endif; ?>
						        	 	</div>
						            <?php endif; ?>

						            <?php if( $number_of_cols == '3' ): ?>
						            	<div class="table-spacer"></div>
						        	 	<div class="image-block monstera-column" style="background: url('<?php echo $col3_img; ?>'), no-repeat; background-position: 50%; background-size: cover;">
							 		        <?php if( $col3_link ): ?>
							                    <a href="<?php echo $col3_link; ?>">
							                <?php endif; ?>

								                <?php if( $col3_text ): ?>
								                    <h3><?php echo $col3_text; ?></h3>
								                <?php endif; ?>

							                <?php if( $col3_link ): ?>
							                    </a>
							                <?php endif; ?>
						        	 	</div>
						            <?php endif; ?>
					        	</div>
				        	 </div>

				        <?php

				        elseif( get_row_layout() == 'content_columns' ): 
				        	//vars
							$number_of_content_cols = get_sub_field('number_of_content_columns');
				        	$col1_content = get_sub_field('column_1_content');
				        	$col2_content = get_sub_field('column_2_content');
				        	$col3_content = get_sub_field('column_3_content');
				        	$content_columns_bg = get_sub_field('content_columns_bg');
				        	$content_columns_color = get_sub_field('content_columns_color');
				        	?>
				        	 <div class="landing-content-columns landing-section clear" style="background-color: <?php echo $content_columns_bg; ?>; color: <?php echo $content_columns_color; ?>;">
					        	<div class="landing-inner monstera-columns-<?php echo $number_of_content_cols; ?> monstera-column-row"> 	
					        		<div class="monstera-column">
					        	 		<?php echo $col1_content; ?>
					        	 	</div>

					        	 	<?php if ($number_of_content_cols != '1'): ?>
						        	 	<div class="monstera-column">
						        	 		<?php echo $col2_content; ?>
						        	 	</div>
					        	 	<?php endif; ?>

					        	 	<?php if ($number_of_content_cols == '3'): ?>
						        	 	<div class="monstera-column">
						        	 		<?php echo $col3_content; ?>
						        	 	</div>
					        	 	<?php endif; ?>
					        	 </div>
				        	 </div>

				    	<?php 

				    	elseif( get_row_layout() == 'latest_posts' ): 
				        	//vars
							$latest_content = get_sub_field('latest_content');
						    $number_of_posts = get_sub_field('number_of_posts');
						    $latest_background_color = get_sub_field('latest_background_color');
						    $latest_text_color = get_sub_field('latest_text_color');
				        	?>

				        	 <div class="landing-latest-posts landing-section" style="background-color: <?php echo $latest_background_color; ?>; color: <?php echo $latest_text_color; ?>;">
				        	 	<div class="landing-inner">
				        	 		<div class="latest-posts-content">
				        	 			<?php echo $latest_content; ?>
				        	 		</div>

					        	 		<?php //run the loop for latest posts
						        	 		// WP_Query arguments
					        	 			// If no categories set, query all
					        	 			if (get_sub_field('latest_categories') == ""){
												$args = array (
												'post_type'              => 'post',
												'order'                  => 'DESC',
												'orderby'                => 'date',
												'posts_per_page'         => $number_of_posts,
												);
											} 

											// Else if categories selected, add them to query
											else {
												$post_category_arr = get_sub_field('latest_categories');
												$post_category_count = count($post_category_arr); //total number of selected category
												$post_category = "";
												$array_loop = 0; 
												foreach ($post_category_arr as $key => $value) 
												{ 
													
													$array_loop++;
													/*
														if only 1 category is selected, just add the value to post category
														else, 
															check if category is not the last one on the array, add the value then add a comma after the value
															else, add the value but don't add a oomma after the value
													*/
													if ($post_category_count == 1) { 
														$post_category = $value;
													}
													else {
														$post_category .= ($post_category_count <> $array_loop) ? $value.", " : $value;		
													}
												 
												}
												$args = array (
													'post_type'              => 'post',
													'order'                  => 'DESC',
													'orderby'                => 'date',
													'posts_per_page'         => $number_of_posts,
													'cat'   				 =>	$post_category_arr
												);
											}

											//--------------------------------//
											$loop_ctr = 0;
								
								
											$latests_query = new WP_Query( $args );
											$total_posts = $latests_query->found_posts;
											if ( $latests_query->have_posts() ) {
											?>
							                	<div class="monstera-column-row clear">
							                <?php	 
												
												while ( $latests_query->have_posts() ) { 
													$latests_query->the_post();
													
													if($loop_ctr % 3 == 0 && $loop_ctr != 0) { //checks if post is the third post for the row
														
														if ($loop_ctr == $total_posts ) { //if post counter is equal to the total number of posts to be displayed, add ending div tag to end the row and the display of posts
											?>
							                	</div>
							                <?php
															
														}
														else { //if post counter is not equal to the total number of posts to be displayed, add ending div tag to end the row and add another row
											?>
							                	</div><div class="monstera-column-row clear">
							                <?php
															
															
														}
													 }						
														
														$loop_ctr++;
														
													?>
							                            
							                            <div class="monstera-col-3 monstera-column">
							                            	
							                                <a href="<?php the_permalink(); ?>">
							                                	<?php
							                                    	if ( has_post_thumbnail() ) {

																			the_post_thumbnail('index-featured');
																	
																	}

																?>
														 		<h4><?php the_title(); ?></h4>
														 
															</a>
							                            </div>
							                                                       
														 
							                            <?php
												 
												}
											?>
							                </div>
							                <?php
												
												
											}
											wp_reset_postdata();
											//--------------------------------//

										?>
								</div>
				        	 </div>

				        <?php
				        endif;

				    endwhile;

				else :

				    // no layouts found

				endif;

				?>

			<?php 
				//if password protected, display password form
				} else { ?>
				     	<div class="landing-section">
				    			<div class="landing-inner">
				    				<article>

					    				<header class="entry-header">
											<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
										</header><!-- .entry-header -->
										
					    				<div class="entry-content">
					    					<?php echo get_the_password_form(); ?>
					    				</div>

				    				</article>
				    			</div>
				    		</div>
				<?php } 
				//end password conditionals
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>