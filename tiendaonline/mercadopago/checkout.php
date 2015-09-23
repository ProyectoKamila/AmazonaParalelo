<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pagar</title>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://secure.mlstatic.com/org-img/checkout/custom/1.0/checkout.js"></script>
    </head>

    <body>
        <h1><a href="http://developers.mercadopago.com/documentacion/checkout-personalizado?lang=es_AR">Checkout personalizado</a></h1>

        <form action="" method="post" id="form-pagar-mp">
            <p>N&uacute;mero de Tarjeta: <input data-checkout="cardNumber" type="text"/></p>
            <p>C&oacute;digo de Seguridad: <input data-checkout="securityCode" type="text"/></p>
            <p>Mes de Expiraci&oacute;n: <input data-checkout="cardExpirationMonth" type="text"/></p>
            <p>A&ntilde;o de Expiraci&oacute;n: <input data-checkout="cardExpirationYear" type="text"/></p>
            <p>Titular de la Tarjeta: <input data-checkout="cardholderName" type="text"/></p>
            <p>N&uacute;mero de Documento: <input data-checkout="docNumber" type="text"/></p>
            <input data-checkout="docType" type="hidden" value="DNI"/>
            <p><input type="submit" value="Realizar Pago"></p>
        </form>

        <script type="text/javascript">
            /* Reemplaza por tu public_key */
            Checkout.setPublishableKey("00000000-1111-2222-3333-444444444444");
            $("#form-pagar-mp").submit(function(event) {
                var $form = $(this);
                Checkout.createToken($form, mpResponseHandler);
                event.preventDefault();
                return false;
            });
            var mpResponseHandler = function(status, response) {
                var $form = $('#form-pagar-mp');
                if (response.error) {
                    alert("ocurri&oacute; un error: " + JSON.stringify(response));
                } else {
                    var card_token_id = response.id;
                    $form.append($('<input type="hidden" id="card_token_id" name="card_token_id"/>').val(card_token_id));
                    alert("card_token_id: " + card_token_id);
                    $form.get(0).submit();
                }
            }
        </script>
    </body>
</html>