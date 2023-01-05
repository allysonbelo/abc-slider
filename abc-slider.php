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
if(! defined('ABSPATH') ){
    die('Você está tentando acessar os arquivos do plugin!');
    exit;
}

//Verifica se não existe uma classe chamada ABC_Slider, caso não exista, é criada uma classe com contrutor
if(! class_exists( 'ABC_Slider' )){
    class ABC_Slider{
        function __construct()
        {
            
        }
    }
}

//Verifica se existe uma classe chamada ABC_Slider, caso exista é criado uma variável instanciada
if(class_exists('ABC_Slider')){
    $abc_slider = new ABC_Slider();
}
