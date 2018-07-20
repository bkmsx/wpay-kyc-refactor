<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/services/utils/mysqli_connect.php');
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPass = $_POST['confirm_pass'];
$code = 400;
$user_object = array();
if (empty($email)){
    $message = 'Email cannot be empty';
}
elseif (empty($password)) {
    $message = 'Password cannot be empty';
}
elseif (empty($confirmPass)) {
    $message = 'Confirm password cannot be empty';
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $message = "Invalid email format";
} 
elseif (strlen($password) < '6') {
    $message = "Password must contain at least 6 characters";
} 
elseif(!preg_match("#[0-9]+#",$password)) {
    $message = "Password must contain number!";
}
elseif(!preg_match("#[A-Z]+#",$password)) {
    $message = "Password must contain capital letter";
}
elseif(!preg_match("#[a-z]+#",$password)) {
    $message = "Password must contain lowercase letter";
} 
elseif($password != $confirmPass) {
    $message = "Passwords don't match";
}
else {
    
    $query = "select * from users where email = '$email'";
    $result = @mysqli_query($dbc, $query);
    if (mysqli_num_rows($result) > 0){
        $message = "Email already exists";
    } else {
        $encrypt_pass = password_hash($password, PASSWORD_BCRYPT);
        $sql_count_row = "select count(user_id) as row_count from users";
        $row_count = mysqli_fetch_array(mysqli_query($dbc, $sql_count_row));
        $row_number = $row_count['row_count'] + 2;
        $sql_update = "insert into users (email, password, date, row_number) values 
        ('$email', '$encrypt_pass', now(), '$row_number')";
        if (mysqli_query($dbc, $sql_update)) {
            $code = 200;
            $message = 'Success';
            $names = explode('@', $email);
            $user_object = [
                'email' => $email,
                'first_name' => $names[0]
            ];
        } else {
            $message = 'Can not register right now';
        }
    }
    
}
$result = [
    'code' => $code,
    'message' => $message,
    'user' => $user_object
];
mysqli_close($dbc);
echo json_encode($result);
?>


