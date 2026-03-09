<div class="mt-10 pt-10 pb-10 bg-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>]">
    <div class="mx-auto container px-4 sm:px-6 lg:px-8">

        <!-- Grid principal: 2 colunas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">

            <!-- Coluna esquerda: texto + shortcode do formulário -->
            <div>
                <?php
                $newsletter_text = get_theme_mod('theme_footer_newsletter_text', '');
                if ($newsletter_text): ?>
                    <div
                        class="mb-6 text-sm leading-relaxed text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                        <?= wp_kses_post(wpautop($newsletter_text)); ?>
                    </div>
                <?php endif; ?>

                <?php
                // -------------------------------------------------------
                // Insira o shortcode do seu plugin de formulário no campo
                // "Newsletter Shortcode (Footer)" no Personalizador do WP,
                // ou substitua a string abaixo diretamente, ex:
                // echo do_shortcode('[contact-form-7 id="1" title="Newsletter"]');
                // -------------------------------------------------------
                $newsletter_shortcode = get_theme_mod('theme_shortcode_newsletter', '');
                if ($newsletter_shortcode) {
                    echo do_shortcode($newsletter_shortcode);
                }
                ?>
            </div>

            <!-- Coluna direita: bloco de informações de contato -->
            <div class="text-sm leading-relaxed text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                <?php
                $contact_block = get_theme_mod('theme_footer_contact_block', '');
                if ($contact_block) {
                    echo wp_kses_post(wpautop($contact_block));
                }
                ?>
            </div>

        </div>

        <!-- Logo abaixo -->
        <div class="mt-10 flex justify-center">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            }
            ?>
        </div>

    </div>

    <?php wp_footer(); ?>
    </body>

    </html>