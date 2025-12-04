<?php
get_header();
?>
<main class="bg-white min-h-screen py-12">
    <div class="container mx-auto px-4">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article class="">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>"
                            class="w-full h-64 object-cover rounded-md mb-6" />
                    <?php endif; ?>
                    <span class="text-xs text-gray-500 flex items-center gap-1 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <?php echo get_the_date('d/m/Y'); ?>
                    </span>
                    <h1 class="font-bold text-3xl text-gray-900 leading-tight mb-4"><?php the_title(); ?></h1>
                    <div class="text-base text-gray-700 leading-relaxed mb-8">
                        <?php the_content(); ?>
                    </div>
                    <?php if (has_tag()): ?>
                        <div class="mt-6">
                            <span class="text-sm text-gray-600 font-semibold">Tags:</span>
                            <?php the_tags('<span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-xs font-medium mr-2">', '</span><span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-xs font-medium mr-2">', '</span>'); ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile; endif; ?>
    </div>
</main>
<?php
get_footer();
?>