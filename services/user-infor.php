<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
$user_sql = "select * from users where email = '".$_COOKIE['email']."'";
$user_result = mysqli_query($dbc, $user_sql);
$user = mysqli_fetch_assoc($user_result);
$transaction_history_sql = "select * from transactions where email = '".$_COOKIE['email']."' order by date desc";
$result = mysqli_query($dbc, $transaction_history_sql);
$histories = array();
while ($transaction = mysqli_fetch_assoc($result)) {
    $history = [
        'date' => $transaction['date'],
        'currency' => $transaction['currency'],
        'amount' => $transaction['amount'],
        'token_amount' => $transaction['token_amount'],
        'token_bonus' => $transaction['token_bonus'],
        'token_number' => $user['token_number'],
        'conversion_rate' => $transaction['conversion_rate'],
        'status' => $transaction['status']
    ];
    array_push($histories, $history);
}
$result = [
    'user' => $user,
    'histories' => $histories
];
mysqli_close($dbc);
echo json_encode($result);
?>