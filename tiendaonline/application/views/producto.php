<div id="content">  
    <div class="clear"></div>
    <? if (isset($mensaje)) { ?>
        <div class="warning"><?= $mensaje ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } if (isset($msj)) { ?>
        <div class="success"><?= $msj ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } ?>
    <? if (isset($producto) && $producto) { ?>
        <div class="breadcrumb">    <a href="./">Inicio</a>
            &raquo; <a href="./producti/<?= $producto['slug'] ?>">Producto: <?= $producto['nombre'] ?></a>
        </div>
        <h1><?= $producto['nombre'] ?></h1>
        <div class="product-info">
            <div class="left">
                <div class="image"><a href="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" id="zoom01" class="cloud-zoom" rel="position:'right', zoomWidth:320, zoomHeight:320, adjustX:10, adjustY:0, tint:'#FFFFFF', showTitle:false, softFocus:1, smoothMove:5, tintOpacity:0.8"><img width="320" height="320" src="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" alt="<?= $producto['nombre'] ?>" id="image" /></a></div>
                <div class="image-additional gallery">
                    <a href="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" rel="useZoom: 'zoom01', smallImage: 'https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>'" class="cloud-zoom-gallery"><img width="102" height="102" class="fade-image" src="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" alt="<?= $producto['nombre'] ?>" /></a>
                    <? foreach ($imagenes as $img) { ?>
                        <a href="https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>" title="<?= $producto['nombre'] ?>" rel="useZoom: 'zoom01', smallImage: 'https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>'" class="cloud-zoom-gallery"><img width="102" height="102" class="fade-image" src="https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>" title="<?= $producto['nombre'] ?>" alt="<?= $producto['nombre'] ?>" /></a>
                    <? } ?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="right">
                <div class="breadcrumb">
                    <a href="./">Inicio</a>
                    &raquo; <a href="./producto/<?= $producto['slug'] ?>"><?= $producto['nombre'] ?></a>
                </div>
                <div class="price"><b>Precio:</b>
                    <?= number_format($producto['precio'], 2, ',', '.') . ' ' . $appdata['moneda'] ?>               
                    <br><span class="price-tax">Cantidad: <?= $producto['cantidad'] ?></span>
                    <br />
                </div>
                <!--            <div class="description">
                                <span>Brand:</span> <a href="index98fa.html?route=product/manufacturer/info&amp;manufacturer_id=8">Apple</a><br />
                                <span>Product Code:</span> product 11<br />
                                <span>Availability:</span> In Stock
                            </div>-->
                <div class="product-info-buttons">
                    <div class="input-qty"><span>Cantidad:</span>
                        <input type="number" name="cantidad" id="cantidad" min="1" max="<?= $producto['cantidad'] ?>" size="2" value="1" />
    <!--                    <input type="hidden" name="product_id" size="2" value="40" />-->
                    </div><a class="button" id="button-cart" <?
                    if ($this->user->conect) {
                        echo "onclick=\"addToCart('" . $producto['slug'] . "');\"";
                    } else {
                        echo 'onclick=\'url = "./login"; $(location).attr("href",url);\'';
                    }
                    ?>>Carrito</a> 
                </div>
                <!--            <div class="review">
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_pinterest_large' displayText='Pinterest'></span>
                                <span class='st_plusone_large' displayText='Google +1'></span>
                            </div>-->
            </div>

        </div>
        <div id="tabs" class="htabs">
            <? if (isset($producto['descripcion'])) { ?>
                <a href="#tab-description">Descripción</a>
            <? } ?>
            <? if (!empty($producto['terminos'])) { ?>
                <a href="#tab-review">T&eacute;rminos</a>
    <? } ?>
        </div>
        <div id="tab-description" class="tab-content">
            <p class="intro">
                <? if (isset($producto['descripcion'])) { ?>
        <?= $producto['descripcion'] ?>
    <? } ?>
            </p>
        </div>
        <div id="tab-review" class="tab-content">
            <p class="intro">
                <? if (isset($producto['terminos'])) { ?>
        <?= $producto['terminos'] ?>
        <? } ?>
            </p>
        </div>
<? } ?>
</div>

<script type="text/javascript"><!--
$('#review .pagination a').live('click', function() {
        $('#review').fadeOut('slow');

        $('#review').load(this.href);

        $('#review').fadeIn('slow');

        return false;
    });

    $('#review').load('index0845.html?route=product/product/review&amp;product_id=40');

    $('#button-review').bind('click', function() {
        $.ajax({
            url: 'index.php?route=product/product/write&product_id=40',
            type: 'post',
            dataType: 'json',
            data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
            beforeSend: function() {
                $('.success, .warning').remove();
                $('#button-review').attr('disabled', true);
                $('#review-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> Please Wait!</div>');
            },
            complete: function() {
                $('#button-review').attr('disabled', false);
                $('.attention').remove();
            },
            success: function(data) {
                if (data['error']) {
                    $('#review-title').after('<div class="warning">' + data['error'] + '</div>');
                }

                if (data['success']) {
                    $('#review-title').after('<div class="success">' + data['success'] + '</div>');

                    $('input[name=\'name\']').val('');
                    $('textarea[name=\'text\']').val('');
                    $('input[name=\'rating\']:checked').attr('checked', '');
                    $('input[name=\'captcha\']').val('');
                }
            }
        });
    });
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
if ($.browser.msie && $.browser.version == 6) {
        $('.date, .datetime, .time').bgIframe();
    }

    $('.date').datepicker({dateFormat: 'yy-mm-dd'});
    $('.datetime').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'h:m'
    });
    $('.time').timepicker({timeFormat: 'h:m'});


    $(document).ready(function() {


        $('#zoom01, .cloud-zoom-gallery').CloudZoom();


    });
//--></script>