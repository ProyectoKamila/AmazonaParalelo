<?
// debug($formulario);                     
require_once ('./mercadopago/lib/mercadopago.php');
$mp = new MP('2559493792267909', 'v1HkHBPvQ9ELOUBLtxoOvauunrVmDxVt');
$mp->sandbox_mode(TRUE);
$tot = $total;
?>
<div id="content">  <div class="breadcrumb">
        <a href="./">Inicio</a>
        » <a href="./carrito">Carro de Compra</a>
    </div>
    <? if (isset($mensaje)) { ?>
        <div class="warning"><?= $mensaje ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } if (isset($msj)) { ?>
        <div class="success"><?= $msj ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } ?>
    <? if (isset($prodcar)) { ?>
        <!--<form action="./carrito" method="post" enctype="multipart/form-data">-->
        <div class="cart-info">
            <table>
                <thead>
                    <tr>
                        <td class="image">Imagen</td>
                        <td class="name">Nombre</td>
                        <td class="model">Disponibles</td>
                        <td class="quantity">Cantidad</td>
                        <td class="price">Precio Unitario</td>
                        <td class="total">Total</td>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($prodcar as $producto) { ?>
                        <tr class="<?= $producto['slug'] ?>">
                            <td class="image">
                                <a href="./producto/<?= $producto['slug'] ?>">
                                    <img style="max-height: 47px; max-width: 47px;" src="https://www.pkclick.com/imagenescarrito/small/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" title="<?= $producto['nombre'] ?>">
                                </a>
                            </td>
                            <td class="name">
                                <a href="./producto/<?= $producto['slug'] ?>"><?= $producto['nombre'] ?></a>
                                <div>
                                </div>
                                <!--<small>Reward Points: 600</small>-->
                            </td>
                            <td class="model"><?= $producto['disponible'] ?></td>
                            <td class="quantity">
                                <input type="number" name="cantidad" class="n<?= $producto['slug'] ?>" onkeypress="return justNumbers(event);" value="<?= $producto['pedido'] ?>" size="1" min="1" max="<?= $producto['disponible'] ?>">
                                &nbsp;
                                <input type="image" onclick="
                                        addToCart('<?= $producto['slug'] ?>', 1);" src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/update.png" alt="Update" title="Update">
                                &nbsp;
                                <a href="javascript:delToCart('<?= $producto['slug'] ?>')"><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/remove.png" alt="Remove" title="Remove">
                                </a>
                            </td>
                            <td class="price"><?= number_format($producto['precio'], 2, ',', '.') . ' ' . $appdata['moneda']; ?></td>
                            <? $saldo = $producto['precio'] * $producto['pedido']; ?>
                            <td class="total"><?= number_format($saldo, 2, ',', '.') . ' ' . $appdata['moneda']; ?></td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
        </div>
        <!--</form>-->
        <div class="cart-total">
            <table id="total">
                <tbody>
                    <tr>
                        <td class="right"><b>Total:</b></td>
                        <td class="right"><?= number_format($total, 2, ',', '.'); ?> <?= $appdata['moneda'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="buttons">
            <div class="right"><a href="./check/<?= $idpedido; ?>" class="button">Chequear <? // $idpedido                            ?></a></div>
            <div class="center"><a href="./" class="button">Continuar Comprando</a></div>
        </div>
        <h2>Deseas pagar en este momento?</h2>
        <div class="content">
            <!--<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>-->
            <table class="radio">
                <tbody>
    <!--                    <tr class="highlight">
                        <td>          <input type="radio" name="next" value="coupon" id="use_coupon">
                        </td>
                        <td><label for="use_coupon">Use Coupon Code</label></td>
                    </tr>-->
                    <tr class="highlight">
                        <td>          
                            <input type="radio" name="next" value="paypal" id="use_paypal">
                        </td>
                        <td><label for="use_voucher">Pagar con PayPal</label></td>
                    </tr>
                    <tr class="highlight">
                        <td>         
                            <input type="radio" name="next" value="mercadopago" id="use_mercadopago">
                        </td>
                        <td><label for="use_voucher">Pagar con mercadopago</label></td>
                    </tr>
                    <tr class="highlight">
                        <td>          
                            <input type="radio" name="next" value="shipping" id="shipping_estimate">
                        </td>
                        <td>
                            <label for="shipping_estimate">Pagar con Tajeta de Credito (Neopago)</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <? /* ?>
          <? */ ?>
        <div class="cart-module">
            <div id="paypal" class="content" style="display: none;">
                <form action="./checkout/paypal_ec_redirect.php" method="POST">
                    <input type="hidden" name="pedido" value="<?= $idpedido; ?>" readonly=""/>
                    <input type="hidden" name="L_PAYMENTREQUEST_0_NAME0" value="Pedido #<?= $idpedido; ?>"></input></td></tr>
                    <input type="hidden" name="L_PAYMENTREQUEST_0_NUMBER0" value="<?= $idpedido; ?>"></input></td></tr>
                    <!-- Logo -->
                    <input type="hidden" name="LOGOIMG" value="https://www.pkclick.com/imagenescarrito/<?= $appdata['logo'] ?>"></input></td></tr>
                    <? /* ?>
                      <input type="hidden" name="METHOD" value="SetExpressCheckout" readonly=""/>
                      <!--<input type="hidden" name="currencyCodeType" value="USD"/>-->
                      <input type="hidden" name="paymentType" value="Sale"/>
                      <!--<input type="hidden" name="RETURNURL" value="http://rollerprint.com/checkout"/>-->
                      <!--<input type="hidden" name="CANCELURL" value="http://rollerprint.com/cart"/>-->
                      <input type="hidden" name="L_PAYMENTREQUEST_0_NAME0" value="Pedido #12"></input></td></tr>
                      <input type="hidden" name="L_PAYMENTREQUEST_0_NUMBER0" value="12"></input></td></tr>
                      <!--<tr><td>Description:</td><td><input type="text" name="L_PAYMENTREQUEST_0_DESC0" value="Autofocus Camera"></input></td></tr>-->
                      <!--<input type="hidden" name="PAYMENTREQUEST_0_HANDLINGAMT" value="0" readonly=""/>-->
                      <!--<input type="hidden" name="PAYMENTREQUEST_0_INSURANCEAMT" value="0" readonly=""/>-->
                      <!--<input type="hidden" name="PAYMENTREQUEST_0_TAXAMT" value="0" readonly=""/>-->
                      <!-- Logo -->
                      <input type="hidden" name="LOGOIMG" value="https://www.pkclick.com/imagenescarrito/<?= $appdata['logo'] ?>"></input></td></tr>
                      <!-- Envio -->
                      <input type="hidden" name="PAYMENTREQUEST_0_SHIPPINGAMT" value="1" readonly=""/>
                      <!-- Cantidad -->
                      <input type="hidden" name="L_PAYMENTREQUEST_0_QTY0" value="1" readonly=""/>
                      <!-- Precio -->
                      <input type="hidden" name="PAYMENTREQUEST_0_ITEMAMT" value="10" readonly=""/>
                      <!-- Descuento -->
                      <input type="hidden" name="PAYMENTREQUEST_0_SHIPDISCAMT" value="-1" readonly=""/>
                      <!-- Notificacion -->
                      <!--<input type="hidden" name="PAYMENTREQUEST_0_NOTIFYURL" value="http://rollerprint.com/welcome/prueba" readonly=""/>-->
                      <!-- Total -->
                      <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="10" readonly=""/>
                      <!--Currency Code:-->
                      <? */ ?>
                    Moneda:
                    <select name="currencyCodeType">
                        <? /* ?>
                          <option value="AUD">AUD</option>
                          <option value="BRL">BRL</option>
                          <option value="CAD">CAD</option>
                          <option value="CZK">CZK</option>
                          <option value="DKK">DKK</option>
                          <? */ ?>
                        <option value="EUR" selected="">EUR</option>
                        <? /* ?>
                          <option value="HKD">HKD</option>
                          <option value="MYR">MYR</option>
                          <option value="MXN">MXN</option>
                          <option value="NOK">NOK</option>
                          <option value="NZD">NZD</option>
                          <option value="PHP">PHP</option>
                          <option value="PLN">PLN</option>
                          <option value="GBP">GBP</option>
                          <option value="RUB">RUB</option>
                          <option value="SGD">SGD</option>
                          <option value="SEK">SEK</option>
                          <option value="CHF">CHF</option>
                          <option value="THB">THB</option>
                          <? */ ?>
                        <option value="USD">USD</option>
                    </select>
                    <br>
                    <input type="submit" class="button" value="Pagar Con PayPal">
                    <!--<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal"></input>-->
                </form>
            </div> 
            <div id="mercadopago" class="content" style="display: none;">
                <?
                $total = (double) $total;
//                echo $total;
                $preference_data = array(
                    "items" => array(
                        array(
                            "title" => "Pedido #" . $idpedido,
                            "quantity" => 1,
                            "currency_id" => "ARS",
                            "unit_price" => $total
                        )
                    )
                );
                $preference = $mp->create_preference($preference_data);
                
                ?>
                <a href="<?php echo $preference['response']['sandbox_init_point']; ?>" name="MP-Checkout" class="blue-rn-m button">Pagar</a>
            </div>
            <div id="shipping" class="content" style="display: none;">
                <form action="./neopago" method="POST">
                    <?= $formulario ?>
                    <br style="clear: both;">
                    <input type="submit" value="Procesar Pago" id="button-quote" class="button">
                </form>
            </div>
        </div>
    </div>
<? } else { ?>
    <div class="empty">Tu carro de compra esta vacio!</div>
<? } ?>
<script type="text/javascript">
                            $('input[name=\'next\']').bind('change', function() {
                                $('.cart-module > div').hide();

                                $('#' + this.value).show();
                            });
</script>
<script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>