<?php
$meta = get_post_meta($post->ID);
$link_text = get_post_meta($post->ID, 'abc_slider_link_text', true);
$link_url = get_post_meta($post->ID, 'abc_slider_link_url', true);
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
            <label for="abc_slider_link_url"><?php esc_html_e('Link URL', 'abc-slider'); ?></label>
        </th>
        <td>
            <input type="url" name="abc_slider_link_url" id="abc_slider_link_url" class="regular-text link-url" value="<?php echo (isset($link_url)) ? esc_url($link_url) : ''; ?>" required>
        </td>
    </tr>
    <tr>
        <th>
            <label for="abc_slider_link_image"><?php esc_html_e('Slide ID', 'abc-slider'); ?></label>
        </th>
        <td>
            <input 
                type="url" 
                disabled
                name="abc_slider_link_image" 
                id="abc_slider_link_image" 
                class="" 
                required
                value=" <?php the_ID(); ?> " 
            >
        </td>
    </tr>
</table>