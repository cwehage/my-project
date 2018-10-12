<?php
/**
 * Monstera Theme Customizer.
 *
 * @package Monstera
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function monstera_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'monstera_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function monstera_customize_preview_js() {
	wp_enqueue_script( 'monstera_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'monstera_customize_preview_js' );

/**
 * Configure Stnsvn theme customizer
 *
 * 
 */
function monstera_customizer( $wp_customize ) {
//-----------------------Title Tagline Section -----------------------//

	    //Logo upload section
	    $wp_customize->add_setting( 
	        'logo_upload',
	        array(
	            'transport'         => 'refresh',
	            )
	    );
	     
	    $wp_customize->add_control(
	        new WP_Customize_Image_Control(
	            $wp_customize,
	            'logo_upload',
	            array(
	                'label' => __('Logo Upload', 'monstera'),
	                'section' => 'title_tagline',
	                'settings' => 'logo_upload'
	            )
	        )
	    );

        //Enable full width logo 
         $wp_customize->add_setting(
            'full_width_logo',
                array(
                'sanitize_callback' => 'sanitize_checkbox',
                'default'   => 0
                )
        );
        $wp_customize->add_control(
            'full_width_logo',
            array(
                'type' => 'checkbox',
                'label' => __('Enable full width logo', 'monstera'),
                'section' => 'title_tagline',
            )
        );


//----------------------- Add sticky nav control to menu panel -----------------------//
        
        //Activate sticky menu   
         $wp_customize->add_setting(
            'sticky_primary_menu',
                array(
                'sanitize_callback' => 'sanitize_checkbox',
                'default'   => 0
                )
        );
        $wp_customize->add_control(
            'sticky_primary_menu',
            array(
                'type' => 'checkbox',
                'label' => __('Enable sticky nav bar', 'monstera'),
                'section' => 'menu_locations',
            )
        );

//----------------------- Social Icons -----------------------//

        //Social icons panel
        $wp_customize->add_panel( 'social_media_icons', array(
            'priority'       => 100,
            'title'          => __('Social Media Icons', 'monstera'),
        ) );

        // Add Social Icons section  
        $wp_customize->add_section(
            'monstera_social_icons',
            array(
                'title' => __('Standard Icons & Settings', 'monstera'),
                'description' => __('Edit the social media icons here. Fields left blank will not display', 'monstera'),
                'panel' => 'social_media_icons'
            )
        );

            // Social icon placement selector
            $wp_customize->add_setting(
                'monstera_social_location',
                array(
                'default' => 'none',
                )
            );

            $wp_customize->add_control(
                'monstera_social_location',
                array(
                    'type' => 'select',
                    'label' => __('Social Icons Location', 'monstera'),
                    'section' => 'monstera_social_icons',
                    'description' => __('Social icons can also be displayed in custom locations using the shortcode: [stnsvn-social]', 'monstera'),
                    'choices' => array(
                        'nav_left' => __('Navigation Bar Left', 'monstera'),
                        'nav_right' => __('Navigation Bar Right', 'monstera'),
                        'none' => __('None', 'monstera'),
                    ),
                )
            );

            //Set target _blank or not
                $wp_customize->add_setting(
                'monstera_target_blank',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1,
                )
            );

            $wp_customize->add_control(
                'monstera_target_blank',
                array(
                    'type' => 'checkbox',
                    'label' => __('Open links in new tab', 'monstera'),
                    'section' => 'monstera_social_icons',
                )
            );

            //Facebook Link
            $wp_customize->add_setting(
                'monstera_fb_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_fb_link',
                array(
                    'label' => __('Facebook link', 'monstera'),
                    'section' => 'monstera_social_icons',
                )
            );

            //Pinterest Link
            $wp_customize->add_setting(
                'monstera_pinterest_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_pinterest_link',
                array(
                    'label' => __('Pinterest link', 'monstera'),
                    'section' => 'monstera_social_icons',
                )
            );

            //Instagram Link
            $wp_customize->add_setting(
                'monstera_instagram_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_instagram_link',
                array(
                    'label' => __('Instagram link', 'monstera'),
                    'section' => 'monstera_social_icons',
                )
            );

            //Twitter Link
            $wp_customize->add_setting(
                'monstera_twitter_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_twitter_link',
                array(
                    'label' => __('Twitter link', 'monstera'),
                    'section' => 'monstera_social_icons',
                )
            );

            //Google+ Link
            $wp_customize->add_setting(
                'monstera_google_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_google_link',
                array(
                    'label' => __('Google+ link', 'monstera'),
                    'section' => 'monstera_social_icons',
                )
            );

            //Bloglovin' Link
            $wp_customize->add_setting(
                'monstera_bloglovin_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_bloglovin_link',
                array(
                    'label' => __('Bloglovin\' link', 'monstera'),
                    'section' => 'monstera_social_icons',
                )
            );

        //-----------------------Social Icons Custom Icons Sub-Panel -----------------------//
        // Add Social Icons section  
        $wp_customize->add_section(
            'monstera_custom_icons',
            array(
                'title' => __('Custom Icons', 'monstera'),
                'description' => __('Enter the name of the Font Awesome icon to be displayed (e.g., youtube); all icons can be <a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">viewed here</a>.', 'monstera'),
                'panel' => 'social_media_icons'
            )
        );

            //Custom Icon 1
            $wp_customize->add_setting(
                'monstera_custom_icon_1',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_1',
                array(
                    'label' => __('Custom icon 1', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 1 Link
            $wp_customize->add_setting(
                'monstera_custom_icon_1_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_1_link',
                array(
                    'label' => __('Custom icon 1 link', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 2
            $wp_customize->add_setting(
                'monstera_custom_icon_2',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_2',
                array(
                    'label' => __('Custom icon 2', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 2 Link
            $wp_customize->add_setting(
                'monstera_custom_icon_2_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_2_link',
                array(
                    'label' => __('Custom icon 2 link', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 3
            $wp_customize->add_setting(
                'monstera_custom_icon_3',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_3',
                array(
                    'label' => __('Custom icon 3', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 3 Link
            $wp_customize->add_setting(
                'monstera_custom_icon_3_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_3_link',
                array(
                    'label' => __('Custom icon 3 link', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 4
            $wp_customize->add_setting(
                'monstera_custom_icon_4',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_4',
                array(
                    'label' => __('Custom icon 4', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 4 Link
            $wp_customize->add_setting(
                'monstera_custom_icon_4_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_4_link',
                array(
                    'label' => __('Custom icon 4 link', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 5
            $wp_customize->add_setting(
                'monstera_custom_icon_5',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_5',
                array(
                    'label' => __('Custom icon 5', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 5 Link
            $wp_customize->add_setting(
                'monstera_custom_icon_5_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_5_link',
                array(
                    'label' => __('Custom icon 5 link', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 6
            $wp_customize->add_setting(
                'monstera_custom_icon_6',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_6',
                array(
                    'label' => __('Custom icon 6', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

            //Custom Icon 6 Link
            $wp_customize->add_setting(
                'monstera_custom_icon_6_link',
                array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => '',
                )
            );

            $wp_customize->add_control(
                'monstera_custom_icon_6_link',
                array(
                    'label' => __('Custom icon 6 link', 'monstera'),
                    'section' => 'monstera_custom_icons',
                )
            );

//-----------------------Featured Slider Section -----------------------//

      // Add featured slider 
        $wp_customize->add_section(
            'featured_slider',
            array(
                'title' => __('Blog Slider', 'monstera'),
                'description' => __('These settings apply to the featured slider.', 'monstera'),
                'priority' => 45,
            )
        );

        // Add controls to select slider content style
        $wp_customize->add_setting(
            'slider_style',
            array(
            'default' => 'multi_slide',
            )
        );

        $wp_customize->add_control(
            'slider_style',
            array(
            	'type' => 'select',
                'label' => __('Slider Style', 'monstera'),
                'section' => 'featured_slider',
                'description' => __('Choose the slider style', 'monstera'),
               	'choices' => array(
                    'full_slide' => __('Full Slide', 'monstera'),
                    'multi_slide' => __('Multi Slide', 'monstera'),
                ),
            )
        );

      // Add slide subtext settings
        $wp_customize->add_setting(
            'monstera_slide_subtext',
            array(
            'sanitize_callback' => 'monstera_sanitize_text',
            'default' => 'Read More',
            )
        );

        $wp_customize->add_control(
            'monstera_slide_subtext',
            array(
                'label' => __('Slide subtext', 'monstera'),
                'section' => 'featured_slider',
            )
        );

      //Set slide limit
        $wp_customize->add_setting(
            'monstera_slide_limit',
            array(
            'sanitize_callback' => 'monstera_absint',
            'default' => '0',
            )
        );

        $wp_customize->add_control(
            'monstera_slide_limit',
            array(
                'label' => __('Max Number of Slides', 'monstera'),
                'section' => 'featured_slider',
                'description' => __('Set the maximum number of slides here. Set "0" to have no limit.', 'monstera'),
            )
        );

      // Add featured slider auto scroll settings
        $wp_customize->add_setting(
            'monstera_autoscroll',
            array(
            'sanitize_callback' => 'monstera_absint',
            'default' => '0',
            )
        );

        $wp_customize->add_control(
            'monstera_autoscroll',
            array(
                'label' => __('Auto Scroll Delay', 'monstera'),
                'section' => 'featured_slider',
                'description' => __('Set the auto scroll delay length here (in milliseconds eg. 5000). Set "0" to disable auto scroll.', 'monstera'),
            )
        );

        //Display on main blog page
        $wp_customize->add_setting(
            'monstera_slider_overlay',
                array(
                'sanitize_callback' => 'sanitize_checkbox',
                'default' => 0
            )
        );
        $wp_customize->add_control(
            'monstera_slider_overlay',
            array(
                'type' => 'checkbox',
                'label' => __('Disable slider title overlays', 'monstera' ),
                'section' => 'featured_slider',
            )
        );

        //Control draggability
        $wp_customize->add_setting(
            'monstera_draggable',
                array(
                'sanitize_callback' => 'sanitize_checkbox',
            )
        );

        $wp_customize->add_control(
            'monstera_draggable',
            array(
                'type' => 'checkbox',
                'label' => __('Disable draggability', 'monstera'),
                'description' => __('Disables the slides ability to be dragged by the user\'s cursor (or finger on mobile).', 'monstera'),
                'section' => 'featured_slider',
            )
        );

        //Control navigation arrows
        $wp_customize->add_setting(
            'monstera_slider_arrows',
                array(
                'sanitize_callback' => 'sanitize_checkbox',
            )
        );

        $wp_customize->add_control(
            'monstera_slider_arrows',
            array(
                'type' => 'checkbox',
                'label' => __('Disable navigation arrows', 'monstera'),
                'description' => __('Hides the slider navigation arrows.', 'monstera'),
                'section' => 'featured_slider',
            )
        );

		//Display on main blog page
        $wp_customize->add_setting(
            'slider_home',
                array(
                'sanitize_callback' => 'sanitize_checkbox',
                'default' => 0
            )
        );
        $wp_customize->add_control(
            'slider_home',
            array(
                'type' => 'checkbox',
                'label' => __('Disable slider on main blog page', 'monstera' ),
                'section' => 'featured_slider',
            )
        );


//-----------------------Layout Panel -----------------------//

$wp_customize->add_panel( 'layout_settings', array(
    'priority'       => 40,
    'title'          => __('Layout Settings', 'monstera'),
) );


	//-----------------------Single Pages Section -----------------------//
	      // Add single pages section  
	        $wp_customize->add_section(
	            'single_pages',
	            array(
	                'title' => __('Single Pages', 'monstera'),
	                'description' => __('These settings apply to static pages only.', 'monstera'),
	                'priority' => 70,
	                'panel'  => 'layout_settings',
	            )
	        );

	        // Add content display style selector
	        $wp_customize->add_setting(
	            'monstera_page_display_style',
	            array(
	                'default' => 'full_width',
	            )
	        );
	         
	        $wp_customize->add_control(
	            'monstera_page_display_style',
	            array(
	                'type' => 'select',
	                'label' => __('Select layout style for single pages:', 'monstera'),
	                'section' => 'single_pages',
	                'choices' => array(
	                    'full_width' => __('Full Width Content', 'monstera'),
	                    'sidebar' => __('Sidebar Layout', 'monstera'),
	                ),
	            )
	        );

            //Display featured image on single pages
                $wp_customize->add_setting(
                'monstera_page_featured',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1
                )
            );
            $wp_customize->add_control(
                'monstera_page_featured',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display featured images on static pages', 'monstera' ),
                    'section' => 'single_pages',
                )
            );


	//-----------------------Blog Page Section -----------------------//
	      // Add Blog Page section  
	        $wp_customize->add_section(
	            'blog_page',
	            array(
	                'title' => __('Blog Page', 'monstera'),
	                'description' => __('These settings apply to the main blog only.', 'monstera'),
	                'priority' => 75,
	                'panel'  => 'layout_settings',
	            )
	        );

	        // Add content display style selector
	        $wp_customize->add_setting(
	            'monstera_blog_display_style',
	            array(
	                'default' => 'sidebar',
	            )
	        );
	         
	        $wp_customize->add_control(
	            'monstera_blog_display_style',
	            array(
	                'type' => 'select',
	                'label' => __('Select layout style for the blog page:', 'monstera'),
	                'section' => 'blog_page',
	                'choices' => array(
	                    'full_width' => __('Full Width Content', 'monstera'),
	                    'sidebar' => __('Sidebar Layout', 'monstera'),
	                ),
	            )
	        );

            // Add content display style selector
            $wp_customize->add_setting(
                'monstera_blog_layout',
                array(
                    'default' => 'featured',
                )
            );
             
            $wp_customize->add_control(
                'monstera_blog_layout',
                array(
                    'type' => 'select',
                    'label' => __('Select post layout for the blog page:', 'monstera'),
                    'section' => 'blog_page',
                    'choices' => array(
                        'grid' => __('Grid Layout', 'monstera'),
                        'featured' => __('Featured + Posts', 'monstera'),
                        'row' => __('Row Posts', 'monstera'),
                        'standard' => __('Standard Posts', 'monstera'),
                    ),
                )
            );

            //Excerpt custom length
            $wp_customize->add_setting(
                'monstera_excerpt_length',
                array(
                'sanitize_callback' => 'monstera_absint',
                'default' => '45'
                )
            );

            $wp_customize->add_control(
                'monstera_excerpt_length',
                array(
                    'label' => __('Blog Excerpt Length', 'monstera'),
                    'section' => 'blog_page',
                    'description' => __('Set a custom excerpt length here, in words (default is 45 words).', 'monstera'),
                )
            );

            //Display comment icons
                $wp_customize->add_setting(
                'monstera_comment_icon',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1,
                )
            );

            $wp_customize->add_control(
                'monstera_comment_icon',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display comment icon', 'monstera'),
                    'section' => 'blog_page',
                )
            );

            //Display share icons
                $wp_customize->add_setting(
                'monstera_share_icon',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1,
                )
            );

            $wp_customize->add_control(
                'monstera_share_icon',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display share icon', 'monstera'),
                    'section' => 'blog_page',
                )
            );

	//-----------------------Archives Section -----------------------//
	      // Add Archives section  
	        $wp_customize->add_section(
	            'archives',
	            array(
	                'title' => __('Post Archives', 'monstera'),
	                'description' => __('These settings apply to post archives only.', 'monstera'),
	                'priority' => 80,
	                'panel'  => 'layout_settings',
	            )
	        );

	        // Add content display style selector
	        $wp_customize->add_setting(
	            'monstera_archive_display_style',
	            array(
	                'default' => 'full_width',
	            )
	        );
	         
	        $wp_customize->add_control(
	            'monstera_archive_display_style',
	            array(
	                'type' => 'select',
	                'label' => __('Select layout style for post archives:', 'monstera'),
	                'section' => 'archives',
	                'choices' => array(
	                    'full_width' => __('Full Width Content', 'monstera'),
	                    'sidebar' => __('Sidebar Layout', 'monstera'),
	                ),
	            )
	        );

            // Add content display style selector
            $wp_customize->add_setting(
                'monstera_archive_layout',
                array(
                    'default' => 'grid',
                )
            );
             
            $wp_customize->add_control(
                'monstera_archive_layout',
                array(
                    'type' => 'select',
                    'label' => __('Select post layout for archives:', 'monstera'),
                    'section' => 'archives',
                    'choices' => array(
                        'grid' => __('Grid Layout', 'monstera'),
                        'standard' => __('Standard Layout', 'monstera'),
                        'row' => __('Row Posts', 'monstera'),
                    ),
                )
            );

	//-----------------------Blog Posts Section -----------------------//
	      // Add blog posts section  
	        $wp_customize->add_section(
	            'blog_post',
	            array(
	                'title' => __('Blog Posts', 'monstera'),
	                'description' => __('These settings apply to individual blog posts only.', 'monstera'),
	                'priority' => 85,
	                'panel'  => 'layout_settings',
	            )
	        );

	        // Add content display style selector
	        $wp_customize->add_setting(
	            'monstera_display_style',
	            array(
	                'default' => 'sidebar',
	            )
	        );
	         
	        $wp_customize->add_control(
	            'monstera_display_style',
	            array(
	                'type' => 'select',
	                'label' => __('Select layout style for single posts:', 'monstera'),
	                'section' => 'blog_post',
	                'choices' => array(
	                    'full_width' => __('Full Width Content', 'monstera'),
	                    'sidebar' => __('Sidebar Layout', 'monstera'),
	                ),
	            )
	        );

            //Display full width featured image on single posts
                $wp_customize->add_setting(
                'monstera_post_featured',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1
                )
            );
            $wp_customize->add_control(
                'monstera_post_featured',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display full width featured images', 'monstera' ),
                    'section' => 'blog_post',
                )
            );

            //Display featured image
                $wp_customize->add_setting(
                'display_featured_img',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1,
                )
            );

            $wp_customize->add_control(
                'display_featured_img',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display featured image under title', 'monstera'),
                    'section' => 'blog_post',
                )
            );

	       	//Display post category
	            $wp_customize->add_setting(
	            'display_cats',
	                array(
	                'sanitize_callback' => 'sanitize_checkbox',
	            )
	        );

	        $wp_customize->add_control(
	            'display_cats',
	            array(
	                'type' => 'checkbox',
	                'label' => __('Display post category', 'monstera'),
	                'section' => 'blog_post',
	            )
	        );

	        //Display post date
	            $wp_customize->add_setting(
	            'display_date',
	                array(
	                'sanitize_callback' => 'sanitize_checkbox',
	            )
	        );

	        $wp_customize->add_control(
	            'display_date',
	            array(
	                'type' => 'checkbox',
	                'label' => __('Display post date', 'monstera'),
	                'section' => 'blog_post',
	            )
	        );

	        //Display author by line
	            $wp_customize->add_setting(
	            'display_byline',
	                array(
	                'sanitize_callback' => 'sanitize_checkbox',
	            )
	        );

	        $wp_customize->add_control(
	            'display_byline',
	            array(
	                'type' => 'checkbox',
	                'label' => __('Display author byline', 'monstera'),
	                'section' => 'blog_post',
	            )
	        );

            //Display post tags
                $wp_customize->add_setting(
                'display_tags',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 0,
                )
            );

            $wp_customize->add_control(
                'display_tags',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display post tags', 'monstera'),
                    'section' => 'blog_post',
                )
            );

            //Display share buttons
                $wp_customize->add_setting(
                'display_share_single',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => '1'
                )
            );

            $wp_customize->add_control(
                'display_share_single',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display share buttons', 'monstera'),
                    'section' => 'blog_post',
                )
            );

if (class_exists( "WooCommerce" )) {
//-----------------------WooCommerce Layout Section -----------------------//
          // Add WooCommerce section  
            $wp_customize->add_section(
                'monstera_woocommerce',
                array(
                    'title' => __('WooCommerce', 'monstera'),
                    'description' => __('These settings apply to WooCommerce pages only.', 'monstera'),
                    'priority' => 95,
                    'panel'  => 'layout_settings',
                )
            );

            // Add content display style selector
            $wp_customize->add_setting(
                'monstera_woocommerce_style',
                array(
                    'default' => 'full_width',
                )
            );
             
            $wp_customize->add_control(
                'monstera_woocommerce_style',
                array(
                    'type' => 'select',
                    'label' => __('Select layout style for WooCommerce pages:', 'monstera'),
                    'section' => 'monstera_woocommerce',
                    'choices' => array(
                        'full_width' => __('Full Width Content', 'monstera'),
                        'sidebar' => __('Sidebar Layout', 'monstera'),
                    ),
                )
            );

            //Number of products
            $wp_customize->add_setting(
                'wc_number_products',
                array(
                'sanitize_callback' => 'monstera_absint',
                'default' => '6',
                'transport' => 'refresh',
                )
            );

            $wp_customize->add_control(
                'wc_number_products',
                array(
                    'label' => __('Number of Products', 'monstera'),
                    'section' => 'monstera_woocommerce',
                    'description' => __('Select number of products to display on WooCommerce shop pages', 'monstera'),
                )
            );

            //Display featured image on shop
            $wp_customize->add_setting(
                'monstera_shop_featured',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1,
                )
            );
            $wp_customize->add_control(
                'monstera_shop_featured',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display the featured image on the shop page', 'monstera' ),
                    'section' => 'monstera_woocommerce',
                )
            );

            //Display featured image on shop
            $wp_customize->add_setting(
                'monstera_product_featured',
                    array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default' => 1,
                )
            );
            $wp_customize->add_control(
                'monstera_product_featured',
                array(
                    'type' => 'checkbox',
                    'label' => __('Display the featured image on the product pages', 'monstera' ),
                    'section' => 'monstera_woocommerce',
                )
            );

            //Disable back to top checkbox
            $wp_customize->add_setting( 
                'stnsvn_cart_display',
                            array(
                    'sanitize_callback' => 'sanitize_checkbox',
                    'default'   => 0,
                )
            );
             
            $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'stnsvn_cart_display',
                    array(
                        'label' => __('Disable cart button in navigation menu', 'monstera'),
                        'section' => 'monstera_woocommerce',
                        'settings' => 'stnsvn_cart_display',
                        'type' => 'checkbox',
                    )
                )
            );
   
}//End WC conditional

//-----------------------Colors Section -----------------------//

        //Primary background color
            $wp_customize->add_setting(
            'primary-background-color',
            array(
                'default' => '#f5f5f2',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'primary-background-color',
                array(
                    'label' => __('Primary Background Color', 'monstera'),
                    'section' => 'colors',
                    'settings' => 'primary-background-color',
                )
            )
        );

        //Secondary background color
            $wp_customize->add_setting(
            'secondary-background-color',
            array(
                'default' => '#ffffff',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'secondary-background-color',
                array(
                    'label' => __('Secondary Background Color', 'monstera'),
                    'section' => 'colors',
                    'settings' => 'secondary-background-color',
                )
            )
        );    

        //Footer background color
            $wp_customize->add_setting(
            'footer-background-color',
            array(
                'default' => '#e9f0f4',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'footer-background-color',
                array(
                    'label' => __('Footer Background Color', 'monstera'),
                    'section' => 'colors',
                    'settings' => 'footer-background-color',
                )
            )
        );

        //Button color
            $wp_customize->add_setting(
            'dark-accent-color',
            array(
                'default' => '#333333',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'dark-accent-color',
                array(
                    'label' => __('Dark Accent Color', 'monstera'),
                    'section' => 'colors',
                    'settings' => 'dark-accent-color',
                )
            )
        );

        //Button hover color
            $wp_customize->add_setting(
            'button-hover-color',
            array(
                'default' => '#e9f0f4',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'button-hover-color',
                array(
                    'label' => __('Button Hover Color', 'monstera'),
                    'section' => 'colors',
                    'settings' => 'button-hover-color',
                )
            )
        );

//-----------------------Typography Section -----------------------//
      // Add Typography section  
        $wp_customize->add_section(
            'typography',
            array(
                'title' => __('Typography', 'monstera'),
                'description' => __('Customize the site typography here. Insert <a href="https://www.google.com/fonts" target="_blank">Google Fonts</a> code (eg. http://fonts.googleapis.com/css?family=Lora) and then enter the font name (eg. Lora) in the desired section.', 'monstera'),
                'priority' => 40,
            )
        );
      //Typography Settings
      //Google Font Link Field
        $wp_customize->add_setting(
            'google_font_code',
            array(
            'sanitize_callback' => 'esc_url_raw',
            )
        );
        $wp_customize->add_control(
            'google_font_code',
            array(
                'type' => 'text',
                'label' => __('Google Font Link Code', 'monstera'),
                'section' => 'typography',
            )
        );
        //Primary Header Font
        $wp_customize->add_setting(
            'primary_font_family',
            array(
            'sanitize_callback' => 'monstera_sanitize_text',
            )
        );
        $wp_customize->add_control(
            'primary_font_family',
            array(
                'label' => __('Primary Header Font Family', 'monstera'),
                'section' => 'typography',
            )
        );

        //Primary font size
        $wp_customize->add_setting( 'primary_font_size', array(
            'default' => '',
            'sanitize_callback' => 'monstera_absint',
        ) );

        $wp_customize->add_control( 'primary_font_size', array(
            'type' => 'range',
            'section' => 'typography',
            'label' => __( 'Primary Header Font Size', 'monstera' ),
            'description' => '',
            'default' => '130',
            'input_attrs' => array(
                'min' => 60,
                'max' => 200,
                'step' => 5,
                'style' => 'color: #0a0',
            ),
        ) );

        //BodyFont
        $wp_customize->add_setting(
            'body_font_family',
            array(
            'sanitize_callback' => 'monstera_sanitize_text',
            )
        );
        $wp_customize->add_control(
            'body_font_family',
            array(
                'label' => __('Body Text Font Family', 'monstera'),
                'section' => 'typography',
            )
        );

        //Body font size
        $wp_customize->add_setting( 'body_font_size', array(
            'default' => '88',
            'sanitize_callback' => 'monstera_absint',
        ) );

        $wp_customize->add_control( 'body_font_size', array(
            'type' => 'range',
            'section' => 'typography',
            'label' => __( 'Body Font Size', 'monstera' ),
            'description' => '',
            'input_attrs' => array(
                'min' => 50,
                'max' => 125,
                'step' => 5,
                'style' => 'color: #0a0',
            ),
        ) );

         //Primary text color
            $wp_customize->add_setting(
            'primary-text-color',
            array(
                'default' => '#333333',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'primary-text-color',
                array(
                    'label' => __('Text Color', 'monstera'),
                    'section' => 'typography',
                    'settings' => 'primary-text-color',
                )
            )
        );

        //Footer text color
            $wp_customize->add_setting(
            'secondary-text-color',
            array(
                'default' => '#333333',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'secondary-text-color',
                array(
                    'label' => __('Footer Text Color', 'monstera'),
                    'section' => 'typography',
                    'settings' => 'secondary-text-color',
                )
            )
        );

        //Button color
            $wp_customize->add_setting(
            'accent-text-color',
            array(
                'default' => '#ffffff',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'accent-text-color',
                array(
                    'label' => __('Accent Text Color', 'monstera'),
                    'section' => 'typography',
                    'settings' => 'accent-text-color',
                )
            )
        );

        //Button hover color
            $wp_customize->add_setting(
            'button-hover-text-color',
            array(
                'default' => '#333333',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
            $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'button-hover-text-color',
                array(
                    'label' => __('Button Hover Text Color', 'monstera'),
                    'section' => 'typography',
                    'settings' => 'button-hover-text-color',
                )
            )
        );

//-----------------------Footer Settings Section -----------------------//
        // Add Footer Settings section  
        $wp_customize->add_section(
            'footer_settings',
            array(
                'title' => __('Footer', 'monstera'),
                'priority' => 200,
            )
        );

        //Change number of columns
         $wp_customize->add_setting(
            'footer_col_number',
            array(
                'default' => '3',
            )
        );
         
        $wp_customize->add_control(
            'footer_col_number',
            array(
                'type' => 'select',
                'label' => __('Choose number of columns for footer', 'monstera'),
                'section' => 'footer_settings',
                'choices' => array(
                    '1' => __('1 column', 'monstera'),
                    '2' => __('2 columns', 'monstera'),
                    '3' => __('3 columns', 'monstera'),
                    '4' => __('4 columns', 'monstera'),
                ),
            )
        );

       //Copyright footer text section
        $wp_customize->add_setting( 
            'copyright-footer',
                        array(
                'sanitize_callback' => 'monstera_sanitize_text',
            )
        );
         
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'copyright-footer',
                array(
                    'label' => __('Footer copyright text', 'monstera'),
                    'section' => 'footer_settings',
                    'settings' => 'copyright-footer',
                    'type' => 'text',
                    'description' => __('Add text to display in the footer copyright section.', 'monstera')
                )
            )
        );
        

        //Remove stnsvn footer credit
        $wp_customize->add_setting( 
            'stnsvn-credit',
                        array(
                'sanitize_callback' => 'sanitize_checkbox',
                'default'   => 0
            )
        );
         
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'stnsvn-credit',
                array(
                    'label' => __('Hide Station Seven credit', 'monstera'),
                    'section' => 'footer_settings',
                    'settings' => 'stnsvn-credit',
                    'type' => 'checkbox',
                    'description' => __('While of course not required, we appreciate any support as we grow our small business :)', 'monstera')
                )
            )
        );

        //Back to top settings
        $wp_customize->add_setting( 
            'stnsvn_btt_text',
                        array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'default' => 'Back to top <i class="fa fa-chevron-up"></i>',
            )
        );
         
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'stnsvn_btt_text',
                array(
                    'label' => __('Back to Top button text', 'monstera'),
                    'section' => 'footer_settings',
                    'settings' => 'stnsvn_btt_text',
                    'type' => 'text'
                )
            )
        );
        

        //Disable back to top checkbox
        $wp_customize->add_setting( 
            'stnsvn_btt_display',
                        array(
                'sanitize_callback' => 'sanitize_checkbox',
                'default'   => 0,
            )
        );
         
        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'stnsvn_btt_display',
                array(
                    'label' => __('Disable Back to Top button', 'monstera'),
                    'section' => 'footer_settings',
                    'settings' => 'stnsvn_btt_display',
                    'type' => 'checkbox',
                )
            )
        );

    //-----------------------Development Section -----------------------//
      // Add Development section 
        $wp_customize->add_section(
            'monstera_development',
            array(
                'title' => __('Development', 'monstera'),
                'priority' => 200,
            )
        );
        //Activate ACF Pro menu items
         $wp_customize->add_setting(
            'monstera_acf_pro',
                array(
                'sanitize_callback' => 'sanitize_checkbox',
                'default'   => 0
                )
        );
        $wp_customize->add_control(
            'monstera_acf_pro',
            array(
                'type' => 'checkbox',
                'label' => __('Display ACF Pro admin menu', 'monstera'),
                'description' => __('The Advanced Custom Fields Pro plugin is included free with this theme. Check this box to enable and access the configuration area in your WP dashboard.', 'monstera'),
                'section' => 'monstera_development',
            )
        );

//-----------------------Custom CSS Section -----------------------//
      // Add CSS section  
        $wp_customize->add_section(
            'monstera_css',
            array(
                'title' => __('Custom CSS', 'monstera'),
                'description' => __('Add any custom CSS here.', 'monstera'),
                'priority' => 100,
            )
        );

        $wp_customize->add_setting( 
            'monstera_css_box', 
            array(
                'sanitize_callback' => 'monstera_sanitize_text',
                'transport'         => 'refresh',
            )
        );
        $wp_customize->add_control(
        new WP_Customize_Control(
        $wp_customize,
        'monstera_css_box',
        array(
            'label'          => __('Custom CSS', 'monstera'),
            'section'        => 'monstera_css',
            'settings'       => 'monstera_css_box',
            'type'           => 'textarea',
                )
            )
        );

} //End Customizer

//Sanitize customizer inputs
        //Checkbox sanitization
        function sanitize_checkbox( $input ) {
            if ( $input == 1 ) {
                return 1;
            } else {
                return '';
            }
        }

        //Textbox sanitation
        function monstera_sanitize_text( $input ) {
            return wp_kses_post( force_balance_tags( $input ) );
        }

        //Integer sanitization
        function monstera_absint( $input ) {
            return absint( $input );
        }

//Register changes from customizer
add_action( 'customize_register', 'monstera_customizer', 20 );


//* Color options
function monstera_customizer_head_styles() {
    echo '<style type="text/css">';
    $background_color = get_theme_mod( 'primary-background-color', '#f5f5f2' ); 
    if ( $background_color != '#f5f5f2' ) :
    ?>
            body {
                background-color: <?php echo $background_color; ?>;
            }

    <?php
    endif;

    $secondary_background_color = get_theme_mod( 'secondary-background-color', '#ffffff' ); 
    if ( $secondary_background_color != '#ffffff' ) :
    ?>
            article,
            input,
            textarea,
            .secondary-nav-container,
            #secondary .widget,
            .sub-menu,
            .main-gallery .entry-header,
            .image-block h3,
            .landing-latest-posts .monstera-column,
            .block-post,
            #secondary .widget_categories .widget-title, 
            #secondary li.cat-item a,
            .footer-widgets .enews input,
            .woocommerce ul.products li.product, .woocommerce-page ul.products li.product,
            .woocommerce.single-product div.product,
            .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
            .woocommerce .woocommerce-message,
            .woocommerce nav.woocommerce-pagination ul li {
                background-color: <?php echo $secondary_background_color; ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
                border-bottom-color: <?php echo $secondary_background_color; ?>;
            }

    <?php
    endif;

    $footer_background_color = get_theme_mod( 'footer-background-color', '#e9f0f4' ); 
    if ( $footer_background_color != '#e9f0f4' ) :
    ?>
            footer {
                background-color: <?php echo $footer_background_color; ?>;
            }
    <?php
    endif;

    $dark_accent_color = get_theme_mod( 'dark-accent-color', '#333333' ); 
    if ( $dark_accent_color != '#333333' ) :
    ?>
            button,
            .button,
            input[type="button"], 
            input[type="reset"], 
            input[type="submit"],
            .primary-nav-container,
            .site-info,
            .read-more a,
            .monstera-button a,
            .enews #subbutton,
            #infinite-handle,
            .share-group,
            .nav-previous a, 
            .nav-next a, 
            .woocommerce ul.products li.product .button, 
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt, 
            .woocommerce .cart .button, 
            .woocommerce .cart input.button, 
            .woocommerce a.button,
            .woocommerce #review_form #respond .form-submit input {
                background-color: <?php echo $dark_accent_color; ?>;
            }

            input[type="text"],
            input[type="email"],
            input[type="url"],
            input[type="password"],
            input[type="search"],
            textarea,
            td, th,
            .woocommerce table.cart td.actions .input-text, .woocommerce-page #content table.cart td.actions .input-text, .woocommerce-page table.cart td.actions .input-text, .woocommerce .woocommerce-error, .woocommerce .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs ul.tabs:before, .woocommerce #primary textarea, .woocommerce #primary input,
            .woocommerce #reviews #comments ol.commentlist li .comment-text
             {
                border-color: <?php echo $dark_accent_color; ?>;
            }

            .flickity-prev-next-button .arrow {
                fill: <?php echo $dark_accent_color; ?>;
            }
    <?php
    endif;

    $button_hover_color = get_theme_mod( 'button-hover-color', '#e9f0f4' ); 
    if ( $button_hover_color != '#e9f0f4' ) :
    ?>
            button:hover,
            .button:hover,
            input[type="button"]:hover, 
            input[type="reset"]:hover, 
            input[type="submit"]:hover,
            .read-more a:hover,
            .monstera-button a:hover,
            .enews #subbutton:hover,
            .footer-widgets .enews #subbutton:hover,
            #infinite-handle:hover,
            .nav-previous a:hover, 
            .nav-next a:hover, 
            .woocommerce ul.products li.product .button:hover, 
            .woocommerce #respond input#submit.alt:hover, 
            .woocommerce a.button.alt:hover, 
            .woocommerce button.button.alt:hover, 
            .woocommerce input.button.alt:hover, 
            .woocommerce .cart .button:hover, 
            .woocommerce .cart input.button:hover, 
            .woocommerce a.button:hover,
            .woocommerce #review_form #respond .form-submit input:hover,
            .woocommerce nav.woocommerce-pagination ul li:hover,
            .main-navigation li:hover, 
            .secondary-nav li:hover,
            .secondary-nav .sub-menu li:hover, 
            .main-navigation li:focus, 
            .secondary-nav li:focus {
                background-color: <?php echo $button_hover_color; ?>;
            }
    <?php
    endif;

    $primary_text_color = get_theme_mod( 'primary-text-color', '#333333' ); 
    if ( $primary_text_color != '#333333' ) :
    ?>
            body, 
            input[type="text"], 
            input[type="email"], 
            input[type="url"], 
            input[type="password"], 
            input[type="search"], 
            textarea,
            button, 
            input, 
            select {
               color: <?php echo $primary_text_color; ?>;
            }

            ::-webkit-input-placeholder {
               color: <?php echo $primary_text_color; ?>;;
            }

            :-moz-placeholder { /* Firefox 18- */
               color: <?php echo $primary_text_color; ?>;;  
            }

            ::-moz-placeholder {  /* Firefox 19+ */
               color: <?php echo $primary_text_color; ?>;;  
            }

            :-ms-input-placeholder {  
               color: <?php echo $primary_text_color; ?>;;  
            }

            hr {
                background-color: <?php echo $primary_text_color; ?>
            }
    <?php 
    endif;

    $secondary_text_color = get_theme_mod( 'secondary-text-color', '#333333' ); 
    if ( $secondary_text_color != '#333333' ) :
    ?>
            footer,
            footer input[type="text"], 
            footer input[type="email"], 
            footer input[type="url"], 
            footer input[type="password"], 
            footer input[type="search"], 
            footer textarea,
            footer button, 
            footer input, 
            footer select {
                color: <?php echo $secondary_text_color; ?>;
                border-color: <?php echo $secondary_text_color; ?>;
            }

            footer input::-webkit-input-placeholder {
               color: <?php echo $secondary_text_color; ?>;;
            }

            footer input:-moz-placeholder { /* Firefox 18- */
               color: <?php echo $secondary_text_color; ?>;;  
            }

            footer input::-moz-placeholder {  /* Firefox 19+ */
               color: <?php echo $secondary_text_color; ?>;;  
            }

            footer input:-ms-input-placeholder {  
               color: <?php echo $secondary_text_color; ?>;;  
            }
    <?php 
    endif;

    $accent_text_color = get_theme_mod( 'accent-text-color', '#ffffff' ); 
    if ( $accent_text_color != '#ffffff' ) :
    ?>
            button,
            .button,
            input[type="button"], 
            input[type="reset"], 
            input[type="submit"],
            .primary-nav-container,
            .site-info,
            .read-more a,
            .monstera-button a,
            .enews #subbutton,
            #infinite-handle,
            .share-button,
            .nav-previous a, 
            .nav-next a, 
            .woocommerce ul.products li.product .button, 
            .woocommerce #respond input#submit.alt, 
            .woocommerce a.button.alt, 
            .woocommerce button.button.alt, 
            .woocommerce input.button.alt, 
            .woocommerce .cart .button, 
            .woocommerce .cart input.button, 
            .woocommerce a.button,
            .woocommerce #review_form #respond .form-submit input {
                color: <?php echo $accent_text_color; ?>;
            }

    <?php 
    endif;

    $button_hover_text_color = get_theme_mod( 'button-hover-text-color', '#333333' ); 
    if ( $button_hover_text_color != '#333333' ) :
    ?>
            button:hover,
            .button:hover,
            input[type="button"]:hover, 
            input[type="reset"]:hover, 
            input[type="submit"]:hover,
            .read-more a:hover,
            .monstera-button a:hover,
            .enews #subbutton:hover,
            .footer-widgets .enews #subbutton:hover,
            #infinite-handle:hover,
            .share-button:hover,
            .nav-previous a:hover, 
            .nav-next a:hover, 
            .woocommerce ul.products li.product .button:hover, 
            .woocommerce #respond input#submit.alt:hover, 
            .woocommerce a.button.alt:hover, 
            .woocommerce button.button.alt:hover, 
            .woocommerce input.button.alt:hover, 
            .woocommerce .cart .button:hover, 
            .woocommerce .cart input.button:hover, 
            .woocommerce a.button:hover,
            .woocommerce #review_form #respond .form-submit input:hover,
            .woocommerce nav.woocommerce-pagination ul li:hover,
            .main-navigation li:hover, 
            .secondary-nav li:hover, 
            .main-navigation li:focus, 
            .secondary-nav li:focus {
                color: <?php echo $button_hover_text_color; ?>;
            }

    <?php 
    endif;

    $primary_font_family = get_theme_mod( 'primary_font_family', '' ); 
    if ( $primary_font_family != '' ) :
    ?>
                h1, .site-title,
                h2,
                h3,
                h4,
                h5,
                .h4,
                blockquote p,
                .site-description,
                .stnsvn-rp-container #jp-relatedposts .jp-relatedposts-items p, 
                .stnsvn-rp-container #jp-relatedposts .jp-relatedposts-items-visual h4.jp-relatedposts-post-title,
                .main-navigation, 
                #secondary-menu,
                #main #infinite-handle span button, 
                #main #infinite-handle span button:hover, 
                #main #infinite-handle span button:focus,
                button, 
                input[type="button"], 
                input[type="reset"], 
                input[type="submit"],
                input[type="search"],
                .entry-meta,
                .nav-links,
                .woocommerce #respond input#submit, 
                .woocommerce a.button, 
                .woocommerce button.button, 
                .woocommerce input.button,
                .comment-author,
                a.comment-reply-link,
                .entry-footer,
                #secondary li.cat-item a,
                .woocommerce div.product .woocommerce-tabs ul.tabs li a {
                font-family: <?php echo $primary_font_family; ?>;
            }
    <?php
    endif;

    $primary_font_size = get_theme_mod( 'primary_font_size', '130' ); 
    $font_divisor = '100';
    if ( $primary_font_size != '' ) :
    ?>
                h1 {
                font-size: <?php echo ($primary_font_size / $font_divisor); ?>em;
                }

                .site-title {
                font-size: <?php echo ($primary_font_size / $font_divisor * '1.46'); ?>em;
                }

                h2 {
                font-size: <?php echo ($primary_font_size / $font_divisor * '0.92'); ?>em;
                }
 
                h3,
                .woocommerce ul.products li.product h3 {
                font-size: <?php echo ($primary_font_size / $font_divisor * '0.77'); ?>em;
                }

                h4, .h4, .stnsvn-rp-container #jp-relatedposts .jp-relatedposts-items p, .stnsvn-rp-container #jp-relatedposts .jp-relatedposts-items-visual h4.jp-relatedposts-post-title, .site-description, .widget-title, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button {
                font-size: <?php echo ($primary_font_size / $font_divisor * '0.54'); ?>em;
                }

                #secondary li.cat-item a {
                font-size: <?php echo ($primary_font_size / $font_divisor * '0.62'); ?>em;
                }

                h5,
                .main-navigation,
                .site-copyright, 
                #secondary-menu,
                #main #infinite-handle span button, 
                #main #infinite-handle span button:hover, 
                #main #infinite-handle span button:focus,
                button, 
                blockquote p,
                input[type="button"], 
                input[type="reset"], 
                input[type="submit"],
                input[type="search"],
                .entry-meta,
                .nav-links,
                .woocommerce #respond input#submit, 
                .woocommerce a.button, 
                .woocommerce button.button, 
                .woocommerce input.button,
                .comment-author,
                a.comment-reply-link,
                .entry-footer,
                .woocommerce div.product .woocommerce-tabs ul.tabs li a {
                font-size: <?php echo ($primary_font_size / $font_divisor * '0.46'); ?>em;
                }
    <?php
    endif;

    $body_font_family = get_theme_mod( 'body_font_family', '' ); 
    if ( $body_font_family != '' ) :
    ?>
                body, 
                p,
                button,
                input,
                select,
                textarea {
                    font-family: <?php echo $body_font_family; ?>;
                }
    <?php
    endif;

    $body_font_size = get_theme_mod( 'body_font_size', '88' ); 
    $font_divisor = '100';
    if ( $body_font_size != '' ) :
    ?>
                p,
                button,
                input,
                select,
                textarea,
                ul,
                .comment-metadata,
                .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta {
                font-size: <?php echo ($body_font_size / $font_divisor); ?>em;
                }
    <?php
    endif;
    
    $monstera_css_box = get_theme_mod( 'monstera_css_box', '' ); 
    if ( $monstera_css_box != '' ) :
    echo $monstera_css_box; 
    endif;
    
    echo '</style>';

    // Get typography options, add to wp_head
    $ggl_link = get_theme_mod( 'google_font_code' ); 
    if ( $ggl_link != '' ) :
        echo '<link href="' , $ggl_link , '" rel="stylesheet" type="text/css">';
    endif;

}
add_action( 'wp_head', 'monstera_customizer_head_styles' );


//Enable or Disable nav stickiness
add_action('wp_footer','monstera_sticky_nav');
function monstera_sticky_nav() {
    if ( has_nav_menu( 'primary' ) ) {
        $monstera_activate_sticky_menu = get_theme_mod( 'sticky_primary_menu', 0 );
            wp_localize_script( 'main', 'PrimaryNavParams', array('sticky' => $monstera_activate_sticky_menu) );
      } else {
            wp_localize_script( 'main', 'PrimaryNavParams', array('sticky' => '1') );
      }
}



