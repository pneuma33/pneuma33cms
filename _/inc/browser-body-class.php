<?php
 
/**
 * Extends the body_class(); to include browser detection
 * Props to Thematic: http://wordpress.org/extend/themes/thematic
 */
 
function cabbagecms_browser_body_class($classes) {
 
    // A little Browser detection shall we?
    $browser = $_SERVER[ 'HTTP_USER_AGENT' ];
    
    // is mobile
    require_once 'mobile-detect/Mobile_Detect.php';
    $detect = new Mobile_Detect;
    if ( $detect->isMobile() ) {
        $classes[] = 'mobile';
    }
    
    if( $detect->isTablet() ){
        $classes[] = 'tablet';
    }
    
    if( $detect->isMobile() && !$detect->isTablet() ){
        $classes[] = 'phone';
    }

    if( !$detect->isMobile() && !$detect->isTablet() ){
        $classes[] = 'desktop';
    }
    
    // Mac, PC ...or Linux
    if ( preg_match( "/Mac/", $browser ) ){
        $classes[] = 'mac';

    } elseif ( preg_match( "/Windows/", $browser ) ){
        $classes[] = 'windows';

    } elseif ( preg_match( "/Linux/", $browser ) ) {
        $classes[] = 'linux';

    } else {
        $classes[] = 'unknown-os';
    }

    // Checks browsers in this order: Chrome, Safari, Opera, MSIE, FF
    if ( preg_match( "/Chrome/", $browser ) ) {
        $classes[] = 'chrome';

        preg_match( "/Chrome\/(\d.\d)/si", $browser, $matches);
        if ($matches) {
            $classesh_version = 'ch' . str_replace( '.', '-', $matches[1] ); 
            $classes[] = $classesh_version;
        }

    } elseif ( preg_match( "/Safari/", $browser ) && !preg_match( "/Chrome/", $browser ) ) {
        $classes[] = 'safari';

        preg_match( "/Version\/(\d.\d)/si", $browser, $matches);
        $sf_version = 'sf' . str_replace( '.', '-', $matches[1] );
        $classes[] = $sf_version;

    } elseif ( preg_match( "/Opera/", $browser ) ) {
        $classes[] = 'opera';

        preg_match( "/Opera\/(\d.\d)/si", $browser, $matches);
        $op_version = 'op' . str_replace( '.', '-', $matches[1] );
        $classes[] = $op_version;

    } elseif ( preg_match( "/MSIE/", $browser ) ) {
        $classes[] = 'msie';

    if( preg_match( "/MSIE 6.0/", $browser ) ) {
        $classes[] = 'ie6';
    } elseif ( preg_match( "/MSIE 7.0/", $browser ) ){
        $classes[] = 'ie7';
    } elseif ( preg_match( "/MSIE 8.0/", $browser ) ){
        $classes[] = 'ie8';
    } elseif ( preg_match( "/MSIE 9.0/", $browser ) ){
        $classes[] = 'ie9';
    }

    } elseif ( preg_match( "/Firefox/", $browser ) && preg_match( "/Gecko/", $browser ) ) {
        $classes[] = 'firefox';

        preg_match( "/Firefox\/(\d)/si", $browser, $matches);
        $ff_version = 'ff' . str_replace( '.', '-', $matches[1] );
        $classes[] = $ff_version;

    } else {
        $classes[] = 'unknown-browser';
    }

    return $classes;
}
 
add_filter('body_class','cabbagecms_browser_body_class');