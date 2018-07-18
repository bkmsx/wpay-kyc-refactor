<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$citizenship = $_POST['citizenship'];
$country = $_POST['country'];
$wallet_address = $_POST['wallet_address'];
$code = 400;
$user_object = array();
$name_regex = '/^[A-Za-z ]+$/';
$date_regex = '/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/';

if (empty($first_name)){
    $message = "First name cannot be empty";
}
elseif (!preg_match($name_regex, $first_name)) {
    $message = "First name must contain only character and space";
}
elseif (empty($last_name)){
    $message = "Last name cannot be empty";
}
elseif (!preg_match($name_regex, $last_name)) {
    $message = "Last name must contain only character and space";
}
elseif (empty($date_of_birth)){
    $message = "Date of birth cannot be empty";
}
elseif (!preg_match($date_regex, $date_of_birth)) {
    $message = "Date of birth must have format DD/MM/YYYY";
}
else{
    // send kyc submission mail
    require_once('send-mail.php');
    require_once('mysqli_connect.php');
    sendMail($_COOKIE['email'], getApplyKycTitle(), getApplyKycMessage($first_name));

    // check Artemis
    $sql_max_id = "select * from users where email='".$_COOKIE['email']."'";
    $result_sql = mysqli_query($dbc, $sql_max_id);
    $user = mysqli_fetch_array($result_sql);

    require_once('request_api.php');
    $url = "https://p3.cynopsis.co/artemis_novumcapital/default/individual_risk";
    $data = array (
        "rfrID"=>$user['user_id'],
        "first_name"=>$first_name,
        "last_name"=>$last_name,
        "date_of_birth"=>$date_of_birth,
        "nationality"=>$citizenship,
        "country_of_residence"=>$country,
        "ssic_code"=>"UNKNOWN",
        "ssoc_code"=>"UNKNOWN",
        "onboarding_mode"=>"NON FACE-TO-FACE",
        "payment_mode"=>"UNKNOWN",
        "product_service_complexity"=>"COMPLEX",
        "emails"=>[$_COOKIE['email']],
        "domain_name"=>"NOVUMCAPITAL"
    );

    $header = ['Content-Type: application/json', 'WEB2PY-USER-TOKEN:03a7a6cb-63b2-47b2-8715-af65aabf28ed'];
    $result_artemis = callAPI("POST", $url, $data, $header);

    $status = "PENDING";
    $json_artemis = json_decode($result_artemis);
    if ($json_artemis) {
        if (isset($json_artemis->approval_status)) {
            $status = $json_artemis->approval_status;
        }	
    }
    if ($status == "CLEARED") {
        sendMail($_COOKIE['email'], getSuccessKycTitle(), getSuccessKycMessage($first_name, $wallet_address));
    }

    // Update Google sheet
    require_once('update-sheet.php');
    updateSheet([$_COOKIE['email'], $first_name." ".$last_name, $date_of_birth, $citizenship, $country, date('d/m/Y h:i:s', time()), $status, $wallet_address], $user['row_number']);

    // Update database
    $sql = "update users set first_name='"
    .$first_name."', last_name='"
    .$last_name."', date_birth='"
    .$date_of_birth."', citizenship='"
    .$citizenship."',country='"
    .$country."', date=now(), status='"
    .$status."', wallet_address='"
    .$wallet_address."' where email='"
    .$_COOKIE['email']."'";
    if(mysqli_query($dbc, $sql)){
        $code = 200;
        $message = "Success";
        $user_object = [
            'first_name' => $first_name,
            'status' => $status,
            'wallet_address' => $wallet_address
        ];
    } else {
        $message = "Cannot register. Please try later.";
    }
    mysqli_close($dbc);
}
$result = [
    'code' => $code,
    'message' => $message,
    'user' => $user_object
];
echo json_encode($result);
?>