<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
require_once(WPAY_PATH.'/services/utils/send-mail.php');
$sql_user = "select * from users where status='CLEARED' and token_number = 0";
$result_user = mysqli_query($dbc, $sql_user);
while ($user = mysqli_fetch_array($result_user)) {
    $sql_transaction = "select * from transactions where email='".$user['email']."'";
    $result_transaction = mysqli_query($dbc, $sql_transaction);
    if (mysqli_num_rows($result_transaction) == 0) {
        sendMail($user['email'], getUserWithoutTransactionTitle(), getUserWithoutTransactionMessage($user['first_name']));
    }
}
mysqli_close($dbc);
?>