<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
require_once(WPAY_PATH.'/services/utils/request_api.php');
require_once(WPAY_PATH.'/services/utils/send-mail.php');
// require_once(WPAY_PATH.'/services/utils/update-sheet.php');
$url = "https://p3.cynopsis.co/artemis_novumcapital/default/check_status.json";
$header = ['Content-Type: application/json', 'WEB2PY-USER-TOKEN:03a7a6cb-63b2-47b2-8715-af65aabf28ed'];
$sql = "select * from users where status = 'PENDING'";
$result = mysqli_query($dbc, $sql);
while($user = mysqli_fetch_array($result)) {

	$data = array (
		"rfrID"=>$user['user_id'],
		"domain_name"=>"NOVUMCAPITAL"
	);
	$json = callAPI("GET", $url, $data, $header);
	$object = json_decode($json);
	print_r($user['user_id']);

	$status = $object->approval_status;

	if (empty($status)) {
		$status = "PENDING";
	}
	if ($status == 'CLEARED') {
		sendMail($user['email'], getSuccessKycTitle(), getSuccessKycMessage($user['first_name'], $user['wallet_address']));
	}
	$sql_update_status = "update users set status='".$status."' where user_id='".$user['user_id']."'";
	mysqli_query($dbc, $sql_update_status);
	// updateSheet([$user['email'], $user['first_name']." ".$user['last_name'], $user['date_birth'], $user['citizenship'], $user['country'], date('d/m/Y h:i:s', time()), $status, $user['wallet_address']], $user['row_number']);
}
mysqli_close($dbc);
?>