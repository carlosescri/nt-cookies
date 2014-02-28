<?php
/*
Plugin Name: Cookies Policy Message (nt)
Plugin URI: https://github.com/carlosescri/nt-cookies
Description: Wordpress plugin to display a cookies policy message in your blog.
Author: Carlos Escribano
Version: 1.0
Author URI: http://nettoys.es
*/

function nt_cp_dir()
{
  return dirname(plugin_basename(__FILE__));
}

/**
 * Add CSS and Javascript
 */

function nt_cp_assets()
{
    $plugin_dir = nt_cp_dir();

    wp_enqueue_style('nt-cookies-css', plugins_url().'/'.$plugin_dir.'/assets/nt-cookies.css');

    wp_register_script('jquery-cookie',
                       '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js',
                       array('jquery'));
    wp_register_script('jquery-easing',
                       '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
                       array('jquery'));
    wp_enqueue_script('nt-cookies-js',
                      plugins_url().'/'.$plugin_dir.'/assets/nt-cookies.js',
                      array('jquery', 'jquery-cookie', 'jquery-easing'));
}

add_action('wp_enqueue_scripts', 'nt_cp_assets');

/**
 * Load translations
 */

function nt_cp_translations()
{
    load_plugin_textdomain('nt-cookies', false, nt_cp_dir().'/languages/');
}

add_action('plugins_loaded', 'nt_cp_translations');

/**
 * Display the message in the footer.
 */

function nt_cp_message()
{
    $nt_cp_label_text = get_option('nt_cp_label_text', __('Agree', 'nt-cookies'));
    $nt_cp_message_text = get_option('nt_cp_message_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, iure quae soluta nobis ipsam ducimus ab odio dicta necessitatibus ipsa officia facilis porro.');
?>
    <div id="nt-cookie-policy" class="nt-cp-notice nt-cp-hidden">
        <div class="nt-cp-bg"></div>
        <div class="nt-cp-content">
            <a class="nt-cp-close" href="#"><?php echo $nt_cp_label_text ?></a>
            <p><?php echo $nt_cp_message_text ?></p>
        </div>
    </div>
<?php
}

add_action('wp_footer', 'nt_cp_message');


/**
 * Admin Page
 */

function nt_cp_admin_page()
{
    include('nt-cookies-options.php');
}

function nt_cp_admin_actions()
{
    add_options_page('Cookie Policy', 'Cookie Policy', 1, 'CookiePolicy', 'nt_cp_admin_page');
}

add_action('admin_menu', 'nt_cp_admin_actions');
