<?php
// Buscar os posts do custom post type 'service'
$services = get_posts([
    'post_type' => 'service',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
]);

get_header();
?>
<main class="bg-[<?= get_theme_mod('theme_color_background-alt', '#F8FAFC'); ?>] min-h-screen">
    <!-- Slider -->
    <section class="hero-slider">
        <?php echo do_shortcode(get_theme_mod('theme_shortcode_slider')); ?>
    </section>
    <?php if (is_active_sidebar('services-section')): ?>
        <section class="container mx-auto flex justify-center text-center pt-20">
            <?php dynamic_sidebar('services-section'); ?>
        </section>
    <?php endif; ?>
    <div class="container mx-auto">
        <div class="grid grid-cols-3 grid-rows-2 gap-6 pt-10">
            <?php if ($services): ?>
                <?php foreach ($services as $service): ?>
                    <?php
                    // Obter os meta campos personalizados
                    $icon_url = get_post_meta($service->ID, '_service_icon', true);
                    $bg_color = get_post_meta($service->ID, '_service_icon_bg_color', true) ?: '#3B82F6';
                    ?>
                    <div class="bg-white p-6 rounded-lg shadow-md gap-4">
                        <div>
                            <?php if ($icon_url): ?>
                                <img class="p-3 rounded-lg" style="background-color: <?= esc_attr($bg_color); ?>"
                                    src="<?= esc_url($icon_url); ?>" alt="<?= esc_attr($service->post_title); ?>">
                            <?php else: ?>
                                <!-- Placeholder caso não tenha ícone -->
                                <div class="p-3 rounded-lg bg-gray-300 w-12 h-12 flex items-center justify-center">
                                    <span class="text-gray-600">?</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-2 pt-2"><?= esc_html($service->post_title); ?></h3>
                            <p class="text-gray-600">
                                <?= esc_html($service->post_excerpt ?: wp_trim_words($service->post_content, 20)); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">Nenhum serviço encontrado.</p>
                    <p class="text-gray-400 text-sm mt-2">Adicione alguns serviços no painel administrativo.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php
wp_reset_postdata();
get_footer();
?>