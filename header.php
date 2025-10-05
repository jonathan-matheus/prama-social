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

<body class="<?php body_class(); ?>">
    <div class="bg-[<?= get_theme_mod('theme_color_secondary', '#F1F5F9'); ?>]">
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
            <div class="flex items-center text-sm text-[<?= get_theme_mod('theme_color_text-primary', '#2d3748'); ?>]">
                <?= get_theme_mod('contact_phone', ''); ?> |
                <?= get_theme_mod('contact_email', ''); ?>
            </div>
        </div>
    </div>