<?php

if (!class_exists('ABC_Slider_Shortcode')) {
    class ABC_Slider_Shortcode
    {
        public function __construct()
        {
            add_shortcode('abc_slider', array($this, 'add_shorcode'));
        }

        public function add_shorcode($atts = array(), $content = null, $tag = '')
        {
            $atts = array_change_key_case((array) $atts, CASE_LOWER);

            extract(shortcode_atts(
                array(
                    'id' => '',
                    'orderby' => 'date'
                ),
                $atts,
                $tag
            ));

            if(!empty( $id)){
                $id = array_map('absint', explode(',', $id));
            }
        }
    }
}
