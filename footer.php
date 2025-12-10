<div class="mt-10 pt-10 pb-10 bg-[<?= get_theme_mod('theme_color_background', '#184CDA'); ?>]">
    <div class="mx-auto container px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-10">
        <!-- Coluna 1 -->
        <div class="text-center sm:text-left">
            <div>
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                }
                ?>
            </div>
            <div>
                <p class="text-sm text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] mt-4">
                    <?= get_bloginfo('description'); ?>
                </p>
            </div>
            <div class="flex pt-2 flex-wrap items-center justify-center sm:justify-start gap-3">
                <?php if (get_theme_mod('theme_social_facebook')): ?>
                    <a href="<?= esc_url(get_theme_mod('theme_social_facebook')); ?>" target="_blank"
                        class="text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] hover:text-white">
                        <img class="w-8 h-8 bg-white rounded-lg p-2"
                            src="<?= get_template_directory_uri(); ?>/assets/images/facebook.png" alt="facebook">
                    </a>
                <?php endif; ?>

                <?php if (get_theme_mod('theme_social_instagram')): ?>
                    <a href="<?= esc_url(get_theme_mod('theme_social_instagram')); ?>" target="_blank"
                        class="text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] hover:text-white">
                        <img class="w-8 h-8 bg-white rounded-lg p-2"
                            src="<?= get_template_directory_uri(); ?>/assets/images/instagram.png" alt="instagram">
                    </a>
                <?php endif; ?>

                <?php if (get_theme_mod('theme_social_twitter')): ?>
                    <a href="<?= esc_url(get_theme_mod('theme_social_twitter')); ?>" target="_blank"
                        class="text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] hover:text-white">
                        <img class="w-8 h-8 bg-white rounded-lg p-2"
                            src="<?= get_template_directory_uri(); ?>/assets/images/twitter.png" alt="twitter">
                    </a>
                <?php endif; ?>

                <?php if (get_theme_mod('theme_social_linkedin')): ?>
                    <a href="<?= esc_url(get_theme_mod('theme_social_linkedin')); ?>" target="_blank"
                        class="text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] hover:text-white">
                        <img class="w-8 h-8 bg-white rounded-lg p-2"
                            src="<?= get_template_directory_uri(); ?>/assets/images/linkedin.png" alt="linkedin">
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Coluna 2 -->
        <div class="text-center sm:text-left">
            <div>
                <h3 class="text-lg font-semibold text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                    Navegação
                </h3>
            </div>
            <div class="mt-4 text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'container' => 'nav',
                    'container_class' => '',
                    'menu_class' => 'flex flex-col gap-2 text-sm text-[<?= get_theme_mod(\'theme_color_text-tertiary\', \'#ffffff\'); ?>]',
                ]);
                ?>
            </div>
        </div>

        <div class="text-center sm:text-left">
            <div>
                <h3 class="text-lg font-semibold text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                    Paginas
                </h3>
            </div>
            <div class="mt-4 text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container' => 'nav',
                    'container_class' => '',
                    'menu_class' => 'flex flex-col gap-2 text-sm text-[<?= get_theme_mod(\'theme_color_text-tertiary\', \'#ffffff\'); ?>]',
                ]);
                ?>
            </div>
        </div>


        <!-- Coluna 3 -->
        <div class="text-center sm:text-left">

        </div>

        <!-- Coluna 4 -->
        <div class="text-center sm:text-left">
            <div>
                <h3 class="text-lg font-semibold text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                    Contato
                </h3>
            </div>
            <div>
                <p class="text-sm text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] mt-4">
                    <?= get_theme_mod('theme_address_contact', 'Endereço não configurado'); ?>
                </p>
                <p class="text-sm text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] mt-2">
                    Telefone: <?= get_theme_mod('theme_phone_contact', 'Telefone não configurado'); ?>
                </p>
                <p class="text-sm text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>] mt-2">
                    Email: <?= get_theme_mod('theme_email_contact', 'Email não configurado'); ?>
                </p>
            </div>
            <div>
                <h3
                    class="text-lg mt-10 font-semibold text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                    Atendimento
                </h3>
            </div>
            <div class="mt-4 text-[<?= get_theme_mod('theme_color_text-tertiary', '#ffffff'); ?>]">
                <?=
                    get_theme_mod('theme_service', 'Serviço não configurado');
                ?>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
    </body>

    </html>