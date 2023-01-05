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
        }

        public static function uninstall()
        {
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
