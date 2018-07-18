<?php
require_once('mysqli_connect.php');
require_once('send-mail.php');
date_default_timezone_set("UTC");
$time = date("Y-m-d H:i:s"); 
$user_email = $_POST['email'];
$user_email = str_replace("%40", "@", $user_email);
$token_bonus = 0;
//   if ($time >= '2018-07-03 00:00:00'){
//     $token_bonus = floor($_COOKIE['token_amount'] * 0.07);
//   }
$amount = $_POST['token_amount'] * $_POST['conversion_rate'];
$update_history_sql = "insert into transactions (user_email, currency, amount, address, 
token_amount, token_bonus, status, date, conversion_rate) values ('"
.$user_email."','"
.$_POST['currency']."','"
.$amount."','"
.$_POST['wallet_address']."','"
.$_POST['token_amount']."', ".$token_bonus.", '".$_POST['status']."', '$time','"
.$_POST['conversion_rate']."')";
if ($_POST['currency'] == "USD") {
sendMail($user_email, getUsdTransactionDetailTitle(), getUsdTransactionDetailMessage($user_email, $_POST['token_amount']));
} else {
sendMail($user_email, getETHTransactionDetailTitle(), getETHTransactionDetailMessage($_POST['token_amount']));
}
if (mysqli_query($dbc, $update_history_sql)){
    $code = 200;
    $message = 'Success';
} else {
    $code = 400;
    $message = 'Please try to purchase later.';
}
mysqli_close($dbc);
$result = [
    'code' => $code,
    'message' => $message
];
echo json_encode($result);
?>