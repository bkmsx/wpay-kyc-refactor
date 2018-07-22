<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
if (isset($_GET['user_id'])) {
    $user_sql = "select * from users where user_id='".$_GET['user_id']."'";
    $user_result = mysqli_query($dbc, $user_sql);
    $user = mysqli_fetch_assoc($user_result);
    echo json_encode($user);
} else {
    $users_sql = "select * from users";
    $users_result = mysqli_query($dbc, $users_sql);
    $users = array();
    while($user = mysqli_fetch_assoc($users_result)) {
        array_push($users, $user);
    }
    echo json_encode($users);
}
mysqli_close($dbc);
?>