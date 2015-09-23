<?php
require_once ('../application/libraries/pkapi.php');
$pkapi = new Pkapi();
if ($_POST) {
    $h = $pkapi->post('mercadopagors', $_POST);
}else{
    $h = $pkapi->post('mercadopagors', $_REQUEST);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pagar</title>
    </head>
    <body>
        aqui esoty
        <a href="<?php echo $preference['response']['init_point']; ?>">Pagar</a>
        <script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>
    </body>
</html>