<?php
get_header();
?>
<main class="bg-white min-h-screen py-12">
    <div class="container mx-auto max-w-2xl px-4">
        <header class="mb-8">
            <h1 class="font-bold text-2xl text-gray-900 leading-tight">
                <?php printf(__('Resultados da busca por: %s', 'pragmasocial'), '<span class="text-blue-600">' . esc_html(get_search_query()) . '</span>'); ?>
            </h1>
        </header>

        <?php if (have_posts()): ?>
            <section>
                <?php while (have_posts()):
                    the_post(); ?>
                    <article class="border-b border-gray-200 pb-6 mb-6">
                        <h2 class="text-xl font-semibold text-gray-900">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="hover:underline"><?php the_title(); ?></a>
                        </h2>
                        <div class="text-xs text-gray-500 flex items-center gap-1 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <?php echo esc_html(get_the_date('d/m/Y')); ?>
                        </div>
                        <p class="text-sm text-gray-700 mt-2">
                            <?php echo esc_html(get_the_excerpt()); ?>
                        </p>
                        <div class="mt-3">
                            <a href="<?php echo esc_url(get_permalink()); ?>"
                                class="text-blue-600 font-medium hover:underline text-sm"><?php _e('Ler mais', 'pragmasocial'); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>

                <nav class="mt-8">
                    <?php the_posts_pagination([
                        'mid_size' => 2,
                        'prev_text' => __('« Anteriores', 'pragmasocial'),
                        'next_text' => __('Próximos »', 'pragmasocial'),
                    ]); ?>
                </nav>
            </section>
        <?php else: ?>
            <section class="text-gray-700">
                <p class="text-base">
                    <?php printf(__('Nenhum resultado encontrado para "%s".', 'pragmasocial'), esc_html(get_search_query())); ?>
                </p>
                <p class="text-sm text-gray-500 mt-2">
                    <?php _e('Tente outro termo de busca ou volte para a página inicial.', 'pragmasocial'); ?>
                </p>
            </section>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
?>