<?php

function cabbagecms_gravity_forms_goodies() {
    
    if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) :
    
        // grab session variable and populate gravity forms field
        function cabbagecms_session_referrer($value) {
                
                reset($_SESSION);
                $referrer = key($_SESSION);
                return $referrer;
        }
        add_filter('gform_field_value_session_ref', 'cabbagecms_session_referrer');
        
        // add admin menu item
        function cabbagecms_admin_bar_gf() {
                
                global $wp_admin_bar;
                $wp_admin_bar->add_menu(array(
                        'id' => 'wp-admin-bar-gf',
                        'title' => __('Form Entries'),
                        'href' => '//' .$_SERVER["HTTP_HOST"] . '/wp-admin/admin.php?page=gf_entries'
                ));
        }
        add_action('wp_before_admin_bar_render', 'cabbagecms_admin_bar_gf');
    
    endif;
    }
add_action( 'admin_init', 'cabbagecms_gravity_forms_goodies' );