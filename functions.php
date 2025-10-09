<?php

require_once get_template_directory() . '/includes/class-theme-setup.php';
require_once get_template_directory() . '/includes/class-menu-manager.php';
require_once get_template_directory() . '/includes/class-color-manager.php';
require_once get_template_directory() . '/includes/class-contact-manager.php';
require_once get_template_directory() . '/includes/class-theme-options.php';
require_once get_template_directory() . '/includes/class-theme-widgets.php';
require_once get_template_directory() . '/includes/class-custom-post.php';

function theme_setup()
{
    $theme_setup = new Theme_Setup();
    $theme_setup->init();

    $theme_options = new Theme_Options();
    $theme_options->init();

    $menu_manager = new Menu_Manager();
    $menu_manager->init();

    $color_manager = new Color_Manager();
    $color_manager->init();

    $contact_manager = new Contact_Manager();
    $contact_manager->init();

    $theme_widgets = new Theme_Widgets();
    $theme_widgets->init();

    $custom_post = new Custom_Post();
    $custom_post->init();
}

theme_setup();

// Enfileira CSS básico apenas para páginas e posts (conteúdo dentro de <article>)
add_action('wp_enqueue_scripts', function () {
    if (is_page() || is_single()) {
        wp_enqueue_style(
            'pragmasocial-article',
            get_template_directory_uri() . '/assets/css/article.css',
            [],
            filemtime(get_template_directory() . '/assets/css/article.css')
        );
    }
});