<?php

if(! function_exists('abc_slider_get_placeholder_image')){
    function abc_slider_get_placeholder_image(){
        return "<img src='" . ABC_SLIDER_URL . "assets/images/default.jpg' class='img-fluid wp-post-image' >";
    }
}

if(! function_exists('abc_slider_options')){
    function abc_slider_options(){
        $show_bullets = isset(ABC_Slider_Settings::$options['abc_slider_bullets']) && ABC_Slider_Settings::$options['abc_slider_bullets'] == 1 ? true : false;

        wp_register_script('abc-slider-options-js', ABC_SLIDER_URL . '/vendor/flexslider/flexslider.js', array('jquery'), ABC_SLIDER_VERSION, true);
        wp_localize_script('abc-slider-options-js', 'SLIDER_OPTIONS', array(
            'controlNav' => $show_bullets
        ));
    }
}