<?php

if (!class_exists('ABC_Slider_Shortcode')) {
    class ABC_Slider_Shortcode
    {
        public function __construct()
        {
            add_shortcode('abc_slider', array($this, 'add_shortcode'));
        }

        public function add_shortcode($atts = array(), $content = null, $tag = '')
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

            if (!empty($id)) {
                $id = array_map('absint', explode(',', $id));
            }

            ob_start();
            require(ABC_SLIDER_PATH . 'views/abc-slider_shortcode.php');
            wp_enqueue_script('abc-slider-main-jq');
            wp_enqueue_style('abc-slider-main-css');
            wp_enqueue_style('abc-slider-style-css');
            abc_slider_options();
            return ob_get_clean();
        }
    }
}
