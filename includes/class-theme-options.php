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

        $wp_customize->add_setting('theme_shortcode_slider', [
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ]);

        $wp_customize->add_control('theme_shortcode_slider', [
            'label' => __('Slider Shortcode', 'pragmasocial'),
            'section' => 'theme_options',
            'type' => 'text',
        ]);
    }
}