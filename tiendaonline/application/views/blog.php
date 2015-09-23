<style>
    .comentarios {
        background: white;
        display: block;
        height: 100px;
        width: 100%;
        color: black;
        overflow: hidden;
        overflow-y: auto;
        border-bottom: 1px solid #E6E0E0;
    }

    .coment textarea {
        height: 30px;
        max-height: 25px;
        min-height: 25px;
        float: left;
        width: calc(100% - 30px);
        max-width: calc(100% - 50px);
        min-width: calc(100% - 50px);
        padding: 0px;
        padding-top: 5px;
        margin: 0px;
        border: 0px;
        padding-left: 20px;
    }

    .coment .button {
        float: left;
        border: none;
        height: 30px;
        width: 30px;
    }

    .coment {
        height: 30px;
        position: relative;
        overflow: hidden;
    }
    .img_user {
        height: 36px;
        width: 36px;
        float: left;
        overflow: hidden;
    }

    ._usuario {
        margin-right: 2px;
    }

    ._tiempo {
        display: block;
        text-align: center;
    }

    ._coment i {
        position: absolute;
        top: 0;
        right: 0;
        display: none;
    }
    .comentarios ._coment + ._coment{
        margin-top: 5px;
    }
    ._coment {
        position: relative;
        border-bottom: 1px solid #E6E0E0;
    }

    ._coment:hover i {
        display: block;
    }

    .img_user img {
        height: 100%;
        width: 100%;
    }
    _coment-content{
        float: left;
    }
    .coment number{
        color: red;
        position: absolute;
        right: 31px;
        background: white;
        bottom: 1px;
    }
    .btn {
        width: 100% !important;
        margin: 0px !important;
        height: calc(100% - 5px) !important;
        text-align: center;
        padding: 0px !important;
        padding-top: 5px !important;
    }
    .moretimeline {
        text-align: center;
        font-size: 20px;
    }

</style>
<script>
    function timecoment(id) {

<?php
$ss = getdate();
$hora = $ss['hours'] . ':' . $ss['minutes'] . ':' . $ss['seconds'] . ' ' . $ss['year'] . '-' . $ss['mon'] . '-' . $ss['mday'];
?>
    var r = $('#newcoment' + id).val();
            var coment = '<div class="_coment d79"><div class="img_user"><a target="_" href="http://www.pkclick.com/pknetmarketing.com/profile/krondon"><img src="./images/header/logo.png"></a></div><strong class="_usuario">Alberto Toro:</strong><coment class="_comentario">' + r + '</coment><i class="icon-trash"></i><tiempo class="_tiempo"><em><?= hace_tiempo($hora . " [H:i:s Y-m-d]") ?></em></tiempo></div>';
            $.ajax({
//            async: true,
    type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "./panel/blogcoment/" + id + '/',
            data: "comentario=" + r,
            beforeSend: function() {
    $('.dd' + id).append('cargando...');
            $('#newcoment' + id).val('');
    },
            success: function(data) {
    console.log(data);
            $('.dd' + id).remove();
            $('.cm' + id).append(data + '<div class="dd' + id + '"></div>');
//                $('.dd' + id).append(data);
            $('.cm' + id).scrollTop(99999);
            $('#newcoment' + id).focus();
    }

    });
//        console.log('aqui');
    }
    function  character(id) {
//        console.log(id);
    var r = $('#newcoment' + id).val().length;
            var max = 255;
            $('#number' + id).html((max - r));
            if (r > max) {
    $('#number' + id).css('color', 'red');
            $('#btn' + id).prop('disabled', true);
            $('#btn' + id).css('background-color', '#AAA');
    } else {
    $('#number' + id).css('color', 'green');
            $('#btn' + id).prop('disabled', false);
            $('#btn' + id).css('background-color', '#6cbe42');
    }
    }
//        console.log(r);
    function deletecoment(id) {
    $.ajax({
//            async: true,
    type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "./panel/blogcomentdel/" + id + '/',
//            data: "comentario=" + r,
            beforeSend: function() {
    $('.d' + id).html('Eliminando...');
    },
            success: function(data) {
    if (data) {
    $('.d' + id).html(data);
    } else {
    $('.d' + id).remove();
    }
    }
    });
    }
    $('.d' + id).load('./panel/blogcomentdel/' + id);
            function showmore(desde) {
            console.log('aqui');
                    $.ajax({
            type: "POST",
                    dataType: "html",
                    contentType: "application/x-www-form-urlencoded",
<?php if ($this->user->conect) { ?>
                url: "./panel/blogmore/" + desde + '/',
<?php } else { ?>
                url: "./panel/blogmore/" + desde + '/?ip=1',
<?php } ?>
//            data: "comentario=" + r,
            beforeSend: function() {
            $('.moretimeline').html('cargando...');
            },
                    success: function(data) {
            console.log(data);
                    $('.moretimeline').remove();
//                $('.moretimeline').html(data);
                    $('#content').append(data);
//                $('.dd' + id).append(data);
//                $('#newcoment' + id).focus();
            }
            });
            }
</script>
<?
//$ss = getdate();
//$hora = $ss['hours'] . ':' . $ss['minutes'] . ':' . $ss['seconds'] . ' ' . $ss['year'] . '-' . $ss['mon'] . '-' . $ss['mday'];
//echo $hora;
//echo "<br>";
//echo hace_tiempo($hora . " [H:i:s Y-m-d]");
//echo "<br>";
//debug($ss);
?>
<div id="content">  
    <div class="clear"></div>
    <? if (isset($mensaje)) { ?>
        <div class="warning"><?= $mensaje ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } if (isset($msj)) { ?>
        <div class="success"><?= $msj ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } ?>
    <? if (isset($timeline) && $timeline) { ?>
        <div class="breadcrumb">    <a href="./">Inicio</a>
            &raquo; <a href="./blog"><?= $appdata['nombre2'] ?></a>
        </div>
        <h1><?= $appdata['nombre2'] ?></h1>
        <?
        foreach ($timeline as $public) {
            if ($public['type'] > 0) {
                ?>
                <div class="product-info">
                    <div  <div class="left">
                            <div class="image"><a href="https://www.pkclick.com/imagenescarrito/<?= $public['image'] ?>" title="Proyecto Kamila" id="zoom01" class="cloud-zoom" rel="position:'right', zoomWidth:320, zoomHeight:320, adjustX:10, adjustY:0, tint:'#FFFFFF', showTitle:false, softFocus:1, smoothMove:5, tintOpacity:0.8"><img width="320" height="320" src="https://www.pkclick.com/imagenescarrito/<?= $public['image'] ?>" title="Proyecto Kamila" alt="Proyecto Kamila" id="image" /></a></div>
                            <? /* ?>
                              <div class="image-additional gallery">
                              <a href="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" rel="useZoom: 'zoom01', smallImage: 'https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>'" class="cloud-zoom-gallery"><img width="102" height="102" class="fade-image" src="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" alt="<?= $producto['nombre'] ?>" /></a>
                              <? foreach ($imagenes as $img) { ?>
                              <a href="https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>" title="<?= $producto['nombre'] ?>" rel="useZoom: 'zoom01', smallImage: 'https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>'" class="cloud-zoom-gallery"><img width="102" height="102" class="fade-image" src="https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>" title="<?= $producto['nombre'] ?>" alt="<?= $producto['nombre'] ?>" /></a>
                              <? } ?>
                              <div class="clear"></div>
                              </div>
                              <? */ ?>
                        </div>
                        <div class="right">
                            <div class="breadcrumb">
                                <a href="./">Inicio</a> &raquo; <a href="./blog/<?= $public['id'] ?>">Ver</a>
                                <?
//                $d = "2014-12-02 10:38:45";
                                $d = explode(" ", $public['date']);
                                ?>
                                &raquo; <a><?= hace_tiempo($d[1] . " " . $d[0] . " [H:i:s Y-m-d]"); ?></a>
                            </div>
                            <div class="product-info-buttons">
                                <p style="color: white;font-size: 17px;text-align: justify;margin: 0px;"><?= add_href_url($public['coment']) ?></p>
                            </div>
                            <div class="product-info-buttons">
                                <div class="comentarios cm<?= $public['id'] ?>">
                                    <? foreach ($public['comentarios'] as $pos => $coment) { ?>
                                        <div class="_coment d<?= $coment['idcomentario'] ?>">
                                            <div class="img_user">
                                                <a target="_blank" href="http://www.pkclick.com/pknetmarketing.com/images/<?= $coment['image'] ?>">
                                                    <img src="http://www.pkclick.com/pknetmarketing.com/images/<?= $coment['image'] ?>">
                                                </a>
                                            </div>
                                            <strong class="_usuario">
                                                <?= $coment['name'] ?>
                                            </strong>
                                            <coment class="_comentario">
                                                <?= add_href_url($coment['comentario']) ?>
                                            </coment>
                                            <? if ($this->user->conect) { ?>
                                                <? if ($this->user->information->id == $coment['user']) { ?>
                                                    <a onclick="deletecoment(<?= $coment['idcomentario'] ?>)" title="Eliminar Comentario"><i class="icon-trash"></i></a>
                                                <? } ?>
                                            <? } ?>
                                            <tiempo class="_tiempo">
                                                <em>
                                                    <?
                                                    $h = explode(" ", $coment['fecha']);
                                                    echo hace_tiempo($h[1] . " " . $h[0] . " [H:i:s Y-m-d]");
                                                    ?>
                                                </em>
                                            </tiempo>
                                        </div>
                                    <? } ?>
                                    <div class="dd<?= $public['id'] ?>"></div>
                                </div>
                                <div class="coment">
                                    <? if ($this->user->conect) { ?>
                                        <textarea onsubmit="timecoment(<?= $public['id'] ?>)" id="newcoment<?= $public['id'] ?>" placeholder="Escriba Aquí" onkeypress="character(<?= $public['id'] ?>)"></textarea>
                                        <number id="number<?= $public['id'] ?>">255</number>
                                        <button class="button" id="btn<?= $public['id'] ?>" onclick="timecoment(<?= $public['id'] ?>)"><i class="icon-comment"></i>
                                            <!--Comentar-->
                                        </button>
                                    <? } else { ?>
                                        <a href="./login" class="button btn">
                                            Conectate para comentar
                                            <!--<i class="icon-comment"></i>-->
                                        </a>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
                }
            }
            ?>
            <div class="moretimeline" onclick="showmore(2);"><a>Ver Más</a></div>
        <? } ?>
    <? if (isset($detail) && $detail) { ?>
        <div class="breadcrumb">    <a href="./">Inicio</a>
            &raquo; <a href="./blog"><?= $appdata['nombre2'] ?></a>
        </div>
        <h1><?= $appdata['nombre2'] ?></h1>
        <?
        foreach ($detail as $public) {
            if ($public['type'] > 0) {
                ?>
                <div class="product-info">
                    <div  <div class="left">
                            <div class="image"><a href="https://www.pkclick.com/imagenescarrito/<?= $public['image'] ?>" title="Proyecto Kamila" id="zoom01" class="cloud-zoom" rel="position:'right', zoomWidth:320, zoomHeight:320, adjustX:10, adjustY:0, tint:'#FFFFFF', showTitle:false, softFocus:1, smoothMove:5, tintOpacity:0.8"><img width="320" height="320" src="https://www.pkclick.com/imagenescarrito/<?= $public['image'] ?>" title="Proyecto Kamila" alt="Proyecto Kamila" id="image" /></a></div>
                            <? /* ?>
                              <div class="image-additional gallery">
                              <a href="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" rel="useZoom: 'zoom01', smallImage: 'https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>'" class="cloud-zoom-gallery"><img width="102" height="102" class="fade-image" src="https://www.pkclick.com/imagenescarrito/<?= $producto['imagen'] ?>" title="<?= $producto['nombre'] ?>" alt="<?= $producto['nombre'] ?>" /></a>
                              <? foreach ($imagenes as $img) { ?>
                              <a href="https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>" title="<?= $producto['nombre'] ?>" rel="useZoom: 'zoom01', smallImage: 'https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>'" class="cloud-zoom-gallery"><img width="102" height="102" class="fade-image" src="https://www.pkclick.com/imagenescarrito/<?= $img['nombre_img'] ?>" title="<?= $producto['nombre'] ?>" alt="<?= $producto['nombre'] ?>" /></a>
                              <? } ?>
                              <div class="clear"></div>
                              </div>
                              <? */ ?>
                        </div>
                        <div class="right">
                            <div class="breadcrumb">
                                <a href="./">Inicio</a> &raquo; <a href="./blog">Volver</a>
                                <?
//                $d = "2014-12-02 10:38:45";
                                $d = explode(" ", $public['date']);
                                ?>
                                &raquo; <a><?= hace_tiempo($d[1] . " " . $d[0] . " [H:i:s Y-m-d]"); ?></a>
                            </div>
                            <div class="product-info-buttons">
                                <p style="color: white;font-size: 17px;text-align: justify;margin: 0px;"><?= add_href_url($public['coment']) ?></p>
                            </div>
                            <div class="product-info-buttons">
                                <div class="comentarios cm<?= $public['id'] ?>">
                                    <? foreach ($public['comentarios'] as $pos => $coment) { ?>
                                        <div class="_coment d<?= $coment['idcomentario'] ?>">
                                            <div class="img_user">
                                                <a target="_blank" href="http://www.pkclick.com/pknetmarketing.com/images/<?= $coment['image'] ?>">
                                                    <img src="http://www.pkclick.com/pknetmarketing.com/images/<?= $coment['image'] ?>">
                                                </a>
                                            </div>
                                            <strong class="_usuario">
                                                <?= $coment['name'] ?>
                                            </strong>
                                            <coment class="_comentario">
                                                <?= add_href_url($coment['comentario']) ?>
                                            </coment>
                                            <? if ($this->user->conect) { ?>
                                                <? if ($this->user->information->id == $coment['user']) { ?>
                                                    <a onclick="deletecoment(<?= $coment['idcomentario'] ?>)" title="Eliminar Comentario"><i class="icon-trash"></i></a>
                                                <? } ?>
                                            <? } ?>
                                            <tiempo class="_tiempo">
                                                <em>
                                                    <?
                                                    $h = explode(" ", $coment['fecha']);
                                                    echo hace_tiempo($h[1] . " " . $h[0] . " [H:i:s Y-m-d]");
                                                    ?>
                                                </em>
                                            </tiempo>
                                        </div>
                                    <? } ?>
                                    <div class="dd<?= $public['id'] ?>"></div>
                                </div>
                                <div class="coment">
                                    <? if ($this->user->conect) { ?>
                                        <textarea onsubmit="timecoment(<?= $public['id'] ?>)" id="newcoment<?= $public['id'] ?>" placeholder="Escriba Aquí" onkeypress="character(<?= $public['id'] ?>)"></textarea>
                                        <number id="number<?= $public['id'] ?>">255</number>
                                        <button class="button" id="btn<?= $public['id'] ?>" onclick="timecoment(<?= $public['id'] ?>)"><i class="icon-comment"></i>
                                            <!--Comentar-->
                                        </button>
                                    <? } else { ?>
                                        <a href="./login" class="button btn">
                                            Conectate para comentar
                                            <!--<i class="icon-comment"></i>-->
                                        </a>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
                }
            }
            ?>
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