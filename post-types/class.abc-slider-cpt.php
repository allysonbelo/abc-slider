<?php

if (!class_exists('ABC_Slider_Post_Type')) {
    class ABC_Slider_Post_Type
    {
        function __construct()
        {
            add_action('init',  array($this, 'create_post_type'));
            add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        }

        public function create_post_type(){
            register_post_type('abc-slider', array(
                'label' => 'Slider',
                'description' => 'Sliders',
                'labels'    => array(
                    'name' => 'Sliders',
                    'singular_name' => 'Slider'
                ),
                'public' => true,
                'supports' => array('title', 'editor', 'thumbnail'),
                'hierarchical' => false,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'show_in_admin_bar' => true,
                'show_in_nav_menus' => true,
                'can_export' => true,
                'has_archive' => false,
                'exclude_from_search' => false,
                'publicly_queryable' => true,
                'show_in_rest' => true,
                'menu_icon' => 'dashicons-images-alt2',
                // 'register_meta_box_cb' => array($this, 'add_meta_boxes')
            ));
        }

        public function add_meta_boxes(){
            add_meta_box(
                'abc_slider_meta_box',
                'Link Options',
                array($this, 'add_inner_meta_boxes' ),
                'abc-slider',
                'normal',
                'high',
            );
        }

        public function add_inner_meta_boxes( $post ){
            require_once( ABC_SLIDER_PATH . 'views/abc-slider_metabox.php');
        }
    }
}
