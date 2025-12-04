<?php get_header(); ?>

<main class="bg-[<?= get_theme_mod('theme_color_background-alt', '#F8FAFC'); ?>] min-h-screen py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Cabeçalho da Página -->
        <div class="mb-10">
            <h1 class="text-4xl font-bold text-[<?= get_theme_mod('theme_color_text-primary', '#2d3748'); ?>] mb-3">
                Blog
            </h1>
            <p class="text-gray-600">Acompanhe as últimas notícias e atualizações</p>
        </div>

        <?php if (have_posts()): ?>
            <!-- Grid de Posts -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()):
                    the_post(); ?>
                    <article
                        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                        <!-- Imagem de Capa -->
                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>" class="block overflow-hidden">
                                <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title_attribute(); ?>"
                                    class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300" />
                            </a>
                        <?php else: ?>
                            <a href="<?php the_permalink(); ?>" class="block">
                                <div
                                    class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white opacity-50" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- Conteúdo do Card -->
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Meta Informações -->
                            <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <?php echo get_the_date('d/m/Y'); ?>
                                </span>

                                <?php $categories = get_the_category(); ?>
                                <?php if (!empty($categories)): ?>
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"
                                            class="hover:text-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>]">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Título -->
                            <h2
                                class="text-xl font-bold text-gray-900 mb-3 hover:text-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>] transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <div class="text-gray-600 text-sm leading-relaxed mb-4 flex-grow">
                                <?php
                                if (has_excerpt()) {
                                    the_excerpt();
                                } else {
                                    echo wp_trim_words(get_the_content(), 20, '...');
                                }
                                ?>
                            </div>

                            <!-- Link "Leia Mais" -->
                            <a href="<?php the_permalink(); ?>"
                                class="inline-flex items-center text-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>] font-semibold text-sm hover:underline mt-auto">
                                Leia mais
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Paginação -->
            <div class="mt-12">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg> Anterior',
                    'next_text' => 'Próxima <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>',
                    'class' => 'flex justify-center gap-2',
                    'before_page_number' => '<span class="px-4 py-2 bg-white rounded-md shadow hover:shadow-lg transition-shadow">',
                    'after_page_number' => '</span>',
                ));
                ?>
            </div>

        <?php else: ?>
            <!-- Nenhum Post Encontrado -->
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-gray-300 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">Nenhum post encontrado</h2>
                <p class="text-gray-500 mb-6">Desculpe, não há posts disponíveis no momento.</p>
                <a href="<?php echo home_url(); ?>"
                    class="inline-block px-6 py-3 bg-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>] text-white rounded-md hover:opacity-90 transition-opacity">
                    Voltar para a página inicial
                </a>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>