
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                <?php
                $catid = get_cat_id('destacados');
                $max = 8;
                $menu = array(
                    'type' => 'product',
                    'child_of' => 0,
                    'parent' => '',
                    'orderby' => 'name',
                    'order' => 'rand',
                    'hide_empty' => 1,
                    'hierarchical' => 0,
                    'exclude' => $catid,
                    'include' => '',
                    'number' => '',
                    'taxonomy' => 'product_cat',
                    'pad_counts' => false
                );
                ?>
                <ul class="nav nav-pills">
                    <?php $categories = get_categories($menu); ?>
                    <?php foreach ($categories as $category) { ?>
                        <li role="presentation"><a href="<?php echo get_category_link(get_term_by("slug", $category->slug, "product_cat")); ?>"><?php echo $category->name; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-2 col-xs-12 logo-footer">
                <img src="<?php bloginfo('template_url'); ?>/images/general/logo-footer.png" alt="Amazona Paralele"/>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-10 col-xs-12 text-copy">
                <p>Copyright © 2015 www.amazonaparalelo.com Todos los derechos reservados</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 copy">
                <p>Desarrollado por <a href="http://www.proyectokamila.com">Proyecto Kamila C.A</a></p>
            </div>
        </div>
    </div>
</footer>
</body> 
<?php wp_footer(); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/scripts/main.js"></script>
<script src="<?php bloginfo('template_url') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url') ?>/scripts/slider/js/jquery.anythingslider.js"></script>
<script src="<?php bloginfo('template_url') ?>/scripts/slider/js/jquery.anythingslider.fx.js"></script>
<!-- AnythingSlider video extension; optional, but needed to control video pause/play -->
<script src="<?php bloginfo('template_url') ?>/scripts/slider/js/jquery.anythingslider.video.js"></script>
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url') ?>/scripts/carrusel/jquery.carouFredSel-6.2.1-packed.js"></script>    <!-- optionally include helper plugins -->
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url') ?>/scripts/carrusel/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php bloginfo('template_url') ?>/scripts/carrusel/helper-plugins/jquery.touchSwipe.min.js"></script>


</html>