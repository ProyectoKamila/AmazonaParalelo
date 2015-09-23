<?php
/*
 * Call to GetExpressCheckoutDetails
 */

require_once ("paypal_functions.php");
require_once ("../application/libraries/pkapi.php");
$pkapi = new pkapi();

function call($accion, $parametros = null) {
    $direccion = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $direccion .= "://" . $_SERVER['HTTP_HOST'] . "/";
    if (($direccion == "http://usuario-pc/") || ($direccion == "http://localhost/")) {
        $direccion = $direccion . "plantilla/";
    }
//    $direccion = "http://usuario-pc/plantilla/";
    if ($accion) {
        $url = $direccion . '' . $accion;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($parametros) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($ch);
        //        var_dump($respuesta);
        $error = curl_error($ch);
        //        var_dump($error);
        if ($respuesta) {
            return $respuesta;
        } elseif ($error) {
            return $error;
        } else {
            return $url;
        }
        curl_close($ch);
    } else {
        return null;
    }
}

if (isset($_GET['ip'])) {
    $tokkenuser = $_GET['ip'];
} elseif (isset($_COOKIE['ip'])) {
    $tokkenuser = $_COOKIE['ip'];
} else {
    $tokkenuser = 1;
}
/*
 * in paypalfunctions.php in a session variable 
 */
$_SESSION['payer_id'] = $_GET['PayerID'];

// Check to see if the Request object contains a variable named 'token'	
$token = "";

if (isset($_REQUEST['token'])) {
    $token = $_REQUEST['token'];
    $_SESSION['TOKEN'] = $token;
}

