<?php 
if(!class_exists('ABC_Slider_Settings')){
    class ABC_Slider_Settings{
        public static $options;

        public function __construct()
        {
            self::$options = get_option('abc_slider_options');
            add_action('admin_init', array($this, 'admin_init'));
        }

        public function admin_init(){

            register_setting('abc_slider_group', 'abc_slider_options');

            add_settings_section(
                'abc_slider_main_section',
                'How does it work?',
                null,
                'abc_slider_page1'
            );

            add_settings_section(
                'abc_slider_second_section',
                'Other Plugin Options',
                null,
                'abc_slider_page2'
            );

            add_settings_field(
                'abc_slider_shortcode',
                'Shortcode',
                array($this, 'abc_slider_shortcode_callback'),
                'abc_slider_page1',
                'abc_slider_main_section'
            ); 

            add_settings_field(
                'abc_slider_title',
                'Slider Title',
                array($this, 'abc_slider_title_callback'),
                'abc_slider_page2',
                'abc_slider_second_section'
            ); 

            add_settings_field(
                'abc_slider_bullets',
                'Dsiplay Bullets',
                array($this, 'abc_slider_bullets_callback'),
                'abc_slider_page2',
                'abc_slider_second_section'
            ); 

            add_settings_field(
                'abc_slider_style',
                'Slide Style',
                array($this, 'abc_slider_style_callback'),
                'abc_slider_page2',
                'abc_slider_second_section'
            ); 
        }

        public function abc_slider_shortcode_callback(){
            ?>
                <span>Use the shortcode [abc_slider] to display the slider in any page/post/widget</span>
            <?php 
        }

        public function abc_slider_title_callback(){
            ?>
                <input 
                type="text" 
                name="abc_slider_options[abc_slider_title]" 
                id="abc_slider_title" 
                value="<?php echo isset(self::$options['abc_slider_title']) ? esc_attr(self::$options['abc_slider_title']) : '' ?>">
            <?php
        }

        public function abc_slider_bullets_callback(){
            ?>
            <input 
            type="checkbox" 
            name="abc_slider_options[abc_slider_bullets]"
            id="abc_slider_bullets"
            value="1"
            <?php 
                if(isset(self::$options['abc_slider_bullets'])){
                    checked("1", self::$options['abc_slider_bullets'], true) ;
                }
            ?>
            >
            <?php
        }

        public function abc_slider_style_callback(){
            ?>
            <select 
                id="abc_slider_style"
                name="abc_slider_options[abc_slider_style]" >
                <option value="style-1"
                    <?php isset(self::$options['abc_slider_style']) ? selected('style-1', self::$options['abc_slider_style'], true) : ''; ?>>Style-1</option>
                <option value="style-2"
                    <?php isset(self::$options['abc_slider_style']) ? selected('style-2', self::$options['abc_slider_style'], true) : ''; ?>>Style-2</option>
            </select>
            <?php
        }
    }
}
; ?>