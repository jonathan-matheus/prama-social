<?php

if (!defined('ABSPATH')) {
    exit; // Security.
}

class Contact_Manager
{
    public function init()
    {
        add_action('customize_register', [$this, 'add_contact_controls']);
    }

    public function add_contact_controls($wp_customize)
    {
        $wp_customize->add_section(
            'contact_info',
            [
                'title' => __('Contact Information', 'pragmasocial'),
                'priority' => 30,
            ]
        );

        $contacts = [
            'email' => __('Email', 'pragmasocial'),
            'phone' => __('Phone', 'pragmasocial'),
        ];

        foreach ($contacts as $key => $label) {
            $wp_customize->add_setting(
                "contact_{$key}",
                [
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                ]
            );

            $wp_customize->add_control(
                "contact_{$key}_control",
                [
                    'label' => $label,
                    'section' => 'contact_info',
                    'settings' => "contact_{$key}",
                    'type' => 'text',
                ]
            );
        }
    }
}