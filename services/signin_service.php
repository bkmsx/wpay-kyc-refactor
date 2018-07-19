<?php
$email = $_POST['email'];
$password = $_POST['password'];
$user_object = array();
$code = 400;
if (!empty($email) && !empty($password)){
	require_once('mysqli_connect.php');
	$query = "select * from users where email = '$email'";
	$result = mysqli_query($dbc, $query);
	if (mysqli_num_rows($result) > 0){
		$user = mysqli_fetch_array($result);
		if (password_verify($password, $user['password'])){
			$code = 200;
			$message = "Success";
			$user_object = [
				'email' => $user['email'],
				'first_name' => $user['first_name'],
				'status' => $user['status']
			];
		} else {
			$message = "Password is incorrect";
		}
	} else {
		$message = "Email is incorrect";
	}
	mysqli_close($dbc);
} else {
	$message = 'Email or password cannot be empty';
}
$result = [
	'code' => $code,
	'message' => $message,
	'user' => $user_object
];
echo json_encode($result);
?>