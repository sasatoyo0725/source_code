<?php

/**
 * Template Name: case-list
 */

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'order' => 'ASC',
    'paged' => $paged,
);
$the_query = new WP_Query($args);
?>

<section class="pagination">
    <?php
    global $wp_rewrite;
    $paginate_base = get_pagenum_link(1);
    if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
        $paginate_format = '';
        $paginate_base = add_query_arg('paged', '%#%');
    } else {
        $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
            user_trailingslashit('page/%#%/', 'paged');
        $paginate_base .= '%_%';
    }
    echo paginate_links(array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $the_query->max_num_pages,
        'mid_size' => 1,
        'current' => ($paged ? $paged : 1),
        'prev_text' => '前の５件へ',
        'next_text' => '次の５件へ',
    ));
    ?>
</section>