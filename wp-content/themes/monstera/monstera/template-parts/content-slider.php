<?php
/**
 * Template part for displaying the Monstera slider
 *
 * @package Monstera
 */

// Run loop to display featured slider

$slider_style = get_theme_mod( 'slider_style', 'multi_slide' );
$monstera_slider_overlay = get_theme_mod('monstera_slider_overlay', 0);

if ($slider_style == 'full_slide') { //Display full width slider
			$max_slides = get_theme_mod('monstera_slide_limit', '-1');
			$args = array(
			'post_type' => 'post',
			'posts_per_page' => $max_slides,
			'meta_query' => array(
				array(
					'key' => 'display_post_in_slider',
					'value' => '1',
					'compare' => '=='
				)
			)
			);

			$monstera_slider_query = new WP_Query( $args );
			if ( $monstera_slider_query->have_posts() ) { 
				echo '<div class="main-gallery full-slide">';
					while ( $monstera_slider_query->have_posts() ) { 
					$monstera_slider_query->the_post();
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
					$thumb_url = $thumb_url_array[0];	
					$monstera_subtext = get_theme_mod('monstera_slide_subtext', 'Read More');
								?>
								<div class="home-gallery-cell">
			                        		<div class="home-gallery-img" style="background: url('<?php echo $thumb_url; ?>'); background-position: 50%; background-size: cover;">
				                          			
									                <?php if ($monstera_slider_overlay != 1) {  //Hide slider overlays if disabled in customizer ?>
					                          			<div class="entry-header">
					                          						<a href="<?php the_permalink(); ?>">
												                    	<h2 class="entry-title"><?php echo the_title(); ?></h2>
												                	</a>
												                    <?php $monstera_subtext = get_theme_mod('monstera_slide_subtext', 'Read More');  
												                    	if( $monstera_subtext ): ?>         
													                    <div class="read-more">
													                    	<a href="<?php the_permalink(); ?>">
													                    		<h5><?php echo $monstera_subtext; ?></h5>
													                    	</a>
													                    </div>
													               <?php endif; ?>
														</div>
													<?php } ?>
			                          		</div>
								</div>
							<?php
						}
				echo '</div>';
			} 
			wp_reset_postdata();

} // End full slide style

if ($slider_style == 'multi_slide') { //Display multi slide style slider
			$max_slides = get_theme_mod('monstera_slide_limit', '-1');
			$args = array(
			'post_type' => 'post',
			'posts_per_page' => $max_slides,
			'meta_query' => array(
				array(
					'key' => 'display_post_in_slider',
					'value' => '1',
					'compare' => '=='
				)
			)
			);

			$monstera_slider_query = new WP_Query( $args );
			if ( $monstera_slider_query->have_posts() ) { 
				echo '<div class="main-gallery multi-slide">';
					while ( $monstera_slider_query->have_posts() ) { 
					$monstera_slider_query->the_post();
										if( has_post_thumbnail() ){ ?>
                                               	 	<div class="home-gallery-cell">
								                        		<div class="home-gallery-img" style="background: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'); background-position: 50%; background-size: cover;">
									                          			
									                          			<?php if ($monstera_slider_overlay != 1) {  //Hide slider overlays if disabled in customizer ?>
										                          			<div class="entry-header">
										                          					<a href="<?php the_permalink(); ?>">
																	                    <h3 class="entry-title"><?php echo the_title(); ?></h3>
																	                </a>
																	                    <?php $monstera_subtext = get_theme_mod('monstera_slide_subtext', 'Read More');  
																	                    	if( $monstera_subtext ): ?>         
																		                    <div class="read-more">
																		                    	<a href="<?php the_permalink(); ?>">
																		                    		<h5><?php echo $monstera_subtext; ?></h5>
																		                    	</a>
																		                    </div>
																		               <?php endif; ?>
																			</div>
																		<?php } ?>

								                          		</div>
													</div>
												<?php }
						}
					echo '</div>';		
			} 
			wp_reset_postdata();

} // End multi slide style