// If the Request object contains the variable 'token' then it means that the user is coming from PayPal site.	
if ($token != "") {
    /*
     * Calls the GetExpressCheckoutDetails API call
     */
    $resArrayGetExpressCheckout = GetShippingDetails($token);
    var_dump($resArrayGetExpressCheckout);
    $ackGetExpressCheckout = strtoupper($resArrayGetExpressCheckout["ACK"]);
    if ($ackGetExpressCheckout == "SUCCESS" || $ackGetExpressCheckout == "SUCESSWITHWARNING") {
        /*
         * The information that is returned by the GetExpressCheckoutDetails call should be integrated by the partner into his Order Review 
         * page		
         */
        $email = $resArrayGetExpressCheckout["EMAIL"]; // ' Email address of payer.
        $payerId = $resArrayGetExpressCheckout["PAYERID"]; // ' Unique PayPal customer account identification number.
        $payerStatus = $resArrayGetExpressCheckout["PAYERSTATUS"]; // ' Status of payer. Character length and limitations: 10 single-byte alphabetic characters.
        $firstName = $resArrayGetExpressCheckout["FIRSTNAME"]; // ' Payer's first name.
        $lastName = $resArrayGetExpressCheckout["LASTNAME"]; // ' Payer's last name.
        $cntryCode = $resArrayGetExpressCheckout["COUNTRYCODE"]; // ' Payer's country of residence in the form of ISO standard 3166 two-character country codes.
        $shipToName = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTONAME"]; // ' Person's name associated with this address.
        $shipToStreet = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOSTREET"]; // ' First street address.
        $shipToCity = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOCITY"]; // ' Name of city.
        $shipToState = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOSTATE"]; // ' State or province
        $shipToCntryCode = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE"]; // ' Country code. 
        $shipToZip = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOZIP"]; // ' U.S. Zip code or other country-specific postal code.
        $addressStatus = $resArrayGetExpressCheckout["ADDRESSSTATUS"]; // ' Status of street address on file with PayPal 
        $totalAmt = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_AMT"]; // ' Total Amount to be paid by buyer
        $currencyCode = $resArrayGetExpressCheckout["CURRENCYCODE"]; // 'Currency being used 
        $shippingAmt = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPPINGAMT"]; // 'Currency being used 
        /*
         * Add check here to verify if the payment amount stored in session is the same as the one returned from GetExpressCheckoutDetails API call
         * Checks whether the session has been compromised
         */
        if ($_SESSION["Payment_Amount"] != $totalAmt || $_SESSION["currencyCodeType"] != $currencyCode) {
            echo $s = call('header?ip=' . $tokkenuser);
            echo ' <div class="warning">Parámetros en sesión no coinciden con los de llamadas a la API de PayPal</div>';
            echo $s = call('footer?ip=' . $tokkenuser);
            exit();
        }
    } else {
        //Display a user friendly Error on the page using any of the following error information returned by PayPal
        $ErrorCode = urldecode($resArrayGetExpressCheckout["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($resArrayGetExpressCheckout["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($resArrayGetExpressCheckout["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($resArrayGetExpressCheckout["L_SEVERITYCODE0"]);

        echo "GetExpressCheckoutDetails API call failed. ";
        echo "Detailed Error Message: " . $ErrorLongMsg;
        echo "Short Error Message: " . $ErrorShortMsg;
        echo "Error Code: " . $ErrorCode;
        echo "Error Severity Code: " . $ErrorSeverityCode;
    }
}
if (!USERACTION_FLAG) {
    echo $s = call('header?ip=' . $tokkenuser);
    $ss = $pkapi->post('timeline');
//    var_dump($ss);
    ?>	
    <div id="content">
        <div class="span4">

        </div>
        <h1>Dirección de Facturación</h1>
        <div class="span5 cart-info">
            <table>
                <thead>
                    <tr>
                        <td class="image"><b>Nombre</b></td>
                        <td class="image"><b>Calle</b></td>
                        <td class="image"><b>Ciudad</b></td>
                        <td class="image"><b>Estao</b></td>
                        <td class="image"><b>Código del país</b></td>
                        <td class="image"><b>Zip</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="image"><?php echo $shipToName; ?></td>
                        <td class="image"><?php echo $shipToStreet; ?></td>
                        <td class="image"><?php echo $shipToCity; ?></td>
                        <td class="image"><?php echo $shipToState; ?></td>
                        <td class="image"><?php echo $shipToCntryCode; ?></td>
                        <td class="image"><?php echo $shipToZip; ?></td>
                    </tr>
                </tbody>
            </table>
        <!--        <table>
                <tbody>
                    <tr><td><h4>Shipping Address</h5></td><td><h4>Billing Address</h4></td></tr>
                    <tr><td><?php echo $shipToName; ?></td><td><?php echo $shipToName; ?></td></tr>
                    <tr><td><?php echo $shipToStreet; ?></td><td><?php echo $shipToStreet; ?></td></tr>
                    <tr><td><?php echo $shipToCity; ?></td><td><?php echo $shipToCity; ?></td></tr>
                    <tr><td><?php echo $shipToState; ?></td><td><?php echo $shipToState; ?></td></tr>
                    <tr><td><?php echo $shipToCntryCode; ?></td><td><?php echo $shipToCntryCode; ?></td></tr>
                    <tr><td><?php echo $shipToZip; ?></td><td><?php echo $shipToZip; ?></td></tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr><td>Total Amount:</td><td><?php echo $totalAmt ?></td></tr>
                    <tr><td>Currency Code:</td><td><?php echo $currencyCode ?></td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><h3>Shipping Method</h3></td></tr>
                <form action="checkout/return.php" name="order_confirm" method="POST">
                    <tr><td>Shipping methods: </td><td>
                    <input type="hidden" name="shipping_method" id="shipping_method" value="0.00">
                                    <select name="shipping_method" id="shipping_method" style="width: 250px;" class="required-entry">
                        <option value="">Please select a shipping method...</option>
                        <optgroup label="United Parcel Service" style="font-style:normal;">
                            <option value="2.00">
                                Worldwide Expedited - $2.00</option>
                            <option value="3.00">
                                Worldwide Express Saver - $3.00</option>
                        </optgroup>
                        <optgroup label="Flat Rate" style="font-style:normal;">
                            <option value="0.00">
                                Fixed - $0.00</option>
                        </optgroup>
                    </select><br>
                    </td></tr>
                    <tr><td>
                            <input type="Submit" name="confirm" alt="Check out with PayPal" class="btn btn-primary btn-large button" value="Confirm Order"></td></tr>
                </form>
                </tbody>
            </table>-->
        </div>
        <div class="cart-total">
            <table id="total">
                <tbody>
                    <tr>
                        <td class="right"><b>Cantidad Total:</b></td>
                        <td class="right"><?php echo $totalAmt ?></td>
                    </tr>
                    <tr>
                        <td class="right"><b>Moneda:</b></td>
                        <td class="right"><?php echo $currencyCode ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="buttons">
            <form action="checkout/return.php" name="order_confirm" method="POST">
                <input type="hidden" name="shipping_method" id="shipping_method" value="0.00">
                <div class="right">
                    <input type="Submit" name="confirm" alt="Check out with PayPal" class="btn btn-primary btn-large button" value="Confirm Order">
                </div>
            </form>
        </div>
    </div>
    <div class="span3">
    </div>
    <?php
}

echo $s = call('footer?ip=' . $tokkenuser);
?>