<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
if (isset($_GET['transaction_id'])) {
    $transaction_sql = "select * from transactions where transaction_id='".$_GET['transaction_id']."'";
    $transaction_result = mysqli_query($dbc, $transaction_sql);
    $transaction = mysqli_fetch_assoc($transaction_result);
    echo json_encode($transaction);
} else {
    $transactions_sql = "select * from transactions order by date desc";
    $transactions_result = mysqli_query($dbc, $transactions_sql);
    $transactions = array();
    while($transaction = mysqli_fetch_assoc($transactions_result)) {
        array_push($transactions, $transaction);
    }
    echo json_encode($transactions);
}
mysqli_close($dbc);
?>