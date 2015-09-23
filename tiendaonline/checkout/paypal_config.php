<?php

require_once ("../application/libraries/pkapi.php");
$apipk = new pkapi();
$empresa = base64_decode($_COOKIE['empresa']);

//var_dump($empresa);
$paypal = $apipk->post('paypalcuenta/' . $empresa);
if ($paypal['success']) {
    $datos = $paypal['cuenta'];
//    var_dump($datos);
//    exit();
    if ($datos['sandbox']) {
        define("PP_USER_SANDBOX", $datos['pp_user']);
        define("PP_PASSWORD_SANDBOX", $datos['pp_password']);
        define("PP_SIGNATURE_SANDBOX", $datos['pp_firma']);
    } else {
        define("PP_USER", $datos['pp_user']);
        define("PP_PASSWORD", $datos['pp_password']);
        define("PP_SIGNATURE", $datos['pp_firma']);
    }
}
//echo "<br>/////////////////<br>";
//var_dump($paypal);
//exit();
//Seller Sandbox Credentials- Sample credentials already provided
//Seller Live credentials.
//define("PP_USER","wlinaresmartinez_api1.gmail.com");
//define("PP_PASSWORD", "QU2P5LERZJY9ZGE2");
//define("PP_SIGNATURE","AFcWxV21C7fd0v3bYYYRCpSSRl31AldfT3atg9nb4u04U3mwN9C6Ug76");
//Set this constant EXPRESS_MARK = true to skip review page
define("EXPRESS_MARK", true);

//Set this constant ADDRESS_OVERRIDE = true to prevent from changing the shipping address
define("ADDRESS_OVERRIDE", true);

//Set this constant USERACTION_FLAG = true to skip review page
define("USERACTION_FLAG", false);

//Based on the USERACTION_FLAG assign the page
if (USERACTION_FLAG) {
    $page = 'return.php';
} else {
    $page = 'review.php';
}

//The URL in your application where Paypal returns control to -after success (RETURN_URL) using Express Checkout Mark Flow
define("RETURN_URL_MARK", 'http://' . $_SERVER['HTTP_HOST'] . preg_replace('/paypal_ec_redirect.php/', 'return.php', $_SERVER['SCRIPT_NAME']));
//define("RETURN_URL_MARK",'http://rollerprint.com/welcome/prueba');
//define("NOTIFY_URL", 'http://rollerprint.com/welcome/prueba');
//The URL in your application where Paypal returns control to -after success (RETURN_URL) and after cancellation of the order (CANCEL_URL) 
//define("RETURN_URL", 'http://rollerprint.com/checkout/review.php');
//define("CANCEL_URL", 'http://rollerprint.com/cart');
define("RETURN_URL", 'http://' . $_SERVER['HTTP_HOST'] . preg_replace('/paypal_ec_redirect.php/', $page, $_SERVER['SCRIPT_NAME']));
define("CANCEL_URL", 'http://' . $_SERVER['HTTP_HOST'] . preg_replace('/paypal_ec_redirect.php/', 'cancel.php', $_SERVER['SCRIPT_NAME']));
//Whether Sandbox environment is being used, Keep it true for testing
if ($datos['sandbox']) {
define("SANDBOX_FLAG", TRUE);
} else {
    define("SANDBOX_FLAG", FALSE);
}

//Proxy Config
define("PROXY_HOST", "127.0.0.1");
define("PROXY_PORT", "808");

//Express Checkout URLs for Sandbox
define("PP_CHECKOUT_URL_SANDBOX", "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=");
define("PP_NVP_ENDPOINT_SANDBOX", "https://api-3t.sandbox.paypal.com/nvp");

//Express Checkout URLs for Live
define("PP_CHECKOUT_URL_LIVE", "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=");
define("PP_NVP_ENDPOINT_LIVE", "https://api-3t.paypal.com/nvp");

//Version of the APIs
define("API_VERSION", "109.0");

//ButtonSource Tracker Code
define("SBN_CODE", "PP-DemoPortal-EC-php");
?>