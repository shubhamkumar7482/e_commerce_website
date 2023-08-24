<?php
session_start();
$users_id = $_SESSION['users_id'];
require('DB/connection.php');
require('functions.php');

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $host = 'https://securegw-stage.paytm.in'; /* test host */
  //$host = 'https://securegw.paytm.in'; /* live host */
  $mid = 'ymmpFs42495695062446';
  $mkey = 'p0NEJK1Qs@0%dvCv';

  require_once("PaytmChecksum.php");


  $order = getorderdetail($conn, base64_decode($_REQUEST['t']));
  $paytmParams = array();
  $orderId = 'ORDERID_'.md5(time());

  $paytmParams["body"] = array(
      "requestType" => "Payment",
      "mid" => $mid,
      "websiteName" => "DEFAULT",
      "orderId" => $orderId,
      "callbackUrl" => "https://riverhill.in/",
      "txnAmount" => array(
      "value"  => "1.00",
      "currency"=> "INR",
    ),
    "userInfo"=> array(
    "custId"=> "CUST_001",
    ),
  );

  /*
  * Generate checksum by parameters we have in body
  * Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys
  */
  $checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), "p0NEJK1Qs@0%dvCv");
  
  $paytmParams["head"] = array(
  "signature"=> $checksum
  );

  $post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);

  /* for Staging */
  $url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid=".$mid."&orderId=".$orderId;

  /* for Production */
  // $url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid=YOUR_MID_HERE&orderId=".$orderId;

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
  $response = curl_exec($ch);
  $response = json_decode($response); 
  print_r($response);
?>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
<script type="application/javascript" crossorigin="anonymous" src="<?php echo $host; ?>/merchantpgpui/checkoutjs/merchants/<?php echo $mid; ?>.js"></script>
<script>
    function onScriptLoad(){
        var config = {
         "root": "",
         "flow": "DEFAULT",
         "data": {
          "orderId": "<?php echo $orderId; ?>" /* update order id */,
          "token": "<?php echo $response->body->txnToken; ?>" /* update token value */,
          "tokenType": "TXN_TOKEN",
          "amount": "1.00" /* update amount */
         },
         "handler": {
            "notifyMerchant": function(eventName,data){
              console.log("notifyMerchant handler function called");
              console.log("eventName => ",eventName);
              console.log("data => ",data);
            } 
          }
        };

        if(window.Paytm && window.Paytm.CheckoutJS){
            window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                // initialze configuration using init method 
                window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                   // after successfully update configuration invoke checkoutjs
                   window.Paytm.CheckoutJS.invoke();
                }).catch(function onError(error){
                    console.log("error => ",error);
                });
            });
        } 
    }

    onScriptLoad();
</script>