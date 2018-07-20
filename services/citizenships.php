<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
$sql = "select * from nationality";
$result = mysqli_query($dbc, $sql);
$nations = array();
$countries = array();
while ($nation = mysqli_fetch_array($result)) {
    array_push($nations, $nation['nationality']);
    array_push($countries, $nation['country']);
};
sort($nations);
sort($countries);
$result = [
    'nations' => $nations,
    'countries' => $countries
];
mysqli_close($dbc);
echo json_encode($result);
?>