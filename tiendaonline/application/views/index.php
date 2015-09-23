<style>
    .mini-sliders > .product_view{
        opacity: 1;
        transition: 0.3s all ease-in-out;
    }
    .mini-sliders > .product_view:hover{
        opacity: 0.6;
    }
</style>
<div id="notification"></div>
<div id="content">
    <div class="clear"></div>
    <? if (isset($mensaje)) { ?>
        <div class="warning"><?= $mensaje ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } if (isset($msj)) { ?>
        <div class="success"><?= $msj ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } ?>
    <? if (isset($banners) && ($banners)) { ?>
        <div class="flexslider">
            <ul class="slides">
                <? foreach ($banners as $key => $banner) { ?>
                    <li style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;" class="">
                        <div class="imagen" style="height: 347px; background-size: cover; background-image: url('http://www.pkclick.com/imagenescarrito/banner/<?= $banner['imagen'] ?>')">
                            <div class="contentbanner" style="float: right;width: 50%;height: 100%;">
                                <? if (isset($banner['title']) && ($banner['title'])) { ?>
                                    <h1 class="title" style="color: <?= $banner['color'] ?>; margin-top: 15%;font-weight: bold;font-size: 36px;line-height: 0.9;">
                                        <?= $banner['title'] ?>
                                    </h1>
                                <? } ?>
                                <? if (isset($banner['text']) && ($banner['text'])) { ?>
                                    <p class="text" style="margin-top: 17px; margin-left: 5px; font-weight: bold; color: <?= $banner['color'] ?>;">
                                        <?= $banner['text'] ?>
                                    </p>
                                <? } ?>
                                <? if (isset($banner['link']) && ($banner['link'])) { ?>
                                    <a href="<?= $banner['link'] ?>" target="_BLANK" class="button" style="padding: 13px;font-size: 20px;float: right;min-width: 135px;text-align: center;margin-left: 4px;margin-top: -3px;">
                                        <?= $banner['button'] ?>
                                    </a>
                                <? } ?>
                            </div>
                        </div>
                        <!--<a href="index.php?route=product/product&amp;path=20&amp;product_id=43"><img src="image/data/slider2.jpg" alt="Slider 2"></a>-->
                    </li>
                <? } ?>
            </ul>
            <ul class="flex-direction-nav">
                <li><a class="flex-prev" href="#">Previous</a></li>
                <li><a class="flex-next" href="#">Next</a></li>
            </ul>
        </div>
        <? if (isset($destacados) && $destacados) { ?>
            <div class="mini-sliders">
                <div class="product_view" onclick="window.location = './producto/<?= $destacados[0]['slug'] ?>';" style="height: 171px;margin-bottom: 6px;overflow: hidden;background-color: <? if (isset($config->color2)) { ?><?= $config->color2 . ';' ?><? } else { ?>#ffaa31;<? } ?>">
                    <div class="product_view_content" style="width: calc(50% - 20px);height: 151px;float: left;overflow: hidden;color: white;padding: 10px;">
                        <p class="text" style="margin-top: 10%;margin-bottom: 10px;"><?= $destacados[0]['nombre'] ?></p>
                        <h2 class="price" style="color: white;font-weight: bold;"><?= $destacados[0]['precio'] ?> <?= $appdata['moneda'] ?></h2>
                        <a class="button" href="./producto/<?= $destacados[0]['slug'] ?>" style="width: 25px;text-align: center;font-size: 12px;margin: 0 auto;">Ver</a>
                    </div>
                    <div class="product_view_img" style="height: 143px;width: calc(50% - 10px);float: left;padding-top: 5%;overflow: hidden;padding-bottom: 5%; padding-right: 10px; text-align: center;">
                        <img src="https://www.pkclick.com/imagenescarrito/small/<?= $destacados[0]['imagen'] ?>" alt="<?= $productos[0]['nombre'] ?>" style="max-height: 100%; max-width: 100%;"/>
                    </div>
                </div>
                <div class="product_view" onclick="window.location = './producto/<?= $destacados[1]['slug'] ?>';" style="height: 171px;margin-bottom: 6px;overflow: hidden; background-color: <? if (isset($config->color4)) { ?><?= $config->color4 . ';' ?><? } else { ?>#58bae9;<? } ?>">
                    <div class="product_view_img" style="height: 143px;width: calc(50% - 10px);float: left;padding-top: 5%;overflow: hidden;padding-bottom: 5%; padding-left: 10px; text-align: center;">
                        <img src="https://www.pkclick.com/imagenescarrito/small/<?= $destacados[1]['imagen'] ?>" alt="<?= $destacados[1]['nombre'] ?>" style="max-height: 100%; max-width: 100%;"/>
                    </div>
                    <div class="product_view_content" style="width: calc(50% - 20px);height: 151px;float: left;overflow: hidden;color: white;padding: 10px;text-align: right;">
                        <p class="text" style="margin-top: 10%;margin-bottom: 10px;"><?= $destacados[1]['nombre'] ?></p>
                        <h2 class="price" style="color: white;font-weight: bold;"><?= $destacados[1]['precio'] ?> <?= $appdata['moneda'] ?></h2>
                        <a class="button" href="./producto/<?= $destacados[1]['slug'] ?>" style="width: 25px;text-align: center;font-size: 12px;margin: 0 auto;">Ver</a>
                    </div>
                </div>
            <!--<a href="index.php?route=product/category&amp;path=20"><img class="fade-image" src="image/data/minislider2.jpg" alt="Slider 2 mini" style="opacity: 1;"></a>-->
                <!--<a href="index.php?route=product/category&amp;path=20"><img class="fade-image" src="image/data/minislider1.jpg" alt="Slider 1 mini" style="opacity: 1;"></a>-->
                <style type="text/css">
                    .flexslider {
                        width:690px;float:left;
                    }
                </style>
            </div>
        <? } ?>
    <? } ?>
    <div class="clear"></div>
    <script type="text/javascript">
            $(document).ready(function() {

                $('.flexslider').flexslider({
                    animation: "fade",
                    controlNav: false,
                    directionNav: true,
                    start: function(slider) {
                    }
                });
            });
    </script>
    <div class="clear"></div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".caruofredsel-featured").carouFredSel({
                infinite: false,
                auto: false,
                width: "100%",
                prev: {
                    button: ".navigate-featured .prev",
                    key: "left"
                },
                next: {
                    button: ".navigate-featured .next",
                    key: "right"
                }
                , swipe: {
                    onTouch: false,
                    onMouse: false
                }
                , onCreate: function(data) {
                    $(this).css("height", "auto");
                }
            })
        });
    </script>
    <div class="box">
        <? if (isset($productos)) { ?>
            <div class="box-heading">Productos<div class="navigate navigate-latest"><div class="prev"></div><div class="next"></div></div></div>
            <div class="clear"></div>
            <div class="box-content">
                <div class="box-product caruofredsel caruofredsel-latest">
                    <? foreach ($productos as $producto) {
                        ?>
                        <div class="box-product-item">
                            <div class="view-first">
                                <div class="view-content">  
                                    <div class="image">
                                        <a href="./producto/<?= $producto['slug'] ?>">
                                            <img src="https://www.pkclick.com/imagenescarrito/small/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" style="max-height: 100%;max-width: 100%;" />
                                        </a>
                                    </div>
                                    <div class="bottom-block">
                                        <div class="name">
                                            <a href="./producto/<?= $producto['slug'] ?>"><?= $producto['nombre'] ?></a>
                                        </div>
                                        <div class="link-cart"<?
                                        if ($this->user->conect) {
                                            echo " onclick=\"addToCart('" . $producto['slug'] . "');\"";
                                        } else {
                                            echo ' onclick=\'url = "./login"; $(location).attr("href",url);\'';
                                        }
                                        ?> >Carrito</div>
                                        <div class="price">
                                            <?= number_format($producto['precio'], 2, ',', '.') . ' ' . $appdata['moneda'] ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="slide-block"><div class="image-rating"></div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
            <div class="clear"></div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".caruofredsel-latest").carouFredSel({
                        infinite: false,
                        auto: false,
                        width: "100%",
                        prev: {
                            button: ".navigate-latest .prev",
                            key: "left"
                        },
                        next: {
                            button: ".navigate-latest .next",
                            key: "right"
                        }
                        , swipe: {
                            onTouch: false,
                            onMouse: false
                        }
                        , onCreate: function(data) {
                            $(this).css("height", "auto");
                        }
                    })
                });
            </script>
        <? } ?>
        <h1 style="display: none;">PkClick</h1>
    </div>
</div>