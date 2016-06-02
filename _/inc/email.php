<?php												
 
function cabbagecms_hide_email_shortcode( $atts , $content = null ) { // general email shortcode. Usage: [email]john.doe@mysite.com[/email]
	
	if ( ! is_email( $content ) ) {
		return;
	}

return '<a title="email ' . get_option('blogname') . '" href="mailto:' . antispambot( $content ) . '">' . antispambot( $content ) . '</a>';
}

add_shortcode( 'email', 'cabbagecms_hide_email_shortcode' );