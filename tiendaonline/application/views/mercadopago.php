<?php
require_once ('mercadopago/lib/mercadopago.php');



$mp = new MP('2559493792267909', 'v1HkHBPvQ9ELOUBLtxoOvauunrVmDxVt');

$preference_data = array(
    "items" => array(
        array(
            "title" => "Barrilete multicolor",
            "quantity" => 1,
            "currency_id" => "ARS",
            "unit_price" => 10.00
        )
    )
);
$tokken = $mp->get_access_token();
var_dump($tokken);
//$preference = $mp->create_preference($preference_data);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pagar</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="" method="post" id="form-pagar-mp">
            <p>Número de Tarjeta: <input data-checkout="cardNumber" type="text"/></p>
            <p>Código de Seguridad: <input data-checkout="securityCode" type="text"/></p>
            <p>Mes de Expiración: <input data-checkout="cardExpirationMonth" type="text"/></p>
            <p>Año de Expiración: <input data-checkout="cardExpirationYear" type="text"/></p>
            <p>Titular de la Tarjeta: <input data-checkout="cardholderName" type="text"/></p>
            <p>Número de Documento: <input data-checkout="docNumber" type="text"/></p>
            <input data-checkout="docType" type="hidden" value="DNI"/>
            <p><input type="submit" value="Realizar Pago"></p>
        </form>
        <? /* ?>
          <a href="<?php echo $preference['response']['init_point']; ?>">Pagar</a>
          <script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>
          <? */ ?>
    </body>
</html>