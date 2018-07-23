<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
date_default_timezone_set("UTC");
$time = date("Y-m-d H:i:s"); 
$user_id = $_POST['user_id'];
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_birth = $_POST['date_birth'];
$citizenship = $_POST['citizenship'];
$country = $_POST['country'];
$status = $_POST['status'];
$token_number = $_POST['token_number'];

$update_user = "update users set email='$email', first_name='$first_name',
                last_name='$last_name', date_birth='$date_birth',
                citizenship='$citizenship', country='$country',
                status='$status', token_number='$token_number', update_date='$time'
                where user_id='$user_id'";
mysqli_query($dbc, $update_user);
mysqli_close($dbc);
$result = [
    'code' => 200,
    'message' => 'Success'
];
echo json_encode($result);
?>