<? // debug($config);                                                             ?>
<!DOCTYPE html>
<html dir="ltr" lang="es">

    <!-- Mirrored from www.metro-oc.any-themes.com/metroshop1/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 21 Oct 2014 21:33:21 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
    <head>
        <meta charset="UTF-8" />
        <title><?= $appdata['nombre2'] ?></title>
        <base href="<? echo base_url(); ?>" />
        <meta name="description" content="My Store" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
        <? if (isset($producto) && $producto) { ?>
            <meta property="og:title" content="<?= $producto['nombre'] ?>">
            <meta property="og:image" content="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>">
            <meta property="og:description" content="<?= $producto['descripcion'] ?>">
            <meta property="og:type" content="article" />
        <? } elseif (isset($detail) && $detail) { ?>
            <meta property="og:title" content="<?= $appdata['nombre2'] ?>">
            <meta property="og:image" content="https://www.pkclick.com/imagenescarrito/<?= $detail[0]['image'] ?>">
            <meta property="og:description" content="<?= $detail[0]['coment'] ?>">
            <meta property="og:type" content="article" />
        <? } else { ?>
            <meta property="og:title" content="<?= $appdata['nombre2'] ?>">
            <meta property="og:image" content="https://www.pkclick.com/imagenescarrito/<?= $appdata['logo'] ?>">
            <meta property="og:description" content="<?= $appdata['eslogan'] ?>">
            <meta property="og:type" content="website" />
        <? } ?>
        <link href="image/data/cart.png" rel="icon" />

        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>

        <link href='http://fonts.googleapis.com/css?family=Source Sans Pro:200&amp;subset=latin' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/flexslider.css" />
        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/dd.css" />
        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/prettyPhoto.css" />
        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/jquery.jqzoom.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="./css/font-awesome.css" />

        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/responsive.css" />

        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/slideshow.css" media="screen" />
        <script type="text/javascript" src="./catalog/view/javascript/jquery/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="./catalog/view/javascript/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./catalog/view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
        <script type="text/javascript" src="./catalog/view/javascript/jquery/ui/external/jquery.cookie.js"></script>

        <script type="text/javascript" src="./catalog/view/javascript/jquery/tabs.js"></script>
        <script type="text/javascript" src="./catalog/view/javascript/common.js"></script>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/jquery.ba-throttle-debounce.min.js"></script>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/jquery.touchSwipe.min.js"></script>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/jquery.carouFredSel-6.1.0-packed.js"></script>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/cloud-zoom.1.0.3.min.js"></script>
        <?
        $sc = strcmp($_SERVER['REQUEST_URI'], '/carrito');
        $sc1 = strcmp($_SERVER['REQUEST_URI'], '/plantilla/carrito');
        $sc2 = strcmp($_SERVER['REQUEST_URI'], '/neopago');
        $sc3 = strcmp($_SERVER['REQUEST_URI'], '/plantilla/neopago');
        if (($sc !== 0) && ($sc1 !== 0) && ($sc2 !== 0) && ($sc3 !== 0)) {
            ?>
            <script type = "text/javascript" src = "./catalog/view/theme/metroshop/js/jquery.dd.min.js"></script>
        <? } ?>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="./catalog/view/theme/metroshop/js/twitter/jquery.tweet.js"></script>
        <script type="text/javascript" src="./catalog/view/javascript/jquery/colorbox/jquery.colorbox.js"></script>
        <link rel="stylesheet" type="text/css" href="./catalog/view/javascript/jquery/colorbox/colorbox.css" media="screen" />

        <script type="text/javascript" src="./catalog/view/javascript/jquery/nivo-slider/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="./js/w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "fdf72e22-4d1c-4270-9aea-a784ad6c30c2"});</script>
        <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/ie7.css" />
        <![endif]-->
        <!--[if lt IE 7]>
        <link rel="stylesheet" type="text/css" href="./catalog/view/theme/metroshop/stylesheet/ie6.css" />
        <script type="text/javascript" src="./catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
        <script type="text/javascript">
        DD_belatedPNG.fix('#logo img');
        </script>
        <![endif]-->
        <script type="text/javascript">

            $(document).ready(function() {


                // Image animation
                $(".fade-image, .box-category .menuopen, .box-category .menuclose").live({
                    mouseenter:
                            function()
                            {
                                $(this).stop().fadeTo(300, 0.6);
                            },
                    mouseleave:
                            function()
                            {
                                $(this).stop().fadeTo(300, 1);
                            }
                }
                );



                $(".box-category div.menuopen").live('click', function(event) {

                    event.preventDefault();

                    $('.box-category a + ul').slideUp();
                    $('+ a + ul', this).slideDown();

                    $('.box-category ul li div.menuclose').removeClass("menuclose").addClass("menuopen");
                    $(this).removeClass("menuopen").addClass("menuclose");

                    $('.box-category ul li a.active').removeClass("active");
                    $('+ a', this).addClass("active");
                });


                $("select:not([name='zone_id']):not([name='country_id'])").msDropdown();

                $("a[rel^='prettyPhoto']").prettyPhoto();

            });
            function justNumbers(e) {
                var keynum = window.event ? window.event.keyCode : e.which;
                if ((keynum == 8) || (keynum == 46))
                    return true;
                return /\d/.test(String.fromCharCode(keynum));
            }

        </script>

        <style type="text/css">

            /* backgrounds */
            body {
                background-color: #F7F7F9;
            }

            .empty {
                color: black;
            }

            input[type='text'], input[type='password'], textarea, select {
                background-color: #FFFFFF;
            }

            #cboxContent, #header #cart .content, .buttons, .htabs a.selected, .htabs a:nth-child(odd).selected, .htabs a:nth-child(even).selected, .tab-content, .box-product-item, #content .content, #content table, .mini-ads a, .magnifyarea {
                background-color: #FFFFFF;
            }

            #header_mainmenu .mm_logo {
                background-color: #008C8D;
            }

            #header_mainmenu a.mm_home, #header_mainmenu a.mm_account, .htabs a:nth-child(even) {
                background-color: #FFAA31;
            }

            #header_mainmenu a.mm_wishlist, #header_mainmenu a.mm_checkout, .htabs a {
                background-color: #6CBE42;
            }

            #header_mainmenu .mm_shopcart, .footer-about .social .twitter, .footer-about .social .instagram .facebook, .footer-about .social .skype {
                background-color: #58BAE9;
            }

            .search-bar {
                background-color: #6CBE42;
            }

            #search .button-search, .flexslider:hover .flex-next:hover, .flexslider:hover .flex-prev:hover, .box-heading .prev, .box-heading .next, .jcarousel-next-horizontal, .jcarousel-prev-horizontal {
                background-color: #18191D;
            }

            .pagination .links a, a.button, input.button, .product-filter .display .list-switch, .product-filter .display .grid-switch {
                background-color: #6CBE42;
            }

            #search .button-search:hover, .pagination .links a:hover, .pagination .links b, a.button:hover, input.button:hover, .htabs a:hover, .box-product .btn-wish:hover, .box-product .btn-compare:hover, .product-filter .display .grid-switch.active,.product-filter .display .grid-switch:hover, .product-filter .display .list-switch.active, .product-filter .display .list-switch:hover, .box-heading .prev:hover, .box-heading .next:hover, .jcarousel-prev-horizontal:hover, .jcarousel-next-horizontal:hover {
                background-color: #58BAE9;
            }

            #menu > ul > li:hover, .box-category {
                background-color: #008C8D;
            }

            #menu .separator {
                background-color: #E0E0E4;
            }

            #menu > ul > li > div {
                background-color: #FFFFFF;
            }

            #menu > ul > li ul > li > a:hover, .box-category > ul > li > a:hover, .box-category > ul > li ul > li > a:hover {
                background-color: #58BAE9;
            }

            table.list thead td, table.radio tr.highlight:hover td, .manufacturer-heading, .attribute thead td, .attribute thead tr td:first-child, .compare-info thead td, .compare-info thead tr td:first-child, .wishlist-info thead td, .order-detail, .cart-info thead td, .checkout-heading, .checkout-product thead td  {
                background-color: #58BAE9;
            }

            .product-list .list-product-item, .box-product .bottom-block, .category-info, .product-info > .left + .right {
                background-color: #414E5B;
            }

            .view-first:hover .bottom-block {
                background-color: #008c8d;
            }

            .box-product .btn-wish {
                background-color: #F5253E;
            }

            .box-product .btn-compare {
                background-color: #E27043;
            }

            .product-filter {
                background-color: #E2E3E1;
            }

            #footer {
                background-color: #1F2B36;
            }

            .footer-about {
                background-color: #FFFFFF;
            }






            /* font size */

            /* 12 */
            .help, .box-product .btn-wish, .box-product .btn-compare, .product-info .price-tax, .product-info .price .reward small, .product-info .price .discount, .product-info .minimum, #twitter_update_list {
                font-size:12px;
            }

            /* 14 */
            body, td, th, input, textarea, select, #currency a, #phone span, #menu > ul > li > a, #menu > ul > li ul > li > a, .pagination .links, .htabs a, .product-info .input-qty input, .box-product .name a, .box-product .link-cart, .box-category, .manufacturer-heading, .product-filter .display, .product-filter .sort, .product-filter .limit, .product-info > .left + .right, .attribute thead td, .attribute thead tr td:first-child, .checkout-heading {
                font-size:14px;
            }

            /* 16 */
            .box-product .price, #footer h3 {
                font-size:16px;
            }

            /* 22 */
            .footer-about .text h1 {
                font-size:22px;
            }
            /* 24 */
            h1, .welcome, .box .box-heading, .product-info .price {
                font-size:24px;
            }
            /* 18 */
            h2, #phone, .product-list .list-product-item .center-block .list-name a, .product-list .list-product-item .right-block .list-price {
                font-size:18px;
            }

            /* font family */
            body {
                font-family:"Source Sans Pro";
            }

            h1, .welcome, h2, .box .box-heading, #footer h3, .footer-about .social h1 {
                font-family:"Source Sans Pro";

                font-weight:200;
                text-transform: none;
            }

            #menu > ul > li > a, #menu > ul > li ul > li > a, a.button, input.button, #footer h3, .footer-about .text h1, .footer-about .social h1 {
                text-transform: uppercase;
            }

            /* colors */
            /*            body, #currency a, .mini-cart-info td, .mini-cart-info .name small, .mini-cart-total td, table.form > * > * > td, .htabs a.selected, .htabs a:nth-child(even).selected, .htabs a:nth-child(odd).selected, .product-filter .sort, .product-filter .limit {
                            color: #151617;
                        }*/

            h1, .welcome, h2, .box .box-heading {
                color: #252727;
            }

            a, a:visited, a b {
                color: #00619E;
            }

            a:hover, #currency a:hover, #currency .active {
                color: #f5253e;
            }

            #header #cart .heading a, #header_mainmenu > a, #phone, #phone a, .htabs a {
                color: #FFFFFF;
            }

            #menu > ul > li > a {
                color: #4B4747;
            }

            #menu > ul > li:hover > a, .box-category > ul > li > a, .box-category > ul > li ul > li > a {
                color: #FFFFFF;
            }

            #menu > ul > li ul > li > a:hover {
                color: #FFFFFF;
            }

            table.radio tr.highlight:hover td, .manufacturer-heading, .attribute thead td, .attribute thead tr td:first-child, .compare-info thead td, .compare-info thead tr td:first-child, .wishlist-info thead td, .cart-info thead td, .checkout-heading {
                color: #FFFFFF;
            }

            .help {
                color: #B2B2B9;
            }

            a.button, input.button, .pagination .links a, .pagination .links a:hover, .pagination .links b, .htabs a:hover, .box-product .btn-wish, .box-product .btn-compare, .product-compare a {
                color: #FFFFFF;
            }

            .product-info .right .breadcrumb a, .product-list .list-product-item .center-block .description, .box-product .name a, .box-product .link-cart, .category-info .description, .product-info > .left + .right, .product-info .description a, .product-info .price b, .product-info .price-tax {
                color: #FFFFFF;
            }

            .product-info .description span, .product-info .price .reward small, .product-info .price .discount, .product-info h2, .product-info .minimum {
                color: #B2B2B9;
            }

            .product-list .list-product-item .right-block .list-price, .box-product .price, .product-info .price {
                color: #FFAA31;
            }

            .box-product .price-old, .product-info .price-old, .compare-info .price-old {
                color: #AEAAA9;
            }

            #footer h3 {
                color: #E27043;
            }

            #footer .column a {
                color: #FFFFFF;
            }

            .footer-about {
                color: #676767;
            }

            .footer-about .text h1, .footer-about .social h1 {
                color: #61ABE7;
            }

            #twitter_update_list {
                color: #CCCCCC;
            }

            /* borders */
            input[type='text'], input[type='password'], textarea, select, .mini-cart-info td, table.list, table.list td, .pagination, .manufacturer-list, .review-list, .attribute, .attribute td, .compare-info, .compare-info td, .wishlist-info table, .wishlist-info tbody td, .order-list .order-content, .return-list .return-content, .download-list .download-content, .cart-info table, .cart-info thead td, .cart-info tbody td, .cart-total, .checkout-heading, .checkout-product table, .checkout-product tbody td, .checkout-product tfoot td {
                border-color:#E6E6E9;
            }

            .product-info .product-info-buttons, .product-info .price {
                border-color:#4F5E6D;
            }

            /* invert images */


        </style>
    </head>

    <body class="color-fondo">
        <? if (isset($appdata['analitycs']) && ($appdata['analitycs'])) { ?>
            <script>
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', '<?= $appdata['analitycs'] ?>', 'auto');
                ga('send', 'pageview');

            </script>
        <? } ?>
        <div id="container">

            <div id="header_menu">
                <div class="header_welcome">
                    <?
                    if ($this->user->conect) {
                        if (isset($_GET['ip'])) {
                            $ip = $_GET['ip'];
                        }
                        if (isset($_COOKIE['ip'])) {
                            $ip = $_COOKIE['ip'];
                        }
                        ?>
                        Bienvenido, <?= $this->user->information->name . ' ' . $this->user->information->last_name ?> |  
                        Saldo: 
                        <strong title="Saldo en Dolares"><?= $this->user->information->gold ?> $</strong> | 
                        <strong title="Saldo en Bolivares"><?= $this->user->information->bolivar ?> Bs</strong> | 
                        <a href="#" title="Recargar Saldo">Recargar</a> | 
                        <a href="https://pkclick.com/account/p/close.php?url=<?= $appdata['url'] ?>&ip=<?= $ip ?>">Salir</a> | 
                    <? } else { ?>
                        Bienvenido, puedes <a href="./login">iniciar sesión</a> o <a href="http://pkaccount.com/p/add.php?url=<?= $appdata['url'] ?>">crear una cuenta</a>.
                    <? } ?>
                </div>
                <?
