<?php
session_start();
require_once ("paypal_functions.php");
require_once ("../application/libraries/pkapi.php");
$pkapi = new Pkapi();

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
 * Call to GetExpressCheckoutDetails and DoExpressCheckoutPayment APIs
 */


/*
 * The paymentAmount is the total value of the shopping cart(in real apps), here it was set 
 * in paypalfunctions.php in a session variable 
 */

$finalPaymentAmount = $_SESSION["Payment_Amount"];
if (!isset($_SESSION['payer_id'])) {
    $_SESSION['payer_id'] = $_GET['PayerID'];
}


// Check to see if the Request object contains a variable named 'token'	or Session object contains a variable named TOKEN 
$token = "";

if (isset($_REQUEST['token'])) {
    $token = $_REQUEST['token'];
} else if (isset($_SESSION['TOKEN'])) {
    $token = $_SESSION['TOKEN'];
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
        $shippingAmt = $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPPINGAMT"]; // 'Shipping amount 
        /*
         * Add check here to verify if the payment amount stored in session is the same as the one returned from GetExpressCheckoutDetails API call
         * Checks whether the session has been compromised
         */
        if ($_SESSION["Payment_Amount"] != $totalAmt || $_SESSION["currencyCodeType"] != $currencyCode)
            exit("Parameters in session do not match those in PayPal API calls");
    }
    else {
        //Display a user friendly Error on the page using any of the following error information returned by PayPal
        $ErrorCode = urldecode($resArrayGetExpressCheckout["L_ERRORCODE0"]);
        $ErrorShortMsg = urldecode($resArrayGetExpressCheckout["L_SHORTMESSAGE0"]);
        $ErrorLongMsg = urldecode($resArrayGetExpressCheckout["L_LONGMESSAGE0"]);
        $ErrorSeverityCode = urldecode($resArrayGetExpressCheckout["L_SEVERITYCODE0"]);

        echo "GetExpressCheckoutDetails API call failed. " . "<br>";
        echo "Detailed Error Message: " . $ErrorLongMsg . "<br>";
        echo "Short Error Message: " . $ErrorShortMsg . "<br>";
        echo "Error Code: " . $ErrorCode . "<br>";
        echo "Error Severity Code: " . $ErrorSeverityCode . "<br>";
    }
}
/* Review block start */

if (!USERACTION_FLAG && !isset($_SESSION['EXPRESS_MARK'])) {
    if (isset($_POST['shipping_method']))
        $new_shipping = $_POST['shipping_method']; //need to change this value, just for testing
    if ($shippingAmt > 0) {
        $finalPaymentAmount = ($totalAmt + $new_shipping) - $_SESSION['shippingAmt'];
        $_SESSION['shippingAmt'] = $new_shipping;
    }
}

/* Review block end */
/*
 * Calls the DoExpressCheckoutPayment API call
 */
//$resArrayDoExpressCheckout = ConfirmPayment ( $newTotalAmt );
$resArrayDoExpressCheckout = ConfirmPayment($finalPaymentAmount);
echo "/////////////////////////////////////////////////////////////////////////";
var_dump($resArrayDoExpressCheckout);
$ss = $pkapi->post('mercadopagors', $resArrayDoExpressCheckout);
$ackDoExpressCheckout = strtoupper($resArrayDoExpressCheckout["ACK"]);

echo $s = call('header?ip=' . $tokkenuser);

echo '<div class="content">';
//include('header.php');

session_unset();   // free all session variables
session_destroy(); //destroy session
if ($ackDoExpressCheckout == "SUCCESS" || $ackDoExpressCheckout == "SUCCESSWITHWARNING") {
    $transactionId = $resArrayDoExpressCheckout["PAYMENTINFO_0_TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
    $transactionType = $resArrayDoExpressCheckout["PAYMENTINFO_0_TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
    $paymentType = $resArrayDoExpressCheckout["PAYMENTINFO_0_PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
    $orderTime = $resArrayDoExpressCheckout["PAYMENTINFO_0_ORDERTIME"];  //' Time/date stamp of payment
    $amt = $resArrayDoExpressCheckout["PAYMENTINFO_0_AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
    $currencyCode = $resArrayDoExpressCheckout["PAYMENTINFO_0_CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
    /*
     * Status of the payment: 
     * Completed: The payment has been completed, and the funds have been added successfully to your account balance.
     * Pending: The payment is pending. See the PendingReason element for more information. 
     */

    $paymentStatus = $resArrayDoExpressCheckout["PAYMENTINFO_0_PAYMENTSTATUS"];

    /*
     * The reason the payment is pending 
     */
    $pendingReason = $resArrayDoExpressCheckout["PAYMENTINFO_0_PENDINGREASON"];

    /*
     * The reason for a reversal if TransactionType is reversal 
     */
    $reasonCode = $resArrayDoExpressCheckout["PAYMENTINFO_0_REASONCODE"];
    ?>

    <span class="span4">
    </span>
    <span class="span5">
        <div class="hero-unit">
            <!-- Display the Transaction Details-->

            <!--            <h4> Shipping Details: </h4>
            <?php echo($shipToName) ?><br>
            <?php echo($shipToStreet) ?><br>
            <?php echo($shipToCity) ?><br>
            <?php echo($shipToState) ?>- <?php echo($shipToZip) ?></p>
                        <h3> Click <a href='index.php'>here </a> to return to Home Page</h3>-->
        </div>
    </span>
    <div id="content">
        <h1> <?php echo($firstName); ?>
            <?php echo($lastName); ?> , Gracias por su compra </h1>
        <div class="cart-info">
            <table>
                <thead>
                    <tr>
                        <td class="image"><b>Nombre</b></td>
                        <td class="image"><b>Calle</b></td>
                        <td class="image"><b>Ciudad</b></td>
                        <td class="image"><b>Estado</b></td>
                        <td class="image"><b>Codigo Postal</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="image"><?php echo($shipToName) ?></td>
                        <td class="image"><?php echo($shipToStreet) ?></td>
                        <td class="image"><?php echo($shipToCity) ?></td>
                        <td class="image"><b><?php echo($shipToState) ?></b></td>
                        <td class="image"><?php echo($shipToZip) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <!--            <p>Transaction ID: <?php echo($transactionId); ?> </p>
            <p>Transaction Type: <?php echo($transactionType); ?> </p>
            <p>Payment Total Amount: <?php echo($amt); ?> </p>
            <p>Currency Code: <?php echo($currencyCode); ?> </p>
            <p>Payment Status: <?php echo($paymentStatus); ?> </p>
            <p>Payment Type: <?php echo($paymentType); ?> </p>-->
        <div class="cart-total">
            <table id="total">
                <tbody>
                    <tr>
                        <td class="right"><b>Transaction ID:</b></td>
                        <td class="right"><?php echo($transactionId); ?></td>
                    </tr>
                    <tr>
                        <td class="right"><b>Transaction Type:</b></td>
                        <td class="right"><?php echo($transactionType); ?></td>
                    </tr>
                    <tr>
                        <td class="right"><b>Payment Total Amount:</b></td>
                        <td class="right"><?php echo $resArrayDoExpressCheckout['PAYMENTINFO_0_AMT'] . ' ' . $currencyCode; ?></td>
                    </tr>
                    <tr>
                        <td class="right"><b>Payment Status:</b></td>
                        <td class="right"><?php echo($paymentStatus); ?></td>
                    </tr>
                    <tr>
                        <td class="right"><b>Payment Type:</b></td>
                        <td class="right"><?php echo($paymentType); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <span class="span3">
    </span>
    <?php
} else {
    //Display a user friendly Error on the page using any of the following error information returned by PayPal

    $ErrorCode = urldecode($resArrayDoExpressCheckout["L_ERRORCODE0"]);
    $ErrorShortMsg = urldecode($resArrayDoExpressCheckout["L_SHORTMESSAGE0"]);
    $ErrorLongMsg = urldecode($resArrayDoExpressCheckout["L_LONGMESSAGE0"]);
    $ErrorSeverityCode = urldecode($resArrayDoExpressCheckout["L_SEVERITYCODE0"]);

    if ($ErrorCode == 10486) {  //Transaction could not be completed error because of Funding failure. Should redirect user to PayPal to manage their funds.
        ?>
        <!--<div class="hero-unit">
         Display the Transaction Details
        <h4> There is a Funding Failure in your account. You can modify your funding sources to fix it and make purchase later. </h4>
        Payment Status:-->
        <?php
        //echo($resArrayDoExpressCheckout["PAYMENTINFO_0_PAYMENTSTATUS"]);
        RedirectToPayPal($resArray["TOKEN"]);
        ?>
        <!--<h3> Click <a href='https://www.sandbox.paypal.com/'>here </a> to go to PayPal site.</h3> <!--Change to live PayPal site for production-->
        <!--</div>-->
        <?php
    } else {
        echo "DoExpressCheckout API call failed. <br>";
        echo "Detailed Error Message: " . $ErrorLongMsg . "<br>";
        echo "Short Error Message: " . $ErrorShortMsg . "<br>";
        echo "Error Code: " . $ErrorCode . "<br>";
        echo "Error Severity Code: " . $ErrorSeverityCode . "<br>";
    }
}
echo '</div>';
echo '<h1> </h1>';
echo '</div>';
echo '</div>';
echo '</div>';
echo $s = call('footer?ip=' . $tokkenuser);
?>