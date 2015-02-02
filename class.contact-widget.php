<?php
class Contacts_Widget extends WP_Widget {
	/*
	 * Plugin Constructor
	 */
	public function __construct(){
		parent::__construct(
			'contacts_widget', //Basae ID
			__('Ajax Contact Widget','text_domain'), //readable name
			array('description' => __('Ajax Powered contact widget', 'text_domain'))
		);
	}

	/*
	 * Frontend Display
	 */
	public function widget($args, $instance){
		$title = apply_filters('widget_title',$instance['title']);
		$recipient = $instance['recipient'];
		$subject = $instance['subject'];

		echo $args['before_widget'];
		if (!empty($title))
			echo $args['before_title'] . $title . $args['after_title'];
		
		echo $args['after_widget'];
	}

}