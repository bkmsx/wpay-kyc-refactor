<?php
	//check if file is ok
	$code = 400;
	if(isset($_FILES['file'])) {
		$name = $_FILES['file']['name'];
		$tmp_name = $_FILES['file']['tmp_name'];
		$extension = strtolower(substr($name, strlen($name) - 3));
		$location = '../files/'.time().'.'.$extension;
		$type = $_FILES['file']['type'];
		$size = $_FILES['file']['size'];
		$max_size = 4194304;
		if (isset($name)){
			if (!empty($name)){
				if (($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension == 'pdf') && $size <= $max_size) {
					
					if (move_uploaded_file($tmp_name, $location)){
                        require_once('mysqli_connect.php');
                        $update_passport = "update users set passport_location = '".substr($location, 2)."' where email='".$_COOKIE['email']."'";
						mysqli_query($dbc, $update_passport);
						$code = 200;
                        $message = "You uploaded the passport photo successfully!";
					} else {
						$message = "Problem upload image, please try with file size smaller. Thank you!";
					}
				} else {
					$message = "Please upload only jpg, jpeg, png or pdf file format. File size must be less than 4MB.";
				}
			} else {
				$message = 'Please choose file to upload';
			}
        } else {
			$message = 'Please choose file to upload';
		}
	} else {
		$message = 'Please choose file to upload';
	}
	$result = [
		'code' => $code,
		'message' => $message
	];
	echo json_encode($result);
?>