<?php
/**
 * Register Meta boxes
 * 
 * @package Aquila
 */

 namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct() {

        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        
        /**
         * Actions.
         */
        add_action('add_meta_boxes', [ $this, 'add_custom_meta_box' ]);
    }

    public function add_custom_meta_box() {
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title',           // Unique ID
                __( 'Hide page title', 'aquila' ),  // Box title
                [ $this, 'custom_meta_box_html' ],  // content callback, must be of type callable
                $screen,                   // Post type
                'side' // context
            );
        }
    }

    public function add_custom_meta_box_html( $post ) {

        $value = get_post_meta( $post->ID, '_hide_page_title', true );

        ?>
        <label for="aquila-field"><?php esc_html_e( 'Hide the page title', 'aquila' ); ?></label>
        <select name="aquila_field" id="aquila-field" class="postbox">
            <option value=""></option><?php esc_html_e( 'Select', 'aquila' ); ?></option>
            <option value="yes" <?php selected( $value, 'yes'); ?>>
                <?php esc_html_e( 'yes', 'aquila' ); ?>
            </option>
            <option value="no"<?php selected( $value, 'no'); ?>>
                <?php esc_html_e( 'No', 'aquila' ); ?>>
            </option>
        </select>
        <?php

    }

}