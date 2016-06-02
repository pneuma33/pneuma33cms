<?php												

function cabbagecms_analytics_header_inject() {
  
  $cabbagecms_analytics_id = get_option('cabbagecms-google-analytics');
  
  if ( $cabbagecms_analytics_id ) : ?>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', '<?php echo $cabbagecms_analytics_id; ?>', 'auto');
	  ga('require', 'displayfeatures');
	  ga('send', 'pageview');
	
	</script>
    
<?php endif; }

add_action('wp_head', 'cabbagecms_analytics_header_inject');

function cabbagecms_site_veri_meta() {
  
  $cabbagecms_wt_site_veri = get_option('cabbagecms_google_site_verification');
  $cabbagecms_bing_site_veri = get_option('cabbagecms_bing_site_verification');
  $cabbagecms_pinterest_site_veri = get_option('cabbagecms_pinterest_site_verification');
  
  if ( $cabbagecms_wt_site_veri ) : ?>   
<meta name="google-site-verification" content="<?php echo $cabbagecms_wt_site_veri; ?>" />   
  <?php endif;
  
  if ( $cabbagecms_bing_site_veri ) : ?>   
<meta name="msvalidate.01" content="<?php echo $cabbagecms_bing_site_veri; ?>" /> 
  <?php endif;
  
  if ( $cabbagecms_pinterest_site_veri ) : ?>   
<meta name="p:domain_verify" content="<?php echo $cabbagecms_pinterest_site_veri; ?>" />   
  <?php endif;
  
}

add_action('wp_head', 'cabbagecms_site_veri_meta');