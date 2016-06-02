<?php


// Is page a child of another?
function cabbagecms_is_child($pageID) { 
	global $post; 
	if( is_page() && ($post->post_parent==$pageID) ) :
			   return true;
	else : 
			   return false; 
	endif;
}

// allow shortcodes in text widget
add_filter( 'widget_text', 'do_shortcode' );