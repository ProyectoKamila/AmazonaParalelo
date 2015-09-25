<!doctype html>
<?php global $woocommerce; ?>
<?php
$vari=select_pkconfig();
$db = json_decode($vari);
//debug($db);
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?php wp_title(); ?></title>
        <link href='<?php bloginfo('stylesheet_url'); ?>' rel='stylesheet' type='text/css'> 
        <!-- Anything Slider -->
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/scripts/slider/css/anythingslider.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/scripts/slider/css/animate.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/bootstrap/dist/css/bootstrap.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

        <?php wp_head(); ?>
    </head>
    <body>
        <header class="menu navbar-fixed-top hidden-sm hidden-xs" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mini-bar"></div>
                    <div class="clearfix"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

                                <a href="<?= $db->twitter ?>"><div class="redes twitter"></div></a>
                                <a href="<?= $db->facebook ?>"><div class="redes facebook"></div></a>
                                <a href="<?= $db->google ?>"><div class="redes google"></div></a>
                                <a href="<?= $db->instagram ?>"><div class="redes instagram"></div></a>

                            </div>
                            <div class="col-lg-8 col-md-8 hidden-sm hidden-xs content-nav">
                                <ul class="nav nav-pills">
                                    <li role="presentation"  class="content-form">
                                        <form class="search-form" action="<?php echo home_url('');?>">
                                            <input name="s" id="s" type="text"/>
                                            <input type="submit" name="Buscar" class="buscar" value="Buscar" /></form>
                                        <a href="#" id="busqueda">
                                            <img src="<?php bloginfo('template_url'); ?>/images/general/lupa.png" alt="lupa" class="lupa"/>
                                        </a>
                                    </li>

                                    <li role="presentation"><a href="<?php echo home_url('mi-cuenta'); ?>">Iniciar Sesion</a></li>
                                    <li role="presentation"><a href="<?php echo home_url('mi-cuenta'); ?>">Mi Cuenta</a></li>
                                    <li role="presentation"><a href="<?php echo home_url('contacto'); ?>">Contacto</a></li>
                                    <li role="presentation"><a href="<?php echo home_url('nosotros'); ?>">Nosotros</a></li>

                                </ul>
                            </div>
                                <a href="<?php echo home_url('carro'); ?>">
                            <div class="col-lg-1 col-md-1 hidden-sm hidden-xs ">
                                <div class="content-cart">
                                    <div class="item"><?= sizeof($woocommerce->cart->get_cart()); ?></div>
                                </div>
                            </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs ">
                                <a href="<?php echo home_url('wishlist/view'); ?>">
                                <div class="content-whish">
                                    <div class="item"><?= " " . $count = yith_wcwl_count_products(); ?></div>
                                </div>
                            </a>
                            </div>
                            <div class="clearfix bordeado"></div>
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 logo"style="overflow: hidden;">

                                <a href="<?php echo home_url(''); ?>">
                                    <img src="<?php bloginfo('template_url'); ?>/images/general/logo.png" alt="Amazona Paralelo" style="width: 100%;"/>
                                </a>

                            </div>
                            <div class="col-lg-10 col-md-10 hidden-sm hidden-xs categories-list">
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
                                        <?php
                                        $submenu = array(
                                            'type' => 'product',
                                            'child_of' => 0,
                                            'parent' => $category->term_id,
                                            'orderby' => 'name',
                                            'order' => 'rand',
                                            'hide_empty' => 1,
                                            'hierarchical' => 0,
                                            'exclude' => '',
                                            'include' => '',
                                            'number' => '',
                                            'taxonomy' => 'product_cat',
                                            'pad_counts' => false
                                        );
                                        ?>
                                        <?php $subcategories = get_categories($submenu); ?>
                                        <?php
                                        if (!empty($subcategories)) {
                                            ?>
                                            <li role="presentation" class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                                    <?php echo $category->name; ?> <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <?php foreach ($subcategories as $subcategory) { ?>
                                                        <li><a href="<?php echo get_category_link(get_term_by("slug", $subcategory->slug, "product_cat")); ?>"><?php echo $subcategory->name; ?></a></li>
                                                    <?php } ?>

                                                </ul>
                                            </li>
                                        <?php } else { ?>
                                            <li role="presentation"><a href="<?php echo get_category_link(get_term_by("slug", $category->slug, "product_cat")); ?>"><?php echo $category->name; ?></a></li>
                                        <?php } ?>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="menu-movil navbar-fixed-top hidden-lg hidden-md">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 redes">
                        <img src="<?php bloginfo('template_url'); ?>/images/general/redes-movil_08.png" alt="redes"/>
                        <img src="<?php bloginfo('template_url'); ?>/images/general/redes-movil_04.png" alt="redes"/>
                        <img src="<?php bloginfo('template_url'); ?>/images/general/redes-movil_06.png" alt="redes"/>
                    </div>
                    <div class="col-sm-6 col-xs-6 logo">
                        <a href="<?php echo home_url(''); ?>">
                            <img src="<?php bloginfo('template_url'); ?>/images/general/logo.png" alt="Amazona Paralelo"/>
                        </a>
                    </div>
                    <div class="col-xs-2  col-sm-2  ">
                        <div id="boton-categoria" class="movil-boton">
                            <span class=" glyphicon glyphicon-th" aria-hidden="true"></span>  
                        </div>
                    </div>
                    <div class="col-xs-2  col-sm-2  ">
                        <div id="boton-usuario" class="movil-boton">
                            <span class=" glyphicon glyphicon-user" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="col-xs-2  col-sm-2  ">
                        <div id="boton-carrito" class="movil-boton">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div id="menu-categorias" class="hidden-lg hidden-md col-sm-12 col-xs-12">
                        <ul class="nav nav-pills">
                            <?php
                            $catid = get_cat_id('destacados');
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
                    <div id="menu-usuario" class="hidden-lg hidden-md col-sm-12 col-xs-12">
                        <ul class="nav nav-pills">
                            <li role="presentation"  class="content-form">
                                <form class="search-form visible-sm visible-xs">
                                    <input name="s" id="s" type="text"/>
                                    <input type="submit" name="Buscar" class="buscar" value="Buscar" /></form>

                            </li>

                            <li role="presentation"><a href="<?php echo home_url('mi-cuenta'); ?>">Iniciar Sesion</a></li>
                            <li role="presentation"><a href="<?php echo home_url('mi-cuenta'); ?>">Mi Cuenta</a></li>
                            <li role="presentation"><a href="<?php echo home_url('contacto'); ?>">Contacto</a></li>
                            <li role="presentation"><a href="<?php echo home_url('nosotros'); ?>">Nosotros</a></li>

                        </ul>
                    </div>
                    <div id="menu-carrito" class="hidden-lg hidden-md col-sm-12 col-xs-12">
                        <ul class="nav nav-pills">
                            <li role="presentation"><a href="<?php echo home_url('mi-cuenta'); ?>">Carrito: </a></li>
                            <li role="presentation"><a href="<?php echo home_url('mi-cuenta'); ?>">Whishlist: </a></li>
                        </ul>
                    </div>
                    <div id="menu-usuario" class="hidden-lg hidden-md col-sm-12 col-xs-12">
                        <ul class="nav nav-pills">
                            <li role="presentation"  class="content-form">
                                <form class="search-form visible-sm visible-xs">
                                    <input name="s" id="s" type="text"/>
                                    <input type="submit" name="Buscar" class="buscar" value="Buscar" /></form>

                            </li>

                            <li role="presentation"><a href="<?php home_url('mi-cuenta'); ?>">Iniciar Sesion</a></li>
                            <li role="presentation"><a href="<?php home_url('mi-cuenta'); ?>">Mi Cuenta</a></li>
                            <li role="presentation"><a href="<?php home_url('contacto'); ?>">Contacto</a></li>
                            <li role="presentation"><a href="<?php home_url('nosotros'); ?>">Nosotros</a></li>

                        </ul>
                    </div>
                </div>

            </div>

        </header>

