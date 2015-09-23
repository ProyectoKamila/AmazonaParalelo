<div id="content">  
    <div class="breadcrumb">    <a href="./">Inicio</a>
        &raquo; <a href="./categoria/<?= $idcat ?>"><?= $namecat ?></a>
    </div>
    <div class="product-filter clearfix">
        <div class="display">
            <b>Mostrar:</b> <a title="List" class="list-switch active"></a>
            <a class="grid-switch" title="Grid" onclick="display('grid');"></a>
            <a href="index6431.html?route=product/compare" id="compare-total">Product Compare (0)</a>
        </div>
    </div>
    <div class="product-grid box-product" style="display:none;">
        <?
        if (isset($productos)) {
            foreach ($productos as $producto) {
                ?>
                <div class="box-product-item">
                    <div class="view-first">
                        <div class="view-content">  
                            <div class="image">
                                <a href="./producto/<?= $producto['slug'] ?>">
                                    <img src="https://www.pkclick.com/imagenescarrito/small/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" height="188" width="188"/>
                                </a>
                            </div>
                            <div class="bottom-block">
                                <div class="name">
                                    <a href="./producto/<?= $producto['slug'] ?>"><?= $producto['nombre'] ?></a>
                                </div>
                                <div class="link-cart" onclick="addToCart('<?= $producto['slug'] ?>');">Carrito</div>
                                <div class="price">
                                    <?= number_format($producto['precio'], 2, ',', '.') . ' ' . $appdata['moneda'] ?>
                                </div>
                            </div>
                        </div>

                        <div class="slide-block"><div class="image-rating"></div>
                        </div>
                    </div>
                </div>
                <?
            }
        }
        ?>
    </div>


    <div class="product-list box-product">
        <?
        if (isset($productos)) {
            foreach ($productos as $producto) {
                ?>
                <div class="list-product-item">

                    <div class="left-block">
                        <div class="image">
                            <a href="./producto/<?= $producto['slug'] ?>">
                                <img class="fade-image" src="https://www.pkclick.com/imagenescarrito/small/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" height="188" width="188"/>
                            </a>
                        </div>
                    </div>

                    <div class="center-block">
                        <div class="list-name"><a href="./producto/<?= $producto['slug'] ?>"><?= $producto['nombre'] ?></a></div>


                        <div class="description">
                            <?= $producto['descripcion'] ?>
                        </div>

                        <!--                        <div class="btn-product clearfix">
                                                    <div class="btn-wish" onclick="addToWishList('48');">Add to Wish List</div>
                                                    <div class="btn-compare" onclick="addToCompare('48');">Add to Compare</div>
                                                </div>-->
                    </div>

                    <div class="right-block">

                        <div class="list-price">
                            <?= number_format($producto['precio'], 2, ',', '.') . ' ' . $appdata['moneda'] ?>
                        </div>
                        <div class="btn-cart"><a class="button" <? if ($this->user->conect) {
                                            echo "onclick=\"addToCart('" . $producto['slug'] . "');\"";
                                        } else {
                                            echo 'onclick=\'url = "./login"; $(location).attr("href",url);\'';
                                        }?>>Carrito</a></div>
                        <div class="list-image-rating"></div>

                    </div>

                    <div class="clear"></div>
                </div>
                <?
            }
        }
        ?>
    </div>




    <!--<div class="pagination"><div class="links"> <b>1</b>  <a href="indexf341.html?route=product/category&amp;path=20&amp;page=2">2</a>  <a href="indexf341.html?route=product/category&amp;path=20&amp;page=2">&gt;</a> <a href="indexf341.html?route=product/category&amp;path=20&amp;page=2">&gt;|</a> </div><div class="results">Showing 1 to 9 of 13 (2 Pages)</div></div>-->
</div>
<script type="text/javascript"><!--
function display(view) {
        if (view == 'list') {
            $('.product-grid').css('display', 'none');
            $('.product-list').css('display', 'inline');

            $('.display').html('<b>Mostrar:</b> <a title="List" class="list-switch active"></a><a class="grid-switch" title="Grid" onclick="display(\'grid\');"></a>');

            $.cookie('display', 'list');
        } else {
            $('.product-list').css('display', 'none');
            $('.product-grid').css('display', 'inline');

            $('.display').html('<b>Mostrar:</b> <a class="list-switch" title="List" onclick="display(\'list\');"></a><a class="grid-switch active" title="Grid" ></a>');

            $.cookie('display', 'grid');
        }
    }

    view = $.cookie('display');

    if (view) {
        display(view);
    } else {
        display('list');
    }
//--></script> 