// debug($this->user->information->id); 
//               debug ($appdata['user']) 
                if (($this->user->conect) && (($this->user->information->id == $appdata['user']) || ($this->user->information->id == 23))) {
                    ?>
                    <div class="config" style="float: right;">
                        <!--<i class="icon-cog">sasd</i>-->
                        <a title="Cambiar Colores" href="./configapp"><img src="./image/colores.png" height="20px" width="20px" alt="Cambiar Colores"></a>
                    </div>
                <? } ?>
                <div class="clear"></div>
            </div>      

            <div id="header">

                <div id="header_mainmenu">
                    <a href="./" class="mm_logo color1" style="background: black url('https://www.pkclick.com/imagenescarrito/<?= $appdata['logo'] ?>') center 0px no-repeat; background-size: 100% 100%; <? if (isset($config->color1)) { ?>background-color: <?= $config->color1 ?>;<? } ?>"></a>
                    <? if ($appdata['estatus_app'] > 0) { ?>
                        <a href="./blog" class="mm_home color2" <? if (isset($config->color2)) { ?>style="background-color: <?= $config->color2 ?>"<? } ?>>Blog</a>
                    <? } else { ?>
                        <a href="./" class="mm_home mm_home2 color2" <? if (isset($config->color2)) { ?>style="background-color: <?= $config->color2 ?>"<? } ?>><?= $appdata['nombre2'] ?></a>
                    <? } ?>
                    <a class="mm_wishlist color3" href="./contacto" id="wishlist-total" <? if (isset($config->color3)) { ?>style="background-color: <?= $config->color3 ?>"<? } ?>>Contacto</a>
                    <? if ($this->user->conect) { ?>
                        <a class="mm_account color2" href="http://pkaccount.com/p/account.php" target="_bank" <? if (isset($config->color2)) { ?>style="background-color: <?= $config->color2 ?>"<? } ?>>Mi Cuenta</a>
                    <? } else { ?>
                        <a class="mm_account color2" href="./login" <? if (isset($config->color2)) { ?>style="background-color: <?= $config->color2 ?>"<? } ?>>Mi Cuenta</a>
                    <? } ?>
                    <a class="mm_checkout color3" href="./pedidos" <? if (isset($config->color3)) { ?>style="background-color: <?= $config->color3 ?>;"<? } ?>>Pedidos</a>
                    <div id="cart" class="mm_shopcart" <? if (isset($config->color4)) { ?>style="background-color: <?= $config->color4 ?>"<? } ?>>
                        <div class="heading">
                            <a>
                                <span id="cart-total"><?
                                    if (isset($prodcar)) {
                                        echo count($prodcar) . " item(s) <br>" . number_format($totalcar, 2, ',', '.') . ' ' . $appdata['moneda'];
                                    } else {
                                        ?>0 item(s) - > 0.00<?
                                        echo $appdata['moneda'];
                                    }
                                    ?> 
                                </span>
                            </a>
                        </div>
                        <div class="content previewcar">
                            <? if (isset($prodcar)) { ?>
                                <div class="mini-cart-info" style="max-height: 150px; overflow: hidden; overflow-y: auto;">
                                    <table>
                                        <tbody>
                                            <? foreach ($prodcar as $producto) { ?>
                                                <tr>
                                                    <td class="image">
                                                        <a href="./producto/<?= $producto['slug'] ?>">
                                                            <img height="47px" width="47" src="https://www.pkclick.com/imagenescarrito/small/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" title="<?= $producto['nombre'] ?>">
                                                        </a>
                                                    </td>
                                                    <td class="name">
                                                        <a href="./producto/<?= $producto['slug'] ?>">
                                                            <?= $producto['nombre'] ?>
                                                        </a>
                                                        <div>
                                                        </div>
                                                    </td>
                                                    <td class="quantity">x&nbsp;<?= $producto['pedido'] ?></td>
                                                    <? $total = $producto['pedido'] * $producto['precio']; ?> 
                                                    <td class="total"><?= number_format($total, 2, ',', '.') . ' ' . $appdata['moneda'] ?></td>
                                                    <td class="remove"><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/remove-small.png" alt="Remove" title="Remove" onclick="delToCart('<?= $producto['slug'] ?>')"></td>
                                                </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="checkout">
                                    <a class="button" href="./carrito">Ver Carrito</a> 
                                </div>
                            <? } else { ?>
                                <div class="empty" style="color: black !important;">Tu carro de compra esta vacio!</div>
                            <? } ?>
                            <!--<div class="empty">Tu carro de compra esta vacio!</div>-->
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="box mobile-menu" style="display: none;">
                    <div class="box-content">
                        <div class="box-category">
                            <ul>
                                <?
                                if (isset($categorias)) {

                                    foreach ($categorias as $category) {
                                        ?>
                                        <li>
                                            <div class="menuopen"></div><a href="categoria/<?= $category['idcategoria'] ?>"><?= $category['categoria'] ?></a>
                                            <!--                                            <ul>
                                                                                            <li>
                                                                                                <a>sssd</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a>sfasfsf</a>
                                                                                            </li>
                                                                                        </ul>-->
                                        </li>
                                        <?
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="menu" class="clearfix">
                    <ul>
                        <?
                        if (isset($categorias)) {

                            foreach ($categorias as $category) {
                                ?>
                                <li>
                                    <div class="menuopen"></div><a href="categoria/<?= $category['idcategoria'] ?>"><?= $category['categoria'] ?></a>
                                    <!--                                    <div>
                                                                            <ul>
                                                                                <li>
                                                                                    <a>sssd</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a>sfasfsf</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>-->
                                </li>
                                <?
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div class="search-bar color3" <? if (isset($config->color3)) { ?>style="background-color: <?= $config->color3 ?>"<? } ?>>

                    <div id="phone">
                        <b>Busqueda</b>
                        <!--<b><?= $appdata['telefono'] ?></b>
                        <br><span><?= $appdata['email'] ?></span>-->
                    </div>
                    <form method="POST" action="./buscar<?
                    if (!$this->user->conect) {
                        echo "?ip=1";
                    }
                    ?>">
                        <div id="search">
                            <div class="search-input">
                                <input type="text" name="search" id="search-button" placeholder="Search" />
                            </div>
                            <button class="button-search" style="border: 0px;"></button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="mensaje"></div>