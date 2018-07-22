<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
$transaction_id = $_POST['transaction_id'];
$user_email = $_POST['user_email'];
$currency = $_POST['currency'];
$amount = $_POST['amount'];
$address = $_POST['address'];
$token_amount = $_POST['token_amount'];
$token_bonus = $_POST['token_bonus'];
$status = $_POST['status'];
$conversion_rate = $_POST['conversion_rate'];

$update_transaction = "update users set user_email='$user_email', currency='$currency',
                amount='$amount', address='$address',
                token_amount='$token_amount', token_bonus='$token_bonus',
                status='$status', conversion_rate='$conversion_rate',
                 where transaction_id='$transaction_id'";
mysqli_query($dbc, $update_transaction);
mysqli_close($dbc);
?>