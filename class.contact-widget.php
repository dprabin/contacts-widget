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
		//display form
		echo $this->getForm($recipient,$subject);
		
		echo $args['after_widget'];
	}


	/*
	 * Backend Form
	 */
	public function form($instance){
		if(isset($instance['title'])){
			$title = $instance['title']
		} else {
			$title = __('Ajax Contact Widget','text_domain');
		}
		$recipient = $instance['recipient'];
		$subject = $instance['subject'];

?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('recipient'); ?>"><?php _e('Recipient:') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('recipient'); ?>" name="<?php echo $this->get_field_name('recipient'); type="text" value="<?php echo esc_attr($recipient); ?>" ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('subject'); ?>"><?php _e('Subject:') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('subject'); ?>" name="<?php echo $this->get_field_name('subject'); ?>" type="text" value="<?php echo esc_attr($subject); ?>" />
		</p>
<?php
	}

	/*
	 * Update method to save
	 */
	public function update($new_instance, $old_instance){

	}
}