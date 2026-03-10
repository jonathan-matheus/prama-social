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

        <!-- Ícones de redes sociais -->
        <?php
        $social_links = [
            'theme_social_facebook' => [
                'label' => 'Facebook',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M22 12c0-5.522-4.478-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.988H7.898V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>',
            ],
            'theme_social_instagram' => [
                'label' => 'Instagram',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.334 3.608 1.308.975.975 1.246 2.242 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.333 2.633-1.308 3.608-.975.975-2.242 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.333-3.608-1.308-.975-.975-1.246-2.242-1.308-3.608C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.062-1.366.333-2.633 1.308-3.608.975-.975 2.242-1.246 3.608-1.308C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.014 7.052.072 5.197.157 3.355.673 2.014 2.014.673 3.355.157 5.197.072 7.052.014 8.332 0 8.741 0 12c0 3.259.014 3.668.072 4.948.085 1.855.601 3.697 1.942 5.038 1.341 1.341 3.183 1.857 5.038 1.942C8.332 23.986 8.741 24 12 24s3.668-.014 4.948-.072c1.855-.085 3.697-.601 5.038-1.942 1.341-1.341 1.857-3.183 1.942-5.038.058-1.28.072-1.689.072-4.948s-.014-3.668-.072-4.948c-.085-1.855-.601-3.697-1.942-5.038C20.645.673 18.803.157 16.948.072 15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>',
            ],
            'theme_social_twitter' => [
                'label' => 'Twitter/X',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L2.249 2.25h6.938l4.279 5.655zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
            ],
            'theme_social_linkedin' => [
                'label' => 'LinkedIn',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
            ],
            'theme_social_youtube' => [
                'label' => 'YouTube',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
            ],
        ];

        $has_social = false;
        foreach ($social_links as $key => $data) {
            if (get_theme_mod($key, '')) {
                $has_social = true;
                break;
            }
        }

        if ($has_social): ?>
            <div class="mt-6 flex justify-center gap-5">
                <?php foreach ($social_links as $key => $data):
                    $url = get_theme_mod($key, '');
                    if (!$url)
                        continue; ?>
                    <a href="<?= esc_url($url); ?>" target="_blank" rel="noopener noreferrer"
                        aria-label="<?= esc_attr($data['label']); ?>"
                        class="text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] hover:opacity-75 transition-opacity duration-200">
                        <?= $data['icon']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <?php wp_footer(); ?>
    </body>

    </html>