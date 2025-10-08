<?php
get_header();
?>
<main class="front-page">
    <!-- Slider -->
    <section class="hero-slider">
        <?php echo do_shortcode(get_theme_mod('theme_shortcode_slider')); ?>
    </section>
    <?php if (is_active_sidebar('services-section')): ?>
        <section class="container mx-auto flex justify-center text-center pt-20">
            <?php dynamic_sidebar('services-section'); ?>
        </section>
    <?php endif; ?>
</main>
<?php
get_footer();
?>