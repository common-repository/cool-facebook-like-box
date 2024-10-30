<?php
/**
 * @package Cool Facebook Like Box
 * @version 1.0
 */
/*
Plugin Name: Cool Facebook Like Box
Plugin URI: http://www.wpwee.com/plugins/selectad
Description: Custom skin for facebook like button.
Author: Aimad-Eddine
Version: 1.0
Author URI: http://www.facebook.com/Aimadnet
*/

define("css_url", WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'style.php');
	
class CFBLBWidget extends WP_Widget {
    /** constructor */
    function CFBLBWidget() {
        $options = array( 'description' => __( "Custom skin for facebook like button.") );
        parent::WP_Widget(false, $name = 'Cool FB Like Box', $options);	
    }

	/** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']); 
        echo $before_widget . $before_title . $title . $after_title;
        $cssurlwithparams = css_url."?params=".$instance['bgcolor']."-".$instance['hrcolor']."-".$instance['lkcolor']."-".$instance['ttcolor'];
        $profileid = $instance['profileid'];
        $connections = $instance['connections'];
        $boxwidth = $instance['width'];
        $boxheight = $instance['height'];
?>

<!-- BEGiN : Cool Facebook Like Box -->
<div id="fb-root"></div>
<script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php" type="text/javascript"></script>
<script type="text/javascript">FB.init();</script>
<?php echo $apikey; ?>
<!-- FBML <fb:fan profile_id="<?php echo $profileid; ?>" connections="<?php echo $connections; ?>" width="<?php echo $boxwidth; ?>" height="<?php echo $boxheight; ?>" css="<?php echo $cssurlwithparams; ?>"></fb:fan> FBML -->
<script type="text/javascript" >
var fbVObject = document.getElementsByTagName("body");
for(i = 0; i < fbVObject.length; i++) {  
    var fbRObject = fbVObject[i].innerHTML;
    var fbRObject = fbRObject.replace("<!-- FBML ", "");
    var fbRObject = fbRObject.replace(" FBML -->", "");    
    fbVObject[i].innerHTML = fbRObject;
}
</script>
<!-- END : Cool Facebook Like Box -->

<?php

		echo $after_widget;

    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
		  $title = esc_attr(isset($instance['title']) ? $instance['title'] : "Follow me on Facebook");
		  $profileid = esc_attr(isset($instance['profileid']) ? $instance['profileid'] : "167718873321478");    
        $lkcolor = esc_attr(isset($instance['lkcolor']) ? $instance['lkcolor'] : "FFFFFF");
        $bgcolor = esc_attr(isset($instance['bgcolor']) ? $instance['bgcolor'] : "FFFFFF");
        $hrcolor = esc_attr(isset($instance['hrcolor']) ? $instance['hrcolor'] : "CCCCCC");
        $ttcolor = esc_attr(isset($instance['ttcolor']) ? $instance['ttcolor'] : "000000");
        $width = esc_attr(isset($instance['width']) ? $instance['width'] : "250");
        $height = esc_attr(isset($instance['height']) ? $instance['height'] : "300");
        $connections = esc_attr(isset($instance['connections']) ? $instance['connections'] : "8");
?>
        	<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />	        	
        	</p>
        	<p>
				<label for="<?php echo $this->get_field_id('profileid'); ?>">Profile ID :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('profileid'); ?>" name="<?php echo $this->get_field_name('profileid'); ?>" type="text" value="<?php echo $profileid; ?>" />	        	
        	</p>
         <p>
            <label for="<?php echo $this->get_field_id('hrcolor'); ?>">Header color (without "#")</label>
            <input class="widefat" id="<?php echo $this->get_field_id('hrcolor'); ?>" type="text" name="<?php echo $this->get_field_name('hrcolor'); ?>" value="<?php echo $hrcolor; ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('bgcolor'); ?>">Background color (without "#")</label>
            <input class="widefat" id="<?php echo $this->get_field_id('bgcolor'); ?>" type="text" name="<?php echo $this->get_field_name('bgcolor'); ?>" value="<?php echo $bgcolor; ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('lkcolor'); ?>">Links color (without "#")</label>
            <input class="widefat" id="<?php echo $this->get_field_id('lkcolor'); ?>" type="text" name="<?php echo $this->get_field_name('lkcolor'); ?>" value="<?php echo $lkcolor; ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('ttcolor'); ?>">Text color (without "#")</label>
            <input class="widefat" id="<?php echo $this->get_field_id('ttcolor'); ?>" type="text" name="<?php echo $this->get_field_name('ttcolor'); ?>" value="<?php echo $ttcolor; ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('width'); ?>">Width :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" type="text" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $width; ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_id('height'); ?>">Height :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" type="text" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo $height; ?>" />
         </p>        
         <p>
            <label for="<?php echo $this->get_field_id('connections'); ?>">Connections :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('connections'); ?>" type="text" name="<?php echo $this->get_field_name('connections'); ?>" value="<?php echo $connections; ?>" />
         </p>          
        <?php 
    }
}

add_action('widgets_init', create_function('', 'return register_widget("CFBLBWidget");'));

?>