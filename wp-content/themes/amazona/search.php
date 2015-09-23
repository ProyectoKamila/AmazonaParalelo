<?php get_header(); ?>

<div id="home-productos">
    <div class="container">
        <div class="row">
            <?php if($post != null){ ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-divisor" style="background: none;">
                
                <?php 
                echo 'Resultados de la b&uacute;squeda';
                
            
            ?>
            </div>
            <div class="clearfix"></div>
            <?php
            
//            query_posts(array('post_type' => 'product', 'exclude' => 'destacados'));
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
                                    <p><?php the_title(); ?> - <strong><?php echo select_divisa('Bs.', $product->get_price()); ?></strong></p>
                                    <a href="<?php the_permalink(); ?>"><div class="producto-precio"></div></a>
                                    <div class="producto-wishlist"></div>
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
<?php
}else{
    ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-divisor" style="background: none;">
    <?php
                echo '¿No encuentras lo que buscas?<br>Puedes solicitarnoslo';
                ?>
</div>
<div class="clearfix"></div>
<form action="">
    <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="col-lg-4"><label>Nombre Producto</label></div>
            <div class="i col-lg-8"><input type="text" name="np"/></div>
            
            <div class="col-lg-4"><label>Descripci&oacute;n</label></div>
            <div class="i col-lg-8"><textarea name="des"></textarea></div>
            
            <div class="col-lg-4"><label>Cantidad</label></div>
            <div class="i col-lg-8"><input type="text" name="cant"/></div>
            
            <div class="col-lg-4"><label>Enlace</label></div>
            <div class="i col-lg-8"><input type="text" name="link"/></div>
            
            <div class="col-lg-4"><label>Email</label></div>
            <div class="i col-lg-8"><input type="email" name="email"/></div>
            
            <div class="col-lg-4"><label>Su Nombre</label></div>
            <div class="i col-lg-8"><input type="text" name="name"/></div>
            
            <div class="col-lg-4"><label>Su Tel&eacute;fono</label></div>
            <div class="i col-lg-8"><input type="text" name="tlf"/></div>
            
            <div class="col-lg-4"></div>
            <div class="i col-lg-8"><input type="submit" class="submit" value="Aceptar"/></div>
        </div>
        <div class="col-lg-3"></div>
</form>







<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-producto">
    
</div>
      <?php
      }
            
            
get_footer();
