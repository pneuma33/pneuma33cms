<?php

// set some variables

$prefix = "cabbagecms_";

$group_name = 'cabbagecms-settings';
$menu_page_slug = 'pneuma33cms-options-page';
$page_title = 'Pneuma33 CMS Options';

$option_id_one = 'cabbagecms-google-analytics';
$option_id_two = 'cabbagecms-twitter';
$option_id_three = 'cabbagecms-googleplus';
$option_id_four = 'cabbagecms-pinterest';
$option_id_five = 'cabbagecms-instagram';
$option_id_six = 'cabbagecms-linkedin';
$option_id_seven = 'cabbagecms-youtube';
$option_id_eight = 'cabbagecms-facebook';
$option_id_nine = 'cabbagecms_google_site_verification';
$option_id_ten = 'cabbagecms_bing_site_verification';
$option_id_eleven = 'cabbagecms_pinterest_site_verification';
$option_id_twelve = 'cabbagecms_google_publisher';
$option_id_thirteen = 'pinterest_js';
$option_id_fourteen = 'googleplus_js';

$cabbagecms_facebook = get_option('cabbagecms-facebook');
$cabbagecms_twitter = get_option('cabbagecms-twitter');
$cabbagecms_youtube = get_option('cabbagecms-youtube');
$cabbagecms_pinterest = get_option('cabbagecms-pinterest');
$cabbagecms_instagram = get_option('cabbagecms-instagram');
$cabbagecms_googleplus = get_option('cabbagecms-googleplus');
$cabbagecms_linkedin = get_option('cabbagecms-linkedin');

$cabbagecms_company_name = get_option('blogname');

// booleans
$pinterest_js = get_option('pinterest_js');
$googleplus_js = get_option('googleplus_js');

$cabbagecms_options_page = site_url('/wp-admin/options-general.php?page=pneuma33cms-options-page');


function cabbagecms_remove_dashboard_meta() { // remove default dashboard widgets

    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'cabbagecms_remove_dashboard_meta' );



function cabbagecms_login_logo() { // use cabbage as login logo

    $cabbagecms_logo = plugins_url('../img/pneuma33.png', __FILE__ );
    ?>
     <style type="text/css">
        body.login div#login h1 a {
            background-image: url("<?php echo $cabbagecms_logo; ?>");
        }
     </style>
<?php }
add_action('login_head', 'cabbagecms_login_logo');



function cabbagecms_styles_inject() { // Add styles for social

wp_enqueue_style( 'cabbagecms_connect_css', plugins_url('../css/cabbagecms_connect.css', __FILE__ ), array(), '1.0', 'all' );
}
add_action('wp_enqueue_scripts', 'cabbagecms_styles_inject');

function cabbagecms_admin_css() { // enqueue styles for admin

    wp_enqueue_style( 'cabbagecms_admin_css', plugins_url('../css/cabbagecms_admin.css', __FILE__ ), array(), '1.0', 'all' );
}
add_action('admin_print_styles', 'cabbagecms_admin_css' );



function cabbagecms_admin_bar_cabbagecms() { // add admin menu item

    global $wp_admin_bar, $cabbagecms_options_page;
    $wp_admin_bar->add_menu(array(
    'id' => 'wp-admin-bar-cabbagecms',
    'title' => __('Pneuma33 CMS Options'),
    'href' => $cabbagecms_options_page
    ));
}
add_action('wp_before_admin_bar_render', 'cabbagecms_admin_bar_cabbagecms');



function cabbagecms_dashboard() { // populate dashboard widget

    $cabbagecms_logo = plugins_url('../img/pneuma33.png', __FILE__ );

    echo '<img src="'. $cabbagecms_logo . '" class="cabbagecms-center" alt="Pneuma33 logo" />';
    echo '<h2 class="cabbagecms-welcome">Welcome to Pneuma33 CMS</h2>';
    echo '<p>Welcome to your Pneuma33 CMS administration panel. From here, you can manage your Pneuma33 site. If you require assistance, please visit <a href="https://support.pneuma33.com/">P33 Support Center</a> to submit a ticket. Our knowledgeable and friendly staff will quickly respond to your request. You may also email the support staff at <a href="mailto:support@pneuma33.com">support@pnuema33.com</a>. Thank you for choosing Pneuma33.</p>';
    echo '<em>Pneuma33 Support Team</em><br />';
}

function cabbagecms_register_widget() { // add dashboard widget

    wp_add_dashboard_widget('cabbagecms-dashboard', 'Pneuma33 CMS', 'cabbagecms_dashboard');
}

add_action('wp_dashboard_setup', 'cabbagecms_register_widget');



function add_cabbagecms_options_page() { // add the page to the admin menu

    global $menu_page_slug, $page_title;

    add_options_page(
        $page_title, // page title
        'Pneuma33 CMS', // menu title
        'manage_options', // capability - who can see this menu
        $menu_page_slug, // menu slug
        'display_cabbagecms_options_page' // callback function to be called to output the content for this page
    );

}
add_action( 'admin_menu', 'add_cabbagecms_options_page' );

