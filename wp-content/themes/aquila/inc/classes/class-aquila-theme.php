<?php

/**
 * Bootstraps the Theme.
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
    use Singleton;

    protected function __construct() {

        // load class.

        Assets::get_instance();
        Menus::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {
        
        /**
         * Actions.
         */
        add_action('after_setup_theme', [$this, 'setup_theme']);
    }

    /**
     * Setup theme.
     * 
     * @return void
     */

    public function setup_theme() {

        /**
         * let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> in the document head, and expect WordPress to
         * provide it for us.
         *         * 
         */
        add_theme_support( 'title-tag' );

        /**
         * custom logo.
         * 
         * @sec Adding custom logo
         * @link https://developer.wordpress.org/themes/functionslity/custom-logo/#adding-custom-logo-support-yper-theme
         */

        add_theme_support(
            'custom-logo', 
            [
                'header-text' => [
                    'site-title', 
                    'site-description'
                ],
                'height'      => 100,
                'width'      => 400,
                'flex-height' => true,
                'flex-width'  => true,
            ]
        );

        /**
         * Adds custom background panel to customizER,
         * 
         * @see Enable Custom Backgrouns
         * @link https://developer.wordpress.org/themes/funcitonslity/custom-backgrouns/#enable-custom-baclgrouns
         */

        add_theme_support(
            'custom-background', 
            [
                'default-color'  => '#ffffff',
                'default-image'  => '',
                'default-repeat' => 'no-repeat',
            ]
        );

        /**
         * Enable support for Post Thumbnails on posts and pages.
         * 
         * Adding this will allow you to select the featured image on posts and pages.
         * 
         * @link https://developer.wordpress.org/themes/functionality/featuredimages-post-thumbnails/
         */

        add_theme_support('post-thumbnails');

        /**
         * Register image sizes.
         */
        add_image_size( 'featured-thumbnail', 350, 233, true );


        // Add theme support for selective refresh for widgets.
        /**
         * WordPress 4.5 includes a new Customizer framework called selective refresh
         * 
         * Selective refresh is a hybrid preview mechanins that has the performance benefit of not having to refresh 
         */

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );

        add_editor_style();
        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'align-wide' );

        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 1240;
        }
    }
}
