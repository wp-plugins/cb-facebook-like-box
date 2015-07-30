<?php
/*
 * Plugin Name: CB Facebook Like Box
 * Description: Easy facebook like box in WordPress site. go to appearance>widget>use 'Facebook Like Widget'. 
 * Version: 1.0
 * Author: Md Abul Bashar
 * Author URI: http://www.codingbank.com
 */





// Extends WP_Widget Class
class custom_widget_class extends WP_Widget{
	
	//widget register construct function
	public function __construct(){
		parent::__construct ('custom_widget_class', __('Facebook Like Widget', 'textdomain'), array('description' => __('This is facebook like box for only wordpress', 'textdomain')));
		
	}
	
	// widget output function
	public function widget($args, $instance){
		
		//variable with condition
		if($instance['title']){
			$title = $instance['title'];			
		}
		else {
			$title = 'Facebook Like';			
		}
		if($instance['fb_link']){
			
			$fb_link = $instance['fb_link'];			
		}
		else {
				$fb_link = 'pchelpcenter';			
		}
		if($instance['fb_width']) {
			$fb_width = $instance['fb_width'];			
		}
		else {			
			$fb_width = '100%';
		}
		if($instance['fb_height']) {
			$fb_height = $instance['fb_height'];
			
		}
		else {
			
			$fb_height = '300px';
		}
		
		
		
		//output content
		echo $args['before_widget'].$args['before_title'].$title.$args['after_title'];
		
		echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2F'.$fb_link.'&amp;width=297&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$fb_width.'; height:'.$fb_height.';" allowTransparency="true"></iframe>'.$args['after_widget'];		
	
		
	}
	
	//widget dynamic content 
	public function form($instance){
		
		//variable with condition
		if($instance['title']){
			$title = $instance['title'];			
		}
		else {
			$title = 'Facebook Like';			
		}
		if($instance['fb_link']){
			
			$fb_link = $instance['fb_link'];			
		}
		else {
				$fb_link = 'pchelpcenter';			
		}
		if($instance['fb_width']) {
			$fb_width = $instance['fb_width'];			
		}
		else {			
			$fb_width = '100%';
		}
		if($instance['fb_height']) {
			$fb_height = $instance['fb_height'];
			
		}
		else {
			
			$fb_height = '300px';
		}

		?>
		
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: </label></p>
		<p><input class="widefat" name="<?php echo $this->get_field_name('title');?>" type="text" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('fb_link'); ?>">Facebook ID or User Name: </label></p>
		<p><input class="widefat" name="<?php echo $this->get_field_name('fb_link');?>" type="text" id="<?php echo $this->get_field_id('fb_link'); ?>" value="<?php echo $fb_link; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('fb_width'); ?>">Width: </label></p>
		<p><input name="<?php echo $this->get_field_name('fb_width');?>" type="text" id="<?php echo $this->get_field_id('fb_width'); ?>" value="<?php echo $fb_width; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('fb_height'); ?>">Height: </label></p>
		<p><input name="<?php echo $this->get_field_name('fb_height');?>" type="text" id="<?php echo $this->get_field_id('fb_height'); ?>" value="<?php echo $fb_height; ?>" /></p>
		
	<?php }
	
	
	//database update function
	public function update($new_instance, $old_instance){
		
			
			$instance = $old_instance;
				
		// variable name replace
			$instance['title'] = $new_instance['title']; 
			$instance['fb_link'] = $new_instance['fb_link'];
			$instance['fb_width'] = $new_instance['fb_width'];
			$instance['fb_height'] = $new_instance['fb_height'];
	
		return $instance;
		
	}
	
}


//function add custom widget in admin panel
function custom_widget (){
	register_widget('custom_widget_class');
	
}
add_action('widgets_init', 'custom_widget');






