<?php
header('Access-Control-Allow-Origin: *');

$tolken = "sk_test_1x1_726a9913c2f7be076691c327118231967d26d7ef1fa919d78f168a26f6abc3eb";
$version = "2021-11";

$ptile = $_POST["ptile"];
$qty = $_POST["qty"];
$frq = $_POST["frq"];
$nxtdel = $_POST["nxtdel"];
$subid = $_POST["subid"];
$cid = $_POST["cid"];
$email = $_POST["email"];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rechargeapps.com/subscriptions/$subid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{"quantity": "'.$qty.'","product_title":"'.$ptile.'"}',
  CURLOPT_HTTPHEADER => array(
    "X-Recharge-Access-Token: $tolken",
    "X-Recharge-Version: $version",
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
echo "Subscription Updated Successfully";
curl_close($curl);

$curl2 = curl_init();
curl_setopt_array($curl2, array(
  CURLOPT_URL => "https://api.rechargeapps.com/customers/$cid",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{"email": "'.$email.'"}',
  CURLOPT_HTTPHEADER => array(
    "X-Recharge-Access-Token: $tolken",
    "X-Recharge-Version: $version",
    'Content-Type: application/json'
  ),
));

$response2 = curl_exec($curl2);

curl_close($curl2);
echo $response2;

?>


