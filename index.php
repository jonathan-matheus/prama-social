<?php get_header(); ?>

<main class="container mx-auto px-4">
    <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>