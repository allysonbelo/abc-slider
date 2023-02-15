<?php

/*
* Plugin Name: ABC Slider
* Plugin URI: https://www.wordpress.org/abc-slider
* Description: My first plugin!!!
* Require at least: 5.6
* Author: Allyson Belo Cavalcante
* Author URI: https://www.linkedin.com/in/allysoncavalcante/
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: abc-slider
* Domain Path: /languages
*/

/*
ABC Slider is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

ABC Slider is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with ABC Slider. If not, see {URI to Plugin License}.
*/

//impedi que algum usuario tente acessar os arquivos do plugin pela url
if (!defined('ABSPATH')) {
    die('Você está tentando acessar os arquivos do plugin!');
    exit;
}

//Verifica se não existe uma classe chamada ABC_Slider, caso não exista, é criada uma classe com contrutor
if (!class_exists('ABC_Slider')) {
    class ABC_Slider
    {
        function __construct()
        {
            $this->define_constants();

            add_action('admin_menu', array($this, 'add_menu'));
            
            require_once(ABC_SLIDER_PATH . 'post-types/class.abc-slider-cpt.php');
            $ABC_Slider_Post_Type = new ABC_Slider_Post_Type();

            require_once(ABC_SLIDER_PATH . 'class.abc-slider-settings.php');
            $ABC_Slider_Settings = new ABC_Slider_Settings();

            require_once(ABC_SLIDER_PATH . 'shortcodes/class.abc-slider-shortcode.php');
            $ABC_Slider_Shortcode = new ABC_Slider_Shortcode();

            add_action( 'wp_enqueue_scripts', array($this, 'register_scripts'), 999 );
            add_action( 'admin_enqueue_scripts', array($this, 'register_admin_scripts') );
        }

        public function define_constants()
        {
            define('ABC_SLIDER_PATH', plugin_dir_path(__FILE__));
            define('ABC_SLIDER_URL', plugin_dir_url(__FILE__));
            define('ABC_SLIDER_VERSION', '1.0.0');
        }

        public static function activate()
        {
            update_option('rewrite_rules', '');
        }

        public static function deactivate()
        {
            flush_rewrite_rules();
            unregister_post_type('abc-slider');
        }

        public static function uninstall()
        {
        }

        public function add_menu(){
            add_menu_page( 
                'ABC Slider Options',
                'ABC Slider',
                'manage_options',
                'abc_slider_admin',
                array($this, 'abc_slider_settings_page'),
                'dashicons-images-alt2',
            );

            add_submenu_page(
                'abc_slider_admin',
                'Manage Slides',
                'Manage Slides',
                'manage_options',
                'edit.php?post_type=abc-slider',
                null,
                null
            );

            add_submenu_page(
                'abc_slider_admin',
                'Add New Slide',
                'Add New Slide',
                'manage_options',
                'post-new.php?post_type=abc-slider',
                null,
                null
            );
        }

        public function abc_slider_settings_page(){
            if(! current_user_can('manage_options')){
                return;
            }
            if(isset($_GET['settings-updated'])){
                add_settings_error('abc_slider_options', 'abc_slider_message', 'Settings Saves', 'success' );
            }
            settings_errors('abc_slider_options');

            require(ABC_SLIDER_PATH . 'views/settings-page.php');

        }

        public function register_scripts(){
            wp_register_script('abc-slider-main-jq', ABC_SLIDER_URL . '/vendor/flexslider/jquery.flexslider-min.js', array('jquery'), ABC_SLIDER_VERSION, true);
            wp_register_script('abc-slider-options-js', ABC_SLIDER_URL . '/vendor/flexslider/flexslider.js', array('jquery'), ABC_SLIDER_VERSION, true);
            wp_register_style('abc-slider-main-css', ABC_SLIDER_URL . '/vendor/flexslider/flexslider.css', array(), ABC_SLIDER_VERSION, 'all');
            wp_register_style('abc-slider-style-css', ABC_SLIDER_URL . '/assets/css/frontend.css', array(), ABC_SLIDER_VERSION, 'all');
        }

        public function register_admin_scripts(){
            global $typenow;
            if($typenow == 'abc-slider'){
                wp_enqueue_style('abc-slider-admin', ABC_SLIDER_URL . '/assets/css/admin.css');
            }
        }
    }
}

//Verifica se existe uma classe chamada ABC_Slider, caso exista é criado uma variável instanciada
if (class_exists('ABC_Slider')) {
    register_activation_hook(__FILE__, array('ABC_Slider', 'activate'));
    register_deactivation_hook(__FILE__, array('ABC_Slider', 'deactivate'));
    register_uninstall_hook(__FILE__, array('ABC_Slider', 'uninstall'));
    $abc_slider = new ABC_Slider();
}
