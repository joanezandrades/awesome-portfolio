<?php
/**
 * Awesome Portfolio functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if( ! function_exists( 'awesome_setup' ) ) :
    /**
    * Define os padrões do tema e registra o suporte para vários recursos do wordpress.
    * 
    */
    add_action( 'after_setup_theme', 'awesome_setup' );
    function awesome_setup() {

        $themeName = 'Awesome Portfólio';
        $themeVersion = '1.0.0';

        /**
        * Registrando o menu
        */
        $arrayMenu = array(
            'primary'   => esc_html__( 'awp-primary', 'awp' )
        );

        register_nav_menus( $arrayMenu );

        /**
        * Add suporte para logo custom
        */ 
        $logoCustom = array(
            'default-image'     => '', //Setar imagem padrão
            'width'             => 150,
            'height'            => 80,
            'flex-height'       => true,
            'flex-width'        => true,
            'uploads'           => true,
            'ramdon-default'    => false,
            'header-text'       => false
        );
        add_theme_support( 'custom-logo', $logoCustom );

        /**
        * Add suporte HTML5
        */ 

        $html5Support = array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        );
        add_theme_support( 'html5', $html5Support );

        /**
        * Add suporte para os tipos de post
        */
        $supportTypes = array(
            'post',
            'page',
            'attachment',
            'revision',
            'nav_menu'
        );
        add_theme_support( 'post-formats', $supportTypes );

        /**
         * Add suporte thumbnail
        */
        add_theme_support( 'post-thumbnails' );

        /** 
         * Add custom background
         * */ 
        $customBackground = array(
            'default_color'         => '',
            'default-image'         => '',
            'default-repeat'        => '',
            'default-position-x'    => '',
            'default-position-y'    => '',
            'default-size'          => '',
            'default-attachment'    => '',
            'wp-head-callback'      => '_custom_background_cb',
            'admin-head-callback'   => '',
            'admin-preview-callback'=> '',
        );
        add_theme_support( 'custom-background', $customBackground );

        /**
        * Add image-size
        * - awp = abrev. Awesome Portfólio
        */
        // add_image_size( 'awp-cover', 'auto', 590, true );
        add_image_size( 'awp-portrait-big', 960, 480, true );
        add_image_size( 'awp-thumb-loja', 520, 330, true );
        add_image_size( 'awp-portrait-small', 580, 480, true );
        add_image_size( 'awp-pic-big', 450, 225, true );
        add_image_size( 'awp-pic-portfolio', 520, 560, true );
        add_image_size( 'awp-pic-small', 325, 220, true );
        add_image_size( 'awp-icon', 128, 128, true );

        /**
         * Add SVG upload support
        */
        function cc_mime_types($mimes){

            $mimes['svg'] = 'img/svg+xml';
            return $mimes;
        }
        add_filter( 'upload_mimes', 'cc_mime_types');

        /**
        * Hide admin bar
        */ 
        show_admin_bar( false );

        /**
         * Disable default css style for gallery
        */
        add_filter( 'use_default_gallery_style', '__return_false' );
        
        /***
         * Load template Tags
         */
        require_once('inc/tpl_tags.php');

        /***
         * Load theme new types and functions
         */
        require_once('inc/tpl_functions.php');
}
endif;
?>