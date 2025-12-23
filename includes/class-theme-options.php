<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Theme_Options
{
    public function init()
    {
        add_action('customize_register', [$this, 'add_theme_options']);
    }

    public function add_theme_options($wp_customize)
    {
        $wp_customize->add_section('theme_options', [
            'title' => __('Theme Options', 'pragmasocial'),
            'priority' => 30,
        ]);

        // Lista de campos de texto para redes sociais e slider
        $fields = [
            'theme_shortcode_slider' => __('Slider Shortcode', 'pragmasocial'),
            'theme_shortcode_agenda' => __('Agenda Shortcode', 'pragmasocial'),
            'theme_service' => __('Service', 'pragmasocial'),
            'theme_email_contact' => __('Contact Email', 'pragmasocial'),
            'theme_phone_contact' => __('Contact Phone', 'pragmasocial'),
            'theme_address_contact' => __('Contact Address', 'pragmasocial'),
            'theme_social_facebook' => __('Facebook URL', 'pragmasocial'),
            'theme_social_instagram' => __('Instagram URL', 'pragmasocial'),
            'theme_social_twitter' => __('Twitter/X URL', 'pragmasocial'),
            'theme_social_linkedin' => __('LinkedIn URL', 'pragmasocial'),
            // Adicione mais campos conforme necessário
        ];

        foreach ($fields as $key => $label) {
            $wp_customize->add_setting($key, [
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ]);

            $wp_customize->add_control($key, [
                'label' => $label,
                'section' => 'theme_options',
                'type' => 'text',
            ]);
        }
    }
}