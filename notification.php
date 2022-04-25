<?php

$notification = $_POST;
$url = 'https://dripsmedical.com/portal/notification?';
$url .= http_build_query($notification,"","&");
//echo $url;die;
header("Location: ".$url);
die();

/*if($_POST['gtpay_tranx_id'] != ''){
            DB::table('consultation')->where('id','gtpay_tranx_id')
            ->update($notification);
        }
      else{
      	echo "not done";
      }*/
?>