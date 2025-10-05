<?php

if (!defined('ABSPATH')) {
    exit; // Security.
}

class Menu_Manager
{
    public function init()
    {
        add_action('after_setup_theme', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus([
            'header-menu' => __('Header Menu', 'pragmasocial'),
        ]);
    }
}