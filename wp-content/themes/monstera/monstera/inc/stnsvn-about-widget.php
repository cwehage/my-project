<?php
/**
 * Station Seven About Me widget configuration
 */
    class monstera_about_widget extends WP_Widget {

	/**
	 * Sets up a new About Me widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'monstera-about-widget', 
			'description' => __('Create a styled "About me" section', 'monstera'),
			);

		$control_ops = array(
			'width' => 400, 
			'height' => 350, 
			'id_base' => 'monstera_about_widget',
			);

		parent::__construct( 'monstera_about_widget', __( 'Station Seven About Me Widget', 'monstera' ), 
			$widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current About Me widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current About Me widget instance.
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$img = apply_filters( 'widget_title', empty( $instance['img'] ) ? '' : $instance['img'], $instance, $this->id_base );

		$widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';

		/**
		 * Filter the content of the About Me widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string         $widget_text The widget content.
		 * @param array          $instance    Array of settings for the current widget.
		 * @param WP_Widget_Text $this        Current About Me widget instance.
		 */
		$text = apply_filters( 'widget_text', $widget_text, $instance, $this );

		echo $args['before_widget'];
		if ( ! empty( $img ) ) {
			echo '<img src="' . $img . '">'; 
		} ?>

			<div class="aboutme-widget textwidget">
				<?php if ( ! empty( $title ) ) {
					echo $args['before_title'] . $title . $args['after_title'];
				} ?>
				<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>
			</div>
		
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current About Me widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['filter'] = ! empty( $new_instance['filter'] );
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		if ( current_user_can('unfiltered_html') )
			$instance['img'] =  $new_instance['img'];
		else
			$instance['img'] = wp_kses_post( stripslashes( $new_instance['img'] ) );
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = wp_kses_post( stripslashes( $new_instance['text'] ) );
		$instance['filter'] = ! empty( $new_instance['filter'] );
		return $instance;
	}

	/**
	 * Outputs the About Me widget settings form.
	 *
	 * @since 2.8.0	
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'img' => '', 'title' => '', 'text' => '' ) );
		$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$title = sanitize_text_field( $instance['title'] );
		$img = sanitize_text_field( $instance['img'] );
		?>
		<p><label for="<?php echo $this->get_field_id('img'); ?>"><?php _e('Image url:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="text" value="<?php echo esc_attr($img); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
		<?php
	}
}

// register widget
    add_action('widgets_init', create_function('', 'return register_widget("monstera_about_widget");'));