<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Stack</title>
    <script src="https://webpay-ui.k8.isw.la/inline-checkout.js"></script>
</head>
<body>

<?php
    // Doc : https://docs.interswitchgroup.com/docs
    // Test Card: https://docs.interswitchgroup.com/docs/test-cards
 
   
    
    
    
    //LIVE KEYS: 
    $endpoint = 'https://newwebpay.interswitchng.com/collections/w/pay'; // live

    $merchant_code = 'MX46954';
    $pay_item_id = 'Default_Payable_MX46954';
   
    
    $txn_ref = 'order_id-'.rand(0,9999);
    $amount = 15*100;
    $currency = 566;
    $site_redirect_url = 'https://demo-customlinks.com/research_work/quickteller_interswitchgroup_payment/payment_response.php';
?>


<form method='post' action='<?=$endpoint?>'>
    <input type='hidden' name='merchant_code' value='<?=$merchant_code?>' />
    <input type='hidden' name='pay_item_id' value='<?=$pay_item_id?>' />
    <input type='hidden' name='site_redirect_url' value='<?=$site_redirect_url?>' /> 
    <input type='hidden' name='txn_ref' value='<?=$txn_ref?>' />
    <input type='hidden' name='amount' value='<?=$amount?>' />
    <input type='hidden' name='currency' value='<?=$currency?>' />
    <input type='submit' value='Make Payment' /> 
</form>



<script type="text/javascript">
    //declare callback function
function paymentCallback(response) {
    console.log(response);
}

//sample payment request
var samplePaymentRequest = {
    merchant_code: "<?=$merchant_code?>",          
    pay_item_id: "<?=$pay_item_id?>",
    txn_ref: "<?=$txn_ref?>",
    amount: <?=$amount?>, 
    currency: <?=$currency?>, // ISO 4217 numeric code of the currency used
    onComplete: paymentCallback,
    mode: 'TEST',
    site_redirect_url:'<?=$site_redirect_url?>'
};

//call webpayCheckout to initiate the payment
window.webpayCheckout(samplePaymentRequest);
</script>
</body>
</html>