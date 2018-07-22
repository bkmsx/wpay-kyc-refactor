<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
require_once(WPAY_PATH.'/services/utils/send-mail.php');
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

if (mysqli_query($dbc, $update_history_sql)){
    $code = 200;
    $message = 'Success';
} else {
    $code = 400;
    $message = 'Please try to purchase later.';
}
if ($_POST['status'] != 'Confirmed') {
    if ($_POST['currency'] == "USD") {
        sendMail($user_email, getUsdTransactionDetailTitle(), getUsdTransactionDetailMessage($user_email, $amount));
    } elseif ($_POST['currency'] == "ETH") {
        sendMail($user_email, getETHTransactionDetailTitle(), getETHTransactionDetailMessage($amount));
    } elseif ($_POST['currency'] == "BTC") {
        sendMail($user_email, getBTCTransactionDetailTitle(), getBTCTransactionDetailMessage($amount));
    } else {
        sendMail($user_email, getXLMTransactionDetailTitle(), getXLMTransactionDetailMessage($amount));
    }
} else {
    $user_sql = "select token_number from users where email = '$user_email'";
    $user = mysqli_fetch_assoc(mysqli_query($dbc, $user_sql));
    $token_number = $user['token_number'] + $_POST['token_amount'];
    $update_token_sql = "update users set token_number='$token_number' where email='$user_email'";
    mysqli_query($dbc, $update_token_sql);
}

$result = [
    'code' => $code,
    'message' => $message
];
mysqli_close($dbc);
echo json_encode($result);
?>