<?php
$css_url = get_template_directory_uri() . '/src/output.css';
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo esc_url($css_url); ?>">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="bg-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>]">
        <div class="hidden md:block bg-[<?= get_theme_mod('theme_color_secondary', '#F1F5F9'); ?>]">
            <div
                class="container flex justify-between pt-2 pb-2 mx-auto text-[<?= get_theme_mod('theme_color_text-primary', '#2d3748'); ?>]">
                <div>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'container' => 'nav',
                        'container_class' => 'header-menu-class',
                        'menu_class' => 'flex gap-4 text-sm',
                    ]);
                    ?>
                </div>
                <div
                    class="flex items-center text-sm text-[<?= get_theme_mod('theme_color_text-primary', '#2d3748'); ?>]">
                    <?= get_theme_mod('contact_phone', ''); ?> |
                    <?= get_theme_mod('contact_email', ''); ?>
                </div>
            </div>
        </div>

        <div class="container mx-auto pt-5 pb-5 flex flex-col lg:flex-row justify-between items-center">
            <div>
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="text-2xl font-bold"><?php bloginfo('name'); ?></h1>
                    <?php
                }
                ?>
            </div>

            <div class="text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'flex flex-col sm:flex-row flex-wrap justify-center sm:justify-start sm:gap-4 text-base gap-4 text-base',
                ]);
                ?>
            </div>

            <div>
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>