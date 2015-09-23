<?php
$counter = 0;
$max = 6; //number of categories to display
$args = array(
    'type' => 'product',
    'child_of' => 0,
//    'parent' => 42,
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0,
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'number' => '',
    'taxonomy' => 'product_cat',
    'pad_counts' => false
);

$terms = get_categories($args);

shuffle($terms);
//echo 'shuffled';
//debug($terms, false);
$cat = null;
$name = null;
?>


<?php
if ($terms) {
    foreach ($terms as $term) {
        $counter++;
        if ($counter <= $max) {
            $category_name = $term->name;
            $category_thumbnail = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($category_thumbnail);
//            echo '-'.$image.'<br>';
            if (!$image == null) {
                $category_link = get_category_link(get_term_by('slug', $term->slug, 'product_cat'));
                //debug($category_link);
                ?>
                <div class="col-sm-3 col-md-3 col-lg-4 col-xs-6">
                    <a href="<?= $category_link; ?>" class="thumbnail">
                        <img class="img" src="<?= $image; ?>">
                    </a>
                </div>
                <?php
            } else {
                $counter--;
            }
        }
    }
}
?>