<h3><?php echo (!empty($content)) ? esc_html($content) : esc_html(ABC_Slider_Settings::$options['abc_slider_title']); ?></h3>
<div class="abc-slider flexslider <?php echo (isset(ABC_Slider_Settings::$options['abc_slider_style'])) ? esc_attr(ABC_Slider_Settings::$options['abc_slider_style']) : 'style-1'; ?>">
    <ul class="slides">
        <?php

        $args = array(
            'post_type' => 'abc-slider',
            'post_status'   => 'publish',
            'post__in'  => $id,
            'orderby' => $orderby
        );

        $my_query = new WP_Query($args);

        if ($my_query->have_posts()) :
            while ($my_query->have_posts()) : $my_query->the_post();

                $button_text = get_post_meta(get_the_ID(), 'abc_slider_link_text', true);
                $button_url = get_post_meta(get_the_ID(), 'abc_slider_link_url', true);
                $link_text_color = get_post_meta(get_the_ID(), 'abc_slider_color_text', true);
                $link_url_color = get_post_meta(get_the_ID(), 'abc_slider_color_link', true);
                $btn_color = get_post_meta(get_the_ID(), 'abc_slider_color_btn', true);
                $description_color = get_post_meta(get_the_ID(), 'abc_slider_color_description', true)

        ?>
                <li>
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', array('class' => 'img-fluid'));
                    } else {
                        echo abc_slider_get_placeholder_image();
                    }

                    ?>
                    <div class="abcs-container">
                        <div class="slider-details-container">
                            <div class="wrapper">
                                <div class="slider-title">
                                    <h2 style="color: <?php echo (isset($link_text_color)) ? esc_url($link_text_color) : '#FFFFFF'; ?>"><?php the_title(); ?></h2> 
                                </div>
                                <div class="slider-description">
                                    <div style="color: <?php echo (isset($description_color)) ? esc_url($description_color) : '#FFFFFF'; ?>" class="subtitle"><?php the_content(); ?></div>
                                    <a style="background-color: <?php echo (isset($btn_color)) ? esc_url($btn_color) : '#FFFFFF'; ?>" class="link" href="<?php echo esc_attr($button_url); ?>"><?php echo esc_html($button_text); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </ul>
</div>