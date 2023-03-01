<?php
$meta = get_post_meta($post->ID);
$link_text = get_post_meta($post->ID, 'abc_slider_link_text', true);
$link_url = get_post_meta($post->ID, 'abc_slider_link_url', true);
$link_url_color = get_post_meta($post->ID, 'abc_slider_color_link', true);
$link_text_color = get_post_meta($post->ID, 'abc_slider_color_text', true);
$btn_color = get_post_meta($post->ID, 'abc_slider_color_btn', true);
$description_color = get_post_meta($post->ID, 'abc_slider_color_description', true)
//var_dump( $link_text, $link_url );
?>
<table class="form-table abc-slider-metabox">
    <input type="hidden" name="abc_slider_nonce" value="<?php echo wp_create_nonce("abc_slider_nonce"); ?>">
    <tr>
        <th>
            <label for="abc_slider_link_text"><?php esc_html_e('Link Text', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="text" name="abc_slider_link_text" id="abc_slider_link_text" class="regular-text link-text" value="<?php echo (isset($link_text)) ? esc_html($link_text) : ''; ?>" required>
        </td>
    </tr>
    <tr>
        <th>
            <label for="abc_slider_color_text"><?php esc_html_e('Color text', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="color" name="abc_slider_color_text" id="abc_slider_color_text" class="" value="<?php echo (isset($link_text_color)) ? esc_url($link_text_color) : ''; ?>">
        </td>
    </tr>
    <tr>
        <th>
            <label for="abc_slider_color_description"><?php esc_html_e('Color description', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="color" name="abc_slider_color_description" id="abc_slider_color_description" class="" value="<?php echo (isset($description_color)) ? esc_url($description_color) : ''; ?>">
        </td>
    </tr>
    <tr>
        <th>
            <label for="abc_slider_link_url"><?php esc_html_e('Link URL', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="url" name="abc_slider_link_url" id="abc_slider_link_url" class="regular-text link-url" value="<?php echo (isset($link_url)) ? esc_url($link_url) : ''; ?>" required>
        </td>
    </tr>    
    <tr>
        <th>
            <label for="abc_slider_color_link"><?php esc_html_e('Color url', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="color" name="abc_slider_color_link" id="abc_slider_color_link" class="" value="<?php echo (isset($link_url_color)) ? esc_url($link_url_color) : ''; ?>">
        </td>
    </tr>
    <tr>
        <th>
            <label for="abc_slider_color_btn"><?php esc_html_e('Color btn', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="color" name="abc_slider_color_btn" id="abc_slider_color_btn" class="" value="<?php echo (isset($btn_color)) ? esc_url($btn_color) : ''; ?>">
        </td>
    </tr>
    <tr>
        <th>
            <label for="abc_slider_link_image"><?php esc_html_e('Slide ID', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="url" disabled name="abc_slider_link_image" id="abc_slider_link_image" class="" required value=" <?php the_ID(); ?> ">
        </td>
    </tr>
</table>