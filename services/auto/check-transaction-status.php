<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
require_once(WPAY_PATH.'/services/utils/send-mail.php');
$transaction_sql = "select * from transactions where status = 'Pending' and currency <> 'USD'";
$transaction_result = mysqli_query($dbc, $transaction_sql);
date_default_timezone_set("UTC"); 
while ($transaction = mysqli_fetch_array($transaction_result)) {
	if ((time() - strtotime($transaction['date'])) > 48 * 3600) {
		$reject_transaction_sql = "update transactions set status = 'Canceled' where transaction_id = '".$transaction['transaction_id']."'";
		mysqli_query($dbc, $reject_transaction_sql);
		echo "Canceled  <br/>";
		$name = explode("@", $transaction['user_email'])[0];
		sendMail($transaction['user_email'], getTransactionResubmissionTitle(), getTransactionResubmissionMessage($name));
	}
}
mysqli_close($dbc);
?>