function display_cabbagecms_options_page() { // callback function from add_cabbagecms_options_page()

    global $group_name, $menu_page_slug, $page_title;

    echo '<div class="wrap">';
    echo '<h2>' . $page_title . '</h2>';
    echo '<form method="post" action="options.php">';

    do_settings_sections( $menu_page_slug ); // slug name of the page whose settings sections you want to output.
    settings_fields( $group_name ); // settings group name, this should match the group name used in register_setting().

    submit_button();

    echo '</form>';
    echo '</div>';

}

function cabbagecms_admin_init_google() { // Google Analytics and WT

    global $group_name, $menu_page_slug;

    add_settings_section(
        'cabbagecms-settings-section-one', // section
        'Pneuma33 CMS - Analytics, Webmaster Tools and Verification Codes', // section title
        'display_cabbagecms_settings_message_google', // callback function
        $menu_page_slug // The menu page on which to display this section
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_google' );

function display_cabbagecms_settings_message_google() { // callback function for add_settings_section()

    echo "Enter the tracking ID (UA-XXXXXXXX-X) and site verification codes";

}

function cabbagecms_admin_init_ga() { // GA config

    global $group_name, $menu_page_slug;
    global $option_id_one;

    add_settings_field(
        $option_id_one, // id
        'Google Analytics Tracking ID', // title of field
        'render_cabbagecms_input_field_ga', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-one' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_one, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_ga' );


function render_cabbagecms_input_field_ga() {

    global $option_id_one;

    $input = get_option( $option_id_one );
    echo '<input type="text" id="' . $option_id_one . '" name="' . $option_id_one . '" value="' . $input . '" />';

} // end GA config

function cabbagecms_admin_init_wt() { // WT config

    global $group_name, $menu_page_slug;
    global $option_id_nine;

    add_settings_field(
        $option_id_nine, // id
        'Google Webmaster Tools Verification Code', // title of field
        'render_cabbagecms_input_field_wt', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-one' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_nine, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_wt' );


function render_cabbagecms_input_field_wt() {

    global $option_id_nine;

    $input = get_option( $option_id_nine );
    echo '<input type="text" id="' . $option_id_nine . '" name="' . $option_id_nine . '" value="' . $input . '" />';

} // end WT config

function cabbagecms_admin_init_bing() { // bing config

    global $group_name, $menu_page_slug;
    global $option_id_ten;

    add_settings_field(
        $option_id_ten, // id
        'Bing Webmaster Tools Verification Code', // title of field
        'render_cabbagecms_input_field_bing', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-one' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_ten, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_bing' );


function render_cabbagecms_input_field_bing() {

    global $option_id_ten;

    $input = get_option( $option_id_ten );
    echo '<input type="text" id="' . $option_id_ten . '" name="' . $option_id_ten . '" value="' . $input . '" />';

} // end bing config

function cabbagecms_admin_init_google_pub() { // google publisher config

    global $group_name, $menu_page_slug;
    global $option_id_twelve;

    add_settings_field(
        $option_id_twelve, // id
        'Google Publisher Page URL', // title of field
        'render_cabbagecms_input_field_google_pub', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-one' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_twelve, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_google_pub' );


function render_cabbagecms_input_field_google_pub() {

    global $option_id_twelve;

    $input = get_option( $option_id_twelve );
    echo '<input type="text" id="' . $option_id_twelve . '" name="' . $option_id_twelve . '" value="' . $input . '" />';

} // end google publisher config

function cabbagecms_admin_init_pinterest_veri() { // pinterest config

    global $group_name, $menu_page_slug;
    global $option_id_eleven;

    add_settings_field(
        $option_id_eleven, // id
        'Pinterest Verification Code', // title of field
        'render_cabbagecms_input_field_pinterest_veri', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-one' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_eleven, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_pinterest_veri' );


function render_cabbagecms_input_field_pinterest_veri() {

    global $option_id_eleven;

    $input = get_option( $option_id_eleven );
    echo '<input type="text" id="' . $option_id_eleven . '" name="' . $option_id_eleven . '" value="' . $input . '" />';

} // end pinterest config



function cabbagecms_admin_init_social_networks() { // social networks section

    global $group_name, $menu_page_slug;

    add_settings_section(
        'cabbagecms-settings-section-two', // section
        'Pneuma33 CMS - Social Networks', // section title
        'display_cabbagecms_settings_message_social_networks', // callback function
        $menu_page_slug // The menu page on which to display this section
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_social_networks' );

function display_cabbagecms_settings_message_social_networks() { // callback function for add_settings_section()

    echo "Please enter the details for each social network";

}

function cabbagecms_admin_init_twitter() { // twitter config

    global $group_name, $menu_page_slug;
    global $option_id_two;

    add_settings_field(
        $option_id_two, // id
        'Twitter URL', // title of field
        'render_cabbagecms_input_field_twitter', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_two, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_twitter' );


function render_cabbagecms_input_field_twitter() {

    global $option_id_two;

    $input = get_option( $option_id_two );
    echo '<input type="text" id="' . $option_id_two . '" name="' . $option_id_two . '" value="' . $input . '" />';

} // end twitter config

function cabbagecms_admin_init_googleplus() { // googleplus config

    global $group_name, $menu_page_slug;
    global $option_id_three;

    add_settings_field(
        $option_id_three, // id
        'Google+ URL', // title of field
        'render_cabbagecms_input_field_googleplus', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_three, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_googleplus' );


function render_cabbagecms_input_field_googleplus() {

    global $option_id_three;

    $input = get_option( $option_id_three );
    echo '<input type="text" id="' . $option_id_three . '" name="' . $option_id_three . '" value="' . $input . '" />';

} // end googleplus config

function cabbagecms_admin_init_pinterest() { // pinterest config

    global $group_name, $menu_page_slug;
    global $option_id_four;

    add_settings_field(
        $option_id_four, // id
        'Pinterest URL', // title of field
        'render_cabbagecms_input_field_pinterest', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_four, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_pinterest' );


function render_cabbagecms_input_field_pinterest() {

    global $option_id_four;

    $input = get_option( $option_id_four );
    echo '<input type="text" id="' . $option_id_four . '" name="' . $option_id_four . '" value="' . $input . '" />';

} // end pinterest config

function cabbagecms_admin_init_instagram() { // instagram config

    global $group_name, $menu_page_slug;
    global $option_id_five;

    add_settings_field(
        $option_id_five, // id
        'Instagram URL', // title of field
        'render_cabbagecms_input_field_instagram', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_five, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_instagram' );


function render_cabbagecms_input_field_instagram() {

    global $option_id_five;

    $input = get_option( $option_id_five );
    echo '<input type="text" id="' . $option_id_five . '" name="' . $option_id_five . '" value="' . $input . '" />';

} // end instagram config

function cabbagecms_admin_init_linkedin() { // linkedin config

    global $group_name, $menu_page_slug;
    global $option_id_six;

    add_settings_field(
        $option_id_six, // id
        'LinkedIn URL', // title of field
        'render_cabbagecms_input_field_linkedin', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_six, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_linkedin' );


function render_cabbagecms_input_field_linkedin() {

    global $option_id_six;

    $input = get_option( $option_id_six );
    echo '<input type="text" id="' . $option_id_six . '" name="' . $option_id_six . '" value="' . $input . '" />';

} // end linkedin config

function cabbagecms_admin_init_youtube() { // youtube config

    global $group_name, $menu_page_slug;
    global $option_id_seven;

    add_settings_field(
        $option_id_seven, // id
        'YouTube URL', // title of field
        'render_cabbagecms_input_field_youtube', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_seven, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_youtube' );


function render_cabbagecms_input_field_youtube() {

    global $option_id_seven;

    $input = get_option( $option_id_seven );
    echo '<input type="text" id="' . $option_id_seven . '" name="' . $option_id_seven . '" value="' . $input . '" />';

} // end youtube config

function cabbagecms_admin_init_facebook() { // facebook config

    global $group_name, $menu_page_slug;
    global $option_id_eight;

    add_settings_field(
        $option_id_eight, // id
        'Facebook URL', // title of field
        'render_cabbagecms_input_field_facebook', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_eight, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_facebook' );


function render_cabbagecms_input_field_facebook() {

    global $option_id_eight;

    $input = get_option( $option_id_eight );
    echo '<input type="text" id="' . $option_id_eight . '" name="' . $option_id_eight . '" value="' . $input . '" />';

} // end facebook config

function cabbagecms_admin_init_pinterestjs() { // include pinterest option

    global $group_name, $menu_page_slug;
    global $option_id_thirteen;

    add_settings_field(
        $option_id_thirteen, // id
        'Include Pinterest JS?', // title of field
        'render_cabbagecms_input_field_pinterestjs', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_thirteen, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_pinterestjs' );


function render_cabbagecms_input_field_pinterestjs() {

    global $option_id_thirteen;

    // set default value if none is entered
    if(empty($pinterest_js)) :
        $input = get_option( $option_id_thirteen );
    else :
        $input = '1';
    endif;

    echo '<input type="text" id="' . $option_id_thirteen . '" name="' . $option_id_thirteen . '" value="' . $input . '" />';

} // end include pinterest option

function cabbagecms_admin_init_googleplusjs() { // include googleplus option

    global $group_name, $menu_page_slug;
    global $option_id_fourteen;

    add_settings_field(
        $option_id_fourteen, // id
        'Include Googleplus JS?', // title of field
        'render_cabbagecms_input_field_googleplusjs', // callback function
        $menu_page_slug, // page
        'cabbagecms-settings-section-two' // section
    );

    register_setting(
        $group_name, // group name
        $option_id_fourteen, // name of an option to sanitize and save.
        'esc_attr' // callback function that sanitizes the option's value
    );

}
add_action( 'admin_init', 'cabbagecms_admin_init_googleplusjs' );


function render_cabbagecms_input_field_googleplusjs() {

    global $option_id_fourteen;

    // set default value if none is entered
    if(empty($googleplus_js)) :
        $input = get_option( $option_id_fourteen );
    else :
        $input = '1';
    endif;

    echo '<input type="text" id="' . $option_id_fourteen . '" name="' . $option_id_fourteen . '" value="' . $input . '" />';

} // end include googleplus option
