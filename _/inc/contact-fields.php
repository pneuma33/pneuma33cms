<?php

/* add more fields in user section
 *
 * Usage - set var before loop
 * <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author')); ?>
 * echo $curauth->googleplusurl;
 *
*/

function cabbagecms_add_linkedin( $contactmethods ) {
  if ( !isset( $contactmethods['linkedinurl'] ) )
	$contactmethods['linkedinurl'] = 'LinkedIn URL';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_linkedin', 10, 1 );

function cabbagecms_add_linkedinid( $contactmethods ) {
  if ( !isset( $contactmethods['linkedinid'] ) )
	$contactmethods['linkedinid'] = 'LinkedIn ID';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_linkedinid', 10, 1 );

function cabbagecms_add_twitterurl( $contactmethods ) {
  if ( !isset( $contactmethods['twitterurl'] ) )
	$contactmethods['twitterurl'] = 'Twitter URL';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_twitterurl', 10, 1 );

function cabbagecms_add_twitterid( $contactmethods ) {
  if ( !isset( $contactmethods['twitterid'] ) )
	$contactmethods['twitterid'] = 'Twitter ID';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_twitterid', 10, 1 );

function cabbagecms_add_facebook( $contactmethods ) {
  if ( !isset( $contactmethods['facebookurl'] ) )
  $contactmethods['facebookurl'] = 'Facebook URL';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_facebook', 10, 1 );

function cabbagecms_add_googleplus( $contactmethods ) {
  if ( !isset( $contactmethods['googleplusurl'] ) )
  $contactmethods['googleplusurl'] = 'Google+ URL';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_googleplus', 10, 1 );

function cabbagecms_add_title( $contactmethods ) {
  if ( !isset( $contactmethods['title'] ) )
	$contactmethods['title'] = 'Job Title';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_title', 10, 1 );

function cabbagecms__add_role( $contactmethods ) {
  if ( !isset( $contactmethods['cabbagecms_role'] ) )
	$contactmethods['cabbagecms_role'] = 'Job Role';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms__add_role', 10, 1 );

function cabbagecms_add_photo( $contactmethods ) {
  if ( !isset( $contactmethods['photo'] ) )
	$contactmethods['photo'] = 'Profile Photo (id #)';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_photo', 10, 1 );

function cabbagecms_add_caption( $contactmethods ) {
  if ( !isset( $contactmethods['cabbagecms_caption'] ) )
	$contactmethods['cabbagecms_caption'] = 'Caption (id #)';
 
  return $contactmethods;
}
add_filter( 'user_contactmethods', 'cabbagecms_add_caption', 10, 1 );