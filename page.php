<?php
get_header();
?>
<main class="bg-white min-h-screen py-12">
    <div class="container mx-auto px-4">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article>
                    <h1 class="font-bold text-3xl text-gray-900 leading-tight mb-4"><?php the_title(); ?></h1>
                    <div class="text-base text-gray-700 leading-relaxed mb-8">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; endif; ?>
    </div>
</main>
<?php
get_footer();
?>