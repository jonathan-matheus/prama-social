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
<main class="min-h-screen">
    <!-- Slider -->
    <section class="hero-slider">
        <?php echo do_shortcode(get_theme_mod('theme_shortcode_slider')); ?>
    </section>
    <?php if (is_active_sidebar('services-section')): ?>
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center text-center pt-20">
            <?php dynamic_sidebar('services-section'); ?>
        </section>
    <?php endif; ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 pt-10">
            <?php if ($services): ?>
                <?php foreach ($services as $service): ?>
                    <?php
                    // Obter os meta campos personalizados
                    $icon_url = get_post_meta($service->ID, '_service_icon', true);
                    $bg_color = get_post_meta($service->ID, '_service_icon_bg_color', true) ?: '#3B82F6';
                    $service_link = get_post_meta($service->ID, '_service_link', true);
                    $service_url = $service_link ?: get_permalink($service->ID);
                    ?>
                    <div class="bg-white p-6 rounded-lg shadow-md gap-4 h-full flex flex-col">
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
                            <h3 class="font-semibold text-lg mb-2 pt-2"><a href="<?= esc_url($service_url); ?>"
                                    class="hover:underline"><?= esc_html($service->post_title); ?></a></h3>
                            <p class="text-gray-600">
                                <?= esc_html($service->post_excerpt ?: wp_trim_words($service->post_content, 20)); ?>
                            </p>
                            <div class="mt-3">
                                <a href="<?= esc_url($service_url); ?>"
                                    class="text-blue-600 font-medium hover:underline text-sm">Saiba mais</a>
                            </div>
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
        <section class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center text-center pt-20">
            <?php dynamic_sidebar('news-updates'); ?>
        </section>
    <?php endif; ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-10">
        <div class="text-center">
            <h1
                class="text-3xl sm:text-4xl lg:text-5xl font-bold text-[<?= get_theme_mod('theme_color_text-primary', '#2d3748'); ?>] mb-4">
                Notícias e Atualizações
            </h1>
            <div
                class="w-24 h-1 bg-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>] mx-auto mt-4 rounded-full">
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-10">
        <?php if ($news_updates):
            foreach ($news_updates as $post):
                $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'medium');
                $permalink = get_permalink($post->ID);
                $title = 'CRESS-BA promove capacitação sobre ética profissional para assistentes sociais';
                $excerpt = get_the_excerpt($post->ID);
                $date = get_the_date('d/m/Y', $post->ID);
                ?>
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition flex flex-col h-full relative">
                    <div class="relative">
                        <?php if ($thumbnail_url): ?>
                            <img src="<?= esc_url($thumbnail_url); ?>" alt="Foto de profissional"
                                class="w-full h-48 object-cover rounded-t-xl" />
                        <?php endif; ?>
                    </div>
                    <div class="p-4 flex-1">
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

    <?php if ($news_updates): ?>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center pt-10 pb-10">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
                class="inline-flex items-center px-6 py-3 bg-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity shadow-md hover:shadow-lg">
                Ver mais notícias
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    <?php endif; ?>

    <!-- Seção de Agenda -->
    <?php if (get_theme_mod('theme_shortcode_agenda')): ?>
        <section class="mt-20 pt-20 pb-20 bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-10">
                    <h2
                        class="text-3xl sm:text-4xl lg:text-5xl font-bold text-[<?= get_theme_mod('theme_color_text-primary', '#2d3748'); ?>] mb-4">
                        Agenda de Eventos
                    </h2>
                    <div
                        class="w-24 h-1 bg-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>] mx-auto mt-4 rounded-full">
                    </div>
                </div>
                <div class="mt-10">
                    <?php echo do_shortcode(get_theme_mod('theme_shortcode_agenda')); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php
get_footer();
?>