<?php
$url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$url.= "://" . $_SERVER['HTTP_HOST'];
require_once ('lib/mercadopago.php');


$mp = new MP('2559493792267909', 'v1HkHBPvQ9ELOUBLtxoOvauunrVmDxVt');
$mp->sandbox_mode(TRUE);
$preference_data = array(
    "items" => array(
        array(
            "title" => "Barrilete multicolor",
            "quantity" => 1,
            "currency_id" => "ARS",
            "unit_price" => 10.00
        )
    ),
    "notification_url" => $url . "/panel/pagos"
);
//$tokken = $mp->get_access_token();
//var_dump($tokken);
$preference = $mp->create_preference($preference_data);

if (isset($_GET) && ($_GET)) {
    $params = ["access_token" => $mp->get_access_token()];
    var_dump($params);
    echo "<br>";
    echo "<br>";
// Get the payment reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com
    if ($_GET["topic"] == 'payment') {
        $payment_info = $mp->get("/collections/notifications/" . $_GET["id"], $params, false);
        var_dump($payment_info);
        echo "<br>";
        echo "<br>";
        $merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"], $params, false);
        var_dump($merchant_order_info);
        echo "<br>";
        echo "<br>";
// Get the merchant_order reported by the IPN. Glossary of attributes response in https://developers.mercadopago.com	
    } else if ($_GET["topic"] == 'merchant_order') {
        $merchant_order_info = $mp->get("/merchant_orders/" . $_GET["id"], $params, false);
    }
//If the payment's transaction amount is equal (or bigger) than the merchant order's amount you can release your items 
    if ($merchant_order_info["status"] == 200) {
        $transaction_amount_payments = 0;
        $transaction_amount_order = $merchant_order_info["response"]["total_amount"];
        $payments = $merchant_order_info["response"]["payments"];
        foreach ($payments as $payment) {
            if ($payment['status'] == 'approved') {
                $transaction_amount_payments += $payment['transaction_amount'];
            }
        }
        if ($transaction_amount_payments >= $transaction_amount_order) {
            echo "release your items";
        } else {
            echo "dont release your items";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Pagar</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <a href="<?php echo $preference['response']['sandbox_init_point']; ?>" name="MP-Checkout" class="blue-rn-m">Pagar</a>
        <a href="<?php echo $preference['response']['init_point']; ?>" name="MP-Checkout" class="blue-rn-m">Pagar</a>
        <script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>

    </body>
</html>