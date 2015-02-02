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

}