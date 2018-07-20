<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
require_once(WPAY_PATH.'/services/utils/send-mail.php');
$user_sql = "select * from users where first_name is null";
$user_result = mysqli_query($dbc, $user_sql);
while ($user = mysqli_fetch_array($user_result)){
	$name = explode("@", $user['email'])[0];
	sendMail($user['email'], getResubmissionTitle(), getResubmissionMessage($name));
}
mysqli_close($dbc);
?>