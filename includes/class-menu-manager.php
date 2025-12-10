<?php

if (!defined('ABSPATH')) {
    exit; // Security.
}

class Menu_Manager
{
    public function init()
    {
        add_action('after_setup_theme', [$this, 'register_menus']);
        add_filter('nav_menu_css_class', [$this, 'add_menu_item_classes'], 10, 4);
    }

    public function register_menus()
    {
        register_nav_menus([
            'header-menu' => __('Header Menu', 'pragmasocial'),
            'primary-menu' => __('Primary Menu', 'pragmasocial'),
            'footer-menu' => __('Footer Menu', 'pragmasocial'),
        ]);
    }

    /**
     * Adiciona classes CSS personalizadas aos itens de menu
     */
    public function add_menu_item_classes($classes, $item, $args, $depth)
    {
        // Adiciona classe para itens que têm submenus
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'menu-item-has-children';
        }

        // Adiciona classe baseada na profundidade
        $classes[] = 'menu-depth-' . $depth;

        return $classes;
    }
}