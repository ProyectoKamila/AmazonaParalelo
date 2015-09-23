<script>
    function expand(id) {
        $('.pedido-content-' + id).slideToggle();
        $('.pedido-content-' + id).html('Cargando...');
        $('.pedido-content-' + id).load('./panel/pedido/' + id);
        $('.ver-' + id).attr({onclick: 'closeexpand(' + id + ');'});
        $('.ver-' + id).html('Cerrar «');
    }
    function closeexpand(id) {
        $('.pedido-content-' + id).slideToggle();
        $('.ver-' + id).attr({onclick: 'closeexpand(' + id + ');'});
        if ($('.ver-' + id).html() === 'ver »') {
            $('.ver-' + id).html('Cerrar «');
        } else {
            $('.ver-' + id).html('ver »');
        }
    }
</script>
<div id="content">  
    <div class="breadcrumb">
        <a href="./">Inicio</a>
        » <a href="./carrito">Carro de Compra</a>
        » <a href="./pedidos">Pedidos</a>
    </div>
    <? if (isset($mensaje)) { ?>
        <div class="warning"><?= $mensaje ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } if (isset($msj)) { ?>
        <div class="success"><?= $msj ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } ?>
    <h1>Pedidos</h1>
    <div class="checkout">
        <? foreach ($pedidos as $p) { ?>
            <?
            // debug($p); 
            if ($p['date_neo']) {
                $s = explode(' ', $p['date_neo']);
                $p['date_neo'] = $s[0];
            }
            ?>
            <div id="checkout">
                <!--<div class="checkout-heading"><span>Pedido #<?= $p['id'] ?> Total: <?= number_format($p['total'], 2, ',', '.'); ?>  Pagado con Neopago (Nº Referencia: 313513, Nº Confirmacion: 565165, Fecha de pago: 2014-11-13)</span><a class="ver-<?= $p['id'] ?>" onclick="expand(<?= $p['id'] ?>)">Ver »</a></div>-->
                <div class="checkout-heading"><span>Pedido #<?= $p['id'] ?> Total: <?= number_format($p['total'], 2, ',', '.'); ?>  <? if ($p['estatus_neo']) { ?>Pagado con Neopago(Nº Referencia: <?= $p['numeroreferencia'] ?>, Nº Confirmaci&oacute;n: <?= $p['numeroconfirmacion'] ?>, Fecha de pago: <?= $p['date_neo'] ?>)<? } ?></span><a class="ver-<?= $p['id'] ?>" onclick="expand(<?= $p['id'] ?>)">Ver »</a></div>

                <div class="checkout-content pedido-content-<?= $p['id'] ?>"></div>
            </div>
<? } ?>
    </div>
</div>