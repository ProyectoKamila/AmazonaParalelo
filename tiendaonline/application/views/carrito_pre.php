<?
if (isset($prodcar)) {
    $act = count($prodcar) . " item(s) <br>" . number_format($totalcar, 2, ',', '.') . ' ' . $appdata['moneda'];
    ?>

    <script>
        //$(document).ready(function (){
        $("#cart-total").html('<?= $act ?>');
        //});
    </script>

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
    <script>
        //$(document).ready(function (){
        $('#cart-total').html('0 item(s) - Bs 0.00');
        //});
    </script>
    <div class="empty">Tu carro de compra esta vacio!</div>
<? } ?>