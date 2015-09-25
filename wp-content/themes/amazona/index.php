<?php 
$vari=select_xtras();
$ex = json_decode($vari);
$vari1=select_pkconfig();
$db = json_decode($vari1);
// debug($db);
?>
    <?php get_header(); ?>
<div class="" id="stoy" data-url="index"></div>
<div class="container">
    <div class="row">
        <?php get_template_part('banner'); ?>

        <?php
        $d = query_posts(array('pots_type' => 'product', 'product_cat' => 'destacados', 'posts_per_page' => 3));
//        debug($d);
        $x = 1;
        ?>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="row">
                <?php
                while (have_posts()) {
                    the_post();
                    ?>

                    <div class="  <?php if ($x === 1) { ?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?php } else { ?>col-lg-6 col-md-6 col-sm-12 col-xs-12<?php } ?> oferta box-offer-<?php echo $x; ?>">
                        <div class="oferta-producto-imagen">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>"/></a>
                        </div>
                        <div class="oferta-producto-description">
                            <h2><?php echo  max_charlength(get_the_title(),40); ?></h2>
                            <p><?php echo max_charlength($post->post_excerpt, 30) ?></p>

                        </div>
                        <div class="oferta-precio">
                            <?php echo select_divisa('Bs.', $product->get_price()); ?>
                        </div>
                    </div>
                    <?php if ($x === 1) { ?>
                        <div class="clearfix"></div>
                        <?php
                        $x = $x + 1;
                    }
                    ?>

                <?php } ?>
            </div>
        </div>
    </div>

</div>
<div id="home-productos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-divisor">
                Lo mejor de
            </div>
            <div class="clearfix"></div>
            <?php
            wp_reset_query();
            query_posts(array('post_type' => 'product', 'exclude' => 'destacados'));
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-producto">
                <ul id="foo2">

                    <?php
                    while (have_posts()) {
                        the_post();
                        ?>
                        <li >
                            <?php $categoria = get_the_category_wc($post->ID); ?>
                                    <?php foreach ($categoria as $category) { ?>
                                    <?php } ?>
                            <a href="<?=  $category->slug;?>">
                                <div class="origami-categoria">
                                    
                                    <h1><?= $category->name; ?></h1>
                                </div>
                            </a>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                                <div class="producto">
                                    <a href="<?php the_permalink(); ?>">    <div class="producto-imagen">
                                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>"/>
                                        </div>
                                    </a>
                                    <p><?php echo  max_charlength(get_the_title(),30); ?></p>
                                    <p><stong><?php echo 'Bs. ' . select_divisa('Bs. ', $product->get_price()); ?></p>
                                    <a href="<?php the_permalink(); ?>"><div class="producto-precio"></div></a>
                                    <?php // echo MY_YITH::add_to_wishlist_button_juan( $yith_wcwl->get_wishlist_url(), $product->product_type, $yith_wcwl->is_product_in_wishlist( $product->id ) );?>
                                    <!--<div class="producto-wishlist">-->
                                    <?php
                                                            //debug($yith_wcwl->get_wishlist_url());
                                    echo MY_YITH::add_to_wishlist_button( $yith_wcwl->get_wishlist_url(), $product->product_type, $yith_wcwl->is_product_in_wishlist( $product->id ) );?>
                                    <!--</div>-->
                                </div>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 title-marca">
                <h2><?= $ex->titulo; ?></h2>
            </div>
        </div>
    </div>
</div>
<div id="producto-marcas">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <p><?= $ex->content; ?></p>
                <ul>
                    <li> <img src="<?php bloginfo('template_url'); ?>/images/general/ubicacion.png" alt="Ubicacion"/> 
                        <p><?= $db->direc; ?></p>
                    </li>
                    <li> <img src="<?php bloginfo('template_url'); ?>/images/general/carta.png" alt="Ubicacion"/> 
                        <p><?= $db->email; ?></p>
                    </li>
                    <li> <img src="<?php bloginfo('template_url'); ?>/images/general/telefono.png" alt="Ubicacion"/> 
                        <p><?= $db->tlf; ?></p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    <?php get_template_part('categorias'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer('');
