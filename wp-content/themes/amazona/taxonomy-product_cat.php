<?php get_header(); ?>
<div class="content-productos">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php do_action('woocommerce_before_main_content'); ?>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
    <div id="categoria-productos">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 cat-proudcto">
                    <div class="origami-categoria top-50">
                        <h1><?php echo $term; ?></h1>
                    </div>
                    <?php
                    query_posts(array('post_type' => 'product', 'product_cat_name' => $term, 'posts_per_page' => 1));
                    while (have_posts()) {
                        the_post();
                        ?>
                        <div class="producto">
                            <div class="producto-imagen top-20">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>"/>
                            </div>

                        </div>
                    <?php } wp_reset_query(); ?>
                </div>
                <?php
                while (have_posts()) {
                    the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 cat-proudcto">
<!--                            <div class="origami-categoria">
                                <?php //    the_category(get_the_ID()); ?>
                            </div>-->

                            <div class="producto">
                                <div class="producto-imagen">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>"/>
                                </div>
                                <p><?php the_title(); ?> - <strong><?php echo select_divisa('Bs.', $product->get_price()); ?></strong></p>
                                <div class="producto-precio"></div>
                                <div class="producto-wishlist"></div>
                            </div>
                        </div>
                    </a>
                <?php } ?>



                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>