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
    <?php wp_reset_postdata(); ?>

    <?php
    $news_updates = get_posts([
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    ]);
    ?>

    <?php if (is_active_sidebar('news-updates')): ?>
        <section class="container mx-auto flex justify-center text-center pt-20">
            <?php dynamic_sidebar('news-updates'); ?>
        </section>
    <?php endif; ?>

    <div class="container mx-auto flex gap-5 pt-10">
        <?php if ($news_updates):
            foreach ($news_updates as $post):
                $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'medium');
                $permalink = get_permalink($post->ID);
                $title = 'CRESS-BA promove capacitação sobre ética profissional para assistentes sociais';
                $excerpt = get_the_excerpt($post->ID);
                $date = get_the_date('d/m/Y', $post->ID);
                ?>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition flex flex-col relative">
                    <div class="relative">
                        <?php if ($thumbnail_url): ?>
                            <img src="<?= esc_url($thumbnail_url); ?>" alt="Foto de profissional"
                                class="w-full h-48 object-cover rounded-t-xl" />
                        <?php endif; ?>
                    </div>
                    <div class="p-4">
                        <h2 class="font-semibold text-gray-800 text-base mt-3">
                            <?= esc_html($title); ?>
                        </h2>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-3">
                            <?= esc_html($excerpt); ?>
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-4 p-4 pt-3">
                        <span class="text-xs text-gray-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <?= esc_html($date); ?>
                        </span>
                        <a href="<?= esc_url($permalink); ?>" class="text-blue-600 font-medium hover:underline text-sm">Ler
                            mais</a>
                    </div>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </div>
</main>
<?php
get_footer();
?>