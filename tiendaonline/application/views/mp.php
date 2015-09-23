<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pagar</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <? /*
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://secure.mlstatic.com/org-img/checkout/custom/1.0/checkout.js"></script>
        <script type="text/javascript">
            Checkout.setPublishableKey("----public_key----");
        </script>
         */ ?>
        <form action="" method="post" id="form-pagar-mp">
            <p>Número de Tarjeta: <input data-checkout="cardNumber" name="cardNumber" type="text"/></p>
            <p>Código de Seguridad: <input data-checkout="securityCode" name="securityCode" type="text"/></p>
            <p>Mes de Expiración: <input data-checkout="cardExpirationMonth" name="cardExpirationMonth" type="text"/></p>
            <p>Año de Expiración: <input data-checkout="cardExpirationYear" name="cardExpirationYear" type="text"/></p>
            <p>Titular de la Tarjeta: <input data-checkout="cardholderName" name="cardholderName" type="text"/></p>
            <p>Número de Documento: <input data-checkout="docNumber" name="docNumber" type="text"/></p>
            <input data-checkout="docType" name="docType" type="hidden" value="DNI"/>
            <p><input type="submit" value="Realizar Pago"></p>
        </form>
        <form action="https://api.mercadolibre.com/users/test_user?access_token=<?= $access_token ?>" method="post" >
            <p>Site ID: <input name="site_id" type="text"/></p>
            <p><input type="submit" value="Realizar Pago"></p>
        </form>
        <? /* ?>
          <a href="<?php echo $preference['response']['init_point']; ?>">Pagar</a>
          <script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>
          <? */ ?>
    </body>
</html>