<?php												

function cabbagecms_googleplus_button() { 

	global $googleplus_js;

    if ($googleplus_js === 'true' || $googleplus_js === 'yes' || $googleplus_js === '1') : ?>
		
	<!-- Google+ -->
	<script type="text/javascript">
            (function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
	</script>
	
<?php endif; }

add_action('wp_footer', 'cabbagecms_googleplus_button');

function cabbagecms_add_google_plus_meta() {
 
	if( is_single() ) :
 
		global $post;
 
		$post_id = get_the_ID();
		setup_postdata( $post );
 
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );
		$thumbnail = empty( $thumbnail ) ? '' : '<meta itemprop="image" content="' . esc_url( $thumbnail[0] ) . '">';
	?>
 
        <!-- Google+ meta tags -->
        <meta itemprop="name" content="<?php esc_attr( the_title() ); ?>">
        <meta itemprop="description" content="<?php echo esc_attr( get_the_excerpt() ); ?>">
        <?php echo $thumbnail . "\n"; ?>
        <!-- eof Google+ meta tags -->
	
        <?php endif;
 
}

add_action( 'wp_head', 'cabbagecms_add_google_plus_meta' );

function cabbagecms_google_pub() {
  
  $cabbagecms_google_pub = get_option('cabbagecms_google_publisher');
  
  if ( $cabbagecms_google_pub ) : ?>   
<link rel="publisher" href="<?php echo $cabbagecms_google_pub; ?>" />
  <?php endif;
  
}

add_action('wp_head', 'cabbagecms_google_pub');