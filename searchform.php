<?php
// filepath: /home/john/Documentos/code/crass/wordpress_data/wp-content/themes/pragmasocial/searchform.php
?>
<form role="search" method="get" class="search-form flex" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search"
        class="search-field px-3 py-2 border bg-white border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 flex-1"
        placeholder="Buscar..." value="<?php echo get_search_query(); ?>" name="s" required />
    <button type="submit"
        class="search-submit px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        Buscar
    </button>
</form>