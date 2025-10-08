<?php

if (!defined('ABSPATH')) {
    exit; // Security.
}

class Custom_Post
{
    public function init()
    {
        add_action('init', [$this, 'register_service_post_type']);
        add_action('add_meta_boxes', [$this, 'add_service_meta_boxes']);
        add_action('save_post', [$this, 'save_service_meta']);
    }

    public function register_service_post_type()
    {
        $labels = [
            'name' => __('Services', 'pragmasocial'),
            'singular_name' => __('Service', 'pragmasocial'),
            'add_new' => __('Add New Service', 'pragmasocial'),
            'add_new_item' => __('Add New Service', 'pragmasocial'),
            'edit_item' => __('Edit Service', 'pragmasocial'),
            'new_item' => __('New Service', 'pragmasocial'),
            'view_item' => __('View Service', 'pragmasocial'),
            'search_items' => __('Search Services', 'pragmasocial'),
            'not_found' => __('No services found', 'pragmasocial'),
            'not_found_in_trash' => __('No services found in Trash', 'pragmasocial'),
            'all_items' => __('All Services', 'pragmasocial'),
            'menu_name' => __('Services', 'pragmasocial'),
            'name_admin_bar' => __('Service', 'pragmasocial'),
        ];

        $args = [
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'rewrite' => ['slug' => 'services'],
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-hammer',
        ];

        register_post_type('service', $args);
    }

    public function add_service_meta_boxes()
    {
        add_meta_box(
            'service_icon_settings',
            __('Icon Settings', 'pragmasocial'),
            [$this, 'service_icon_meta_box_callback'],
            'service',
            'normal',
            'high'
        );
    }

    public function service_icon_meta_box_callback($post)
    {
        wp_nonce_field('save_service_meta', 'service_meta_nonce');

        $icon = get_post_meta($post->ID, '_service_icon', true);
        $bg_color = get_post_meta($post->ID, '_service_icon_bg_color', true);

        ?>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="service_icon"><?php _e('Icon URL', 'pragmasocial'); ?></label>
                </th>
                <td>
                    <input type="url" id="service_icon" name="service_icon" value="<?php echo esc_attr($icon); ?>"
                        class="regular-text" placeholder="https://example.com/icon.svg" />
                    <p class="description">
                        <?php _e('Enter the URL of the icon image (SVG, PNG, JPG)', 'pragmasocial'); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="service_icon_bg_color"><?php _e('Icon Background Color', 'pragmasocial'); ?></label>
                </th>
                <td>
                    <input type="color" id="service_icon_bg_color" name="service_icon_bg_color"
                        value="<?php echo esc_attr($bg_color ?: '#007cba'); ?>" />
                    <p class="description"><?php _e('Choose the background color for the icon', 'pragmasocial'); ?></p>
                </td>
            </tr>
        </table>
        <?php
    }

    public function save_service_meta($post_id)
    {
        // Verify nonce
        if (!isset($_POST['service_meta_nonce']) || !wp_verify_nonce($_POST['service_meta_nonce'], 'save_service_meta')) {
            return;
        }

        // Check if user has permission to edit
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Avoid autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check if it's the right post type
        if (get_post_type($post_id) !== 'service') {
            return;
        }

        // Save icon field
        if (isset($_POST['service_icon'])) {
            update_post_meta($post_id, '_service_icon', esc_url_raw($_POST['service_icon']));
        }

        // Save background color field
        if (isset($_POST['service_icon_bg_color'])) {
            update_post_meta($post_id, '_service_icon_bg_color', sanitize_hex_color($_POST['service_icon_bg_color']));
        }
    }
}