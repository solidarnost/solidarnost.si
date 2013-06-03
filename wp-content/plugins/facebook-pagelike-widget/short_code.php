<?php 
function fb_plugin_shortcode() {
	
	$widget_facebook_widget = get_option( 'widget_facebook_widget' );
	
	foreach ($widget_facebook_widget as $facebook_widget) {
		
		$show_faces		=	$facebook_widget['show_faces'];
		$show_stream	=	$facebook_widget['data_stream'];
		$show_header	=	$facebook_widget['show_header'];
		$title			=	$facebook_widget['title'];
		$app_id			=	$facebook_widget['app_id'];
		$fb_url			=	$facebook_widget['fb_url'];
		$width			=	$facebook_widget['width'];
		$height			=	$facebook_widget['height'];
		$color_scheme	=	$facebook_widget['color_scheme'];
		
		echo $before_widget;
        if ( $title )
        echo $before_title . $title . $after_title;
		
        wp_register_script( 'myownscript', FB_WIDGET_PLUGIN_URL . 'fb.js' , array('jquery'));
        wp_enqueue_script( 'myownscript' );
        $local_variables = array('app_id' => $app_id);
        wp_localize_script( 'myownscript', 'vars', $local_variables );
        
		echo '<div id="fb-root"></div>
        <div class="fb-like-box" data-href="'.$fb_url.'" data-width="'.$width.'" data-height="'.$height.'" data-colorscheme="'.$color_scheme.'" data-show-faces="'.$show_faces.'" data-stream="'.$show_stream.'" data-header="'.$show_header.'"></div>';
        echo $after_widget;	
	}
}

add_shortcode('fb_widget','fb_plugin_shortcode');
?>