<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/request_api.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
$sql_pending_user = "select * from users where status='PENDING'";
$result = mysqli_query($dbc, $sql_pending_user);
$url = "https://p3.cynopsis.co/artemis_novumcapital/default/individual_risk";
$header = ['Content-Type: application/json', 'WEB2PY-USER-TOKEN:03a7a6cb-63b2-47b2-8715-af65aabf28ed'];
while ($user = mysqli_fetch_array($result)) {
    $data = array (
        "rfrID"=>$user['user_id'],
        "first_name"=>$user['first_name'],
        "last_name"=>$user['last_name'],
        "date_of_birth"=>$user['date_birth'],
        "nationality"=>$user['citizenship'],
        "country_of_residence"=>$user['country'],
        "ssic_code"=>"UNKNOWN",
        "ssoc_code"=>"UNKNOWN",
        "onboarding_mode"=>"NON FACE-TO-FACE",
        "payment_mode"=>"UNKNOWN",
        "product_service_complexity"=>"COMPLEX",
        "emails"=>[$user['email']],
        "domain_name"=>"NOVUMCAPITAL"
    );
    callAPI("POST", $url, $data, $header);
}

?>