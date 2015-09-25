<?php
include_once 'include/main.php';
include_once 'include/jose.php';
include_once 'include/juan.php';
function search_precio($precio) {
    
//    mt_pkconfig
//echo $precio;
    $rest = substr($precio, 0, -2); 
   // debug($rest, false);
    $monto = (int) $rest;
    $opt_name = 'mt_divisa';
    $opt_val = get_option($opt_name);
    $db = json_decode($opt_val);
      $db->divisa;
    $numero =  $db->divisa * $monto ;
  //  echo $numero;
echo "Bs " . number_format($numero, 2, ",", ".");
//return($rest);
//    return $d . $db->divisa * $num * $t;
//    update_option($opt_name, $config);
}