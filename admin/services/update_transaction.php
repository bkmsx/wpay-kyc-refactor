<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
date_default_timezone_set("UTC");
$time = date("Y-m-d H:i:s"); 
$transaction_id = $_POST['transaction_id'];
$email = $_POST['email'];
$currency = $_POST['currency'];
$amount = $_POST['amount'];
$wallet_address = $_POST['wallet_address'];
$token_amount = $_POST['token_amount'];
$token_bonus = $_POST['token_bonus'];
$status = $_POST['status'];
$conversion_rate = $_POST['conversion_rate'];

$update_transaction = "update transactions set email='$email', currency='$currency',
                amount='$amount', wallet_address='$wallet_address',
                token_amount='$token_amount', token_bonus='$token_bonus',
                status='$status', conversion_rate='$conversion_rate',
                update_date= '$time' where transaction_id='$transaction_id'";
mysqli_query($dbc, $update_transaction);
if ($status == 'Confirmed') {
    $user = mysqli_fetch_assoc(mysqli_query($dbc, "select * from users where email='$email'"));
    $token_number = $user['token_number'];
    $token_number += $token_amount + $token_bonus;
    $update_token_amount = "update users set token_number='$token_number', 
                            update_date='$time' where email='$email'";
    mysqli_query($dbc, $update_token_amount);
}
mysqli_close($dbc);
$result = [
    'code' => 200,
    'message' => 'Success'
];
echo json_encode($result);
?>