<?php

if (!defined('ABSPATH')) {
    exit; // Security.
}

class Color_Manager
{
    public function init()
    {
        add_action('customize_register', [$this, 'add_color_controls']);
    }

    private function get_default_colors()
    {
        return [
            'primary' => '#F1F5F9',
            'secondary' => '#F1F5F9',
            'background' => '#f8fafc',
            'text-primary' => '#B1B9C4',
        ];
    }

    public function add_color_controls($wp_customize)
    {
        $wp_customize->add_section(
            'theme_colors',
            [
                'title' => __('Theme Colors', 'pragmasocial'),
                'priority' => 30,
            ]
        );

        foreach ($this->get_default_colors() as $key => $default) {
            $wp_customize->add_setting(
                "theme_color_{$key}",
                [
                    'default' => $default,
                    'sanitize_callback' => 'sanitize_hex_color',
                ]
            );

            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    "theme_color_{$key}",
                    [
                        'label' => ucfirst($key) . ' ' . __('Color', 'pragmasocial'),
                        'section' => 'theme_colors',
                        'settings' => "theme_color_{$key}",
                    ]
                )
            );
        }
    }
}