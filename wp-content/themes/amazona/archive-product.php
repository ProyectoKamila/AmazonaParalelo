<?php get_header(); ?>
<div class="container">
    <div class="row">
        <?php do_action('woocommerce_before_main_content');
        echo '</div></div>';
        ?>
        <div class="clearfix"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-producto tienda">

            <?php do_action('woocommerce_archive_description'); ?>

            <?php if (have_posts()) : ?>

                <?php
                /**
                 * woocommerce_before_shop_loop hook
                 *
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
//                do_action('woocommerce_before_shop_loop');
                ?>

                <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php // wc_get_template_part( 'content', 'product' ); ?>
        <?php // debug($product->is_in_stock());  ?>

                    <li>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="producto">
                                <div class="producto-imagen" >
                                    <img  src="<?= wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="Silla"/>
                                </div>
                                <p>This product title</p>
                                <!--<div class="producto-precio">-->
                                <?php
                                global $product;

                                echo apply_filters('woocommerce_loop_add_to_cart_link', sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"><div class="producto-precio"></div></a>', esc_url($product->add_to_cart_url()), esc_attr($product->id), esc_attr($product->get_sku()), esc_attr(isset($quantity) ? $quantity : 1 ), $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '', esc_attr($product->product_type), esc_html($product->add_to_cart_text())
                                        ), $product);
                                ?>
                                <!--</div>-->
                                <div class="producto-wishlist"></div>
                                <div class="price">
                                    <span class="price-block">
                                <?php echo select_divisa('Bs.', $product->get_price()); ?>
                                    </span>
                                </div>
                                <?php // echo wc_add_to_cart_message($product_>ID); ?>
                            </div>
                        </div>
                    </li>

                                    <?php endwhile; // end of the loop.  ?>

                            <?php woocommerce_product_loop_end(); ?>

    <?php
    /**
     * woocommerce_after_shop_loop hook
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
    ?>

            <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

                <?php wc_get_template('loop/no-products-found.php'); ?>

            <?php endif; ?>

        </div>
    </div>
</div>

            <?php
            get_footer();
            ?>


