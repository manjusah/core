<?php
/**
 * Meta Box Options
 *
 * Meta Box Options for pages
 *
 * Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_head', 'cyberchimps_load_meta_boxes_scripts' );
function cyberchimps_load_meta_boxes_scripts() {
    global $post_type;

    // Set library path.
    $lib_path = get_template_directory_uri() . "/cyberchimps/lib/";

    if( $post_type == 'page' ) :
        wp_enqueue_style( 'meta-boxes-css', $lib_path . 'css/metabox-tabs.css' );

        // Enqueue only if it is not done before
        if( !wp_script_is( 'jf-metabox-tabs' ) ) :
            wp_enqueue_script( 'meta-boxes-js', $lib_path . 'js/metabox-tabs.js', array( 'jquery' ) );
        endif;
    endif;
}

if( is_admin() ) {

    $image_path = get_template_directory_uri() . '/cyberchimps/lib/images/';

    $fields = array( array(
        'type'    => 'image_select',
        'id'      => 'cyberchimps_page_sidebar',
        'class'   => '',
        'name'    => __( 'Select Page Layout', 'cyberchimps_core' ),
        'options' => apply_filters( 'sidebar_layout_options', array(
            'full_width'    => $image_path . '1col.png',
            'right_sidebar' => $image_path . '2cr.png'
        ) ),
        'std'     => 'right_sidebar'
    ),
        array(
            'type'  => 'checkbox',
            'id'    => 'cyberchimps_page_title_toggle',
            'class' => 'checkbox',
            'name'  => __( 'Page Title', 'cyberchimps_core' ),
            'std'   => 1
        ),
        array(
            'type'    => 'section_order',
            'id'      => 'cyberchimps_page_section_order',
            'class'   => '',
            'name'    => __( 'Page Elements', 'cyberchimps_core' ),
            'options' => apply_filters( 'cyberchimps_elements_draganddrop_page_options', array(
                'boxes'              => __( 'Boxes', 'cyberchimps_core' ),
                'page_section'       => __( 'Page', 'cyberchimps_core' ),
                'portfolio_lite'     => __( 'Portfolio Lite', 'cyberchimps_core' ),
                'slider_lite'        => __( 'Slider Lite', 'cyberchimps_core' ),
                'twitterbar_section' => __( 'Twitter Bar', 'cyberchimps_core' )
            ) ),
            'std'     => array( 'page_section' )
        )
    );
    /*
     * configure your meta box
     */
    $config = array(
        'id'             => 'cyberchimps_page_options', // meta box id, unique per meta box
        'title'          => __( 'Page Options', 'cyberchimps_elements' ), // meta box title
        'pages'          => array( 'page' ), // post types, accept custom post types as well, default is array('post'); optional
        'context'        => 'normal', // where the meta box appear: normal (default), advanced, side; optional
        'priority'       => 'high', // order of meta box: high (default), low; optional
        'fields'         => $fields, // list of meta fields (can be added by field arrays)
        'local_images'   => false, // Use local or hosted images (meta box images for add/remove)
        'use_with_theme' => true //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
    );

    /*
     * Initiate your meta box
     */
    $my_meta = new Cyberchimps_Meta_Box( $config );
}