<?php

if (!defined('ABSPATH')) {
    exit; // Security.
}

class Theme_Setup
{
    public function init()
    {
        add_action('after_setup_theme', [$this, 'setup_theme_support']);
    }

    public function setup_theme_support()
    {
        add_theme_support('menus');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
        add_theme_support('title-tag');
    }
}