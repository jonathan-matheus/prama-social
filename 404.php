<?php
get_header();
?>
<main class="bg-white min-h-screen py-16">
    <div class="container mx-auto max-w-2xl px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-3">Página não encontrada</h1>
        <p class="text-gray-600 text-base mb-8">
            A página que você procura pode ter sido removida, teve o nome alterado ou está temporariamente indisponível.
        </p>
        <div class="flex items-center justify-center gap-4">
            <a href="<?php echo esc_url(home_url('/')); ?>"
                class="inline-block bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition">
                Voltar para a página inicial
            </a>
        </div>
    </div>
</main>
<?php
get_footer();
?>