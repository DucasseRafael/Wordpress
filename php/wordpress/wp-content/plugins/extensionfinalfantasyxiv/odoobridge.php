<?php

/**
 * Plugin Name: Final Fantasy XIV
 * Plugin URI: https://www.bandeauInfo.fr
 * Description: Final Fantasy XIV description
 * Version: 1.0.0
 * Author: Rafael Ducasse
 * Author URI: https://www.iutbayonne.univ-pau.fr/
 * Text Domain: FinalFantasyXIV
 */

// This function is executed when the plugin is activated
function final_fantasy_xiv_odooBridgeInstall()
{ 
    $check_page_exist = get_page_by_path('odoofinalfantasyxiv', 'OBJECT', 'page');
    // Check if the page already exists
    if(empty($check_page_exist)) {
        $page_id = wp_insert_post(
            array(
            'post_author'    => 1,
            'post_title'     => 'Liste Final Fantasy XIV',
            'post_name'      => 'odoofinalfantasyxiv',
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_content'   => '',
            'post_parent'    => ''
            )
        );
    }
    // Vérifier s'il y a eu une erreur
    if ( is_wp_error( $page_id ) ) {
        echo $page_id->get_error_message();
    }
}
register_activation_hook(__FILE__,'final_fantasy_xiv_odooBridgeInstall');

// This function is executed when the plugin is deactivated
function final_fantasy_xiv_odooBridgeUninstall() {
    $page = get_page_by_path('odoofinalfantasyxiv');
    if (isset($page)) {
        wp_delete_post($page->ID, true);
    }
}
register_deactivation_hook( __FILE__, 'final_fantasy_xiv_odooBridgeUninstall' );


function final_fantasy_xiv_add_plugins_scripts() {


    if (is_page('odoofinalfantasyxiv') || is_admin()) {
        wp_enqueue_style( 'styleodoo', plugin_dir_url(__FILE__) . 'assets/css/odoostyle.css', array(), null, 'all' );


        wp_enqueue_script( 'scriptodoo', plugin_dir_url(__FILE__) . 'assets/js/odooscript.js', array(), null, true ); 
    }
}
add_action( 'wp_enqueue_scripts', 'final_fantasy_xiv_add_plugins_scripts' );
add_action( 'admin_enqueue_scripts', 'final_fantasy_xiv_add_plugins_scripts' );


add_action( 'plugins_loaded', 'final_fantasy_xiv_loadOdooBridge' );

function final_fantasy_xiv_loadOdooBridge() {
    require_once('back.php');
    require_once('front.php');
}



