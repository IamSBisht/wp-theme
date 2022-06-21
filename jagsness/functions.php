<?php

if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'jagsness_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jagsness_theme_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
        add_theme_support('post-thumbnails');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// Logo support
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => false, 
        );

        add_theme_support( 'custom-logo', $defaults );

        /**
         * Enqueue scripts and styles.
         */

        function jagsness_scripts() {
            wp_enqueue_style( 'jagsness-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'jagsness-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jagsness-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'jagsness-owl-style', get_template_directory_uri() . '/assets/css/owl/owl-carousel-v2..3.4.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jagsness-slick-style', get_template_directory_uri() . '/assets/css/slick/slick-1.8.1.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jagsness-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'jagsness-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jagsness-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'jagsness-owl-script', get_template_directory_uri() . '/assets/js/owl/owl-carousel-v2.3.4.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jagsness-slick-script', get_template_directory_uri() . '/assets/js/slick/slick-1.8.1.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jagsness-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );


        //	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        //		wp_enqueue_script( 'comment-reply' );
        //	}
        }
        add_action( 'wp_enqueue_scripts', 'jagsness_scripts' );
	}
endif;
add_action( 'after_setup_theme', 'jagsness_theme_setup' );
