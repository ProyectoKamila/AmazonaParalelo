<script>
    $('#search-button').val('<?= $buscado ?>');
</script>

<div id="content">  
    <div class="breadcrumb">    <a href="./">Inicio</a>
        &raquo; <a href="./">Buscado: <?= $buscado ?></a>
    </div>
    <? if (isset($mensaje)) { ?>
        <div class="warning"><?= $mensaje ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } if (isset($msj)) { ?>
        <div class="success"><?= $msj ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } ?>

    <h1>Buscado - <?= $buscado ?></h1>
    <form method="POST" action="./buscar<?
    if (!$this->user->conect) {
        echo "?ip=1";
    }
    ?>">
        <div class="content clearfix">
            <p>
                Buscar:
                <input type="text" name="search" value="<?= $buscado ?>">
            </p>
            <input type="checkbox" <?
            if (isset($_POST['descripcion']) && ($_POST['descripcion'] == 1)) {
                echo "checked=''";
            }
            ?> name="descripcion" value="1" id="description">
            <label for="description">Buscar en la descripción del producto</label>
        </div>
        <div class="buttons">
            <div class="right">
                <input type="submit" value="Buscar" class="button" required="">
            </div>
        </div>
    </form>
    <div class="product-filter clearfix">
        <div class="display">
            <b>Mostrar:</b> <a title="List" class="list-switch active"></a>
            <a class="grid-switch" title="Grid" onclick="display('grid');"></a>
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
<script type="text/javascript">
    function Mostrar(view) {
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
</script> 
<script type="text/javascript">

    $('#content input[name=\'search\']').keydown(function(e) {
        if (e.keyCode == 13) {
            $('#button-search').trigger('click');
        }
    });

    $('select[name=\'category_id\']').bind('change', function() {
        if (this.value == '0') {
            $('input[name=\'sub_category\']').attr('disabled', 'disabled');
            $('input[name=\'sub_category\']').removeAttr('checked');
        } else {
            $('input[name=\'sub_category\']').removeAttr('disabled');
        }
    });

    $('select[name=\'category_id\']').trigger('change');

    $('#button-search').bind('click', function() {
        url = 'index.php?route=product/search';

        var search = $('#content input[name=\'search\']').attr('value');

        if (search) {
            url += '&search=' + encodeURIComponent(search);
        }

        var category_id = $('#content select[name=\'category_id\']').attr('value');

        if (category_id > 0) {
            url += '&category_id=' + encodeURIComponent(category_id);
        }

        var sub_category = $('#content input[name=\'sub_category\']:checked').attr('value');

        if (sub_category) {
            url += '&sub_category=true';
        }

        var filter_description = $('#content input[name=\'description\']:checked').attr('value');

        if (filter_description) {
            url += '&description=true';
        }

        location = url;
    });


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
</script>