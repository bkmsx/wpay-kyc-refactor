<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require_once(WPAY_PATH.'/PHPMailer/Exception.php');
require_once(WPAY_PATH.'/PHPMailer/PHPMailer.php');
require_once(WPAY_PATH.'/PHPMailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// testMail("coco@novum.capital", "Coco");
// testMail("tien@novum.capital", "Tien");
// testMail("shauntan3@gmail.com", "Shauntan");

function testMail($test_mail, $test_name) {
	// sendMail($test_mail, getApplyKycTitle(), getApplyKycMessage($test_name));
	// sendMail($test_mail, getSuccessKycTitle(), getSuccessKycMessage($test_name, "0x9208b9e23ecdeefbbbe65d7022d19f9d4a9d64a4"));
	// sendMail($test_mail, getApplyTransactionTitle(), getApplyTransactionMessage($test_name, "0x9208b9e23ecdeefbbbe65d7022d19f9d4a9d64a4"));
	// sendMail($test_mail, getSuccessTransactionTitle(), getSuccessTransactionMessage($test_name, "0x9208b9e23ecdeefbbbe65d7022d19f9d4a9d64a4"));
	// sendMail($test_mail, getResubmissionTitle(), getResubmissionMessage($test_name));
	// sendMail($test_mail, getTransactionResubmissionTitle(), getTransactionResubmissionMessage($test_name));
	// sendMail($test_mail, getUsdTransactionDetailTitle(), getUsdTransactionDetailMessage($test_mail, "100"));
	// sendMail($test_mail, getETHTransactionDetailTitle(), getETHTransactionDetailMessage("1"));	
	// sendMail($test_mail, getBTCTransactionDetailTitle(), getBTCTransactionDetailMessage("1"));	
	sendMail($test_mail, getXLMTransactionDetailTitle(), getXLMTransactionDetailMessage("1"));
	// sendMail($test_mail, getUserWithoutTransactionTitle(), getUserWithoutTransactionMessage($test_name));	
}

function sendMail($to, $subject, $message) {
	$mail = new PHPMailer;
	try {
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "tien@novum.capital";
		$mail->Password = "congacon90@";

	    $mail->setFrom('hello@wpay.sg', 'W Green Pay');
	    $mail->addAddress($to); 
	    //Content
	    $mail->isHTML(true);                               
	    $mail->Subject = $subject;
	    $mail->Body    = $message;
	    $mail->send();
	} catch (Exception $e) {
	    
	}
}

// Kyc submission
function getApplyKycTitle() {
	$title = "Thank you for participating in our KYC!";
	return $title;
}

function getApplyKycMessage($username) {
	$message = file_get_contents("../mail_templates/apply_kyc.html");
	$message = str_replace("%username%", $username, $message);
	return $message;
}

// Kyc passed
function getSuccessKycTitle() {
	$title = "Yay, your account has been approved!";
	return $title;
}

function getSuccessKycMessage($username, $walletaddress) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/success_kyc.html");
	$message = str_replace("%username%", $username, $message);
	$message = str_replace("%walletaddress%", $walletaddress, $message);
	return $message;
}

//Transaction submission
function getApplyTransactionTitle() {
	$title = "Thank you for submitting your transaction details!";
	return $title;
}

function getApplyTransactionMessage($username, $walletaddress) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/apply_transaction.html");
	$message = str_replace("%username%", $username, $message);
	$message = str_replace("%walletaddress%", $walletaddress, $message);
	return $message;
}

//Transaction success
function getSuccessTransactionTitle() {
	$title = "Yay, your payment has been verified!";
	return $title;
}

function getSuccessTransactionMessage($username, $walletaddress) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/success_transaction.html");
	$message = str_replace("%username%", $username, $message);
	$message = str_replace("%walletaddress%", $walletaddress, $message);
	return $message;
}

//Kyc resubmission
function getResubmissionTitle() {
	$title = "Uh-oh, please complete your KYC submission!";
	return $title;
}

function getResubmissionMessage($username) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/resubmission.html");
	$message = str_replace("%username%", $username, $message);
	return $message;
}

//Transaction resubmission
function getTransactionResubmissionTitle() {
	$title = "[Payment Expired] Please resubmit your contribution details!";
	return $title;
}

function getTransactionResubmissionMessage($username) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/resubmission_transaction.html");
	$message = str_replace("%username%", $username, $message);
	return $message;
}

//Usd transaction reminder
function getUsdTransactionDetailTitle() {
	$title = "Please complete your W Green Pay purchase!";
	return $title;
}

function getUsdTransactionDetailMessage($email, $amount) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/usd_transaction_detail.html");
	$message = str_replace("%email%", $email, $message);
	$message = str_replace("%amount%", $amount, $message);
	return $message;
}

//ETH transaction reminder
function getETHTransactionDetailTitle() {
	$title = "Please complete your W Green Pay tokens purchase!";
	return $title;
}

function getETHTransactionDetailMessage($amount) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/eth_transaction_detail.html");
	$message = str_replace("%amount%", $amount, $message);
	return $message;
}

//BTC transaction reminder
function getBTCTransactionDetailTitle() {
	$title = "Please complete your W Green Pay tokens purchase!";
	return $title;
}

function getBTCTransactionDetailMessage($amount) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/btc_transaction_detail.html");
	$message = str_replace("%amount%", $amount, $message);
	return $message;
}

//XLM transaction reminder
function getXLMTransactionDetailTitle() {
	$title = "Please complete your W Green Pay tokens purchase!";
	return $title;
}

function getXLMTransactionDetailMessage($amount) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/xlm_transaction_detail.html");
	$message = str_replace("%amount%", $amount, $message);
	return $message;
}

//check user without transaction
function getUserWithoutTransactionTitle() {
	$title = "You haven't completed your W Green Pay tokens purchase!";
	return $title;
}

function getUserWithoutTransactionMessage($name) {
	$message = file_get_contents(WPAY_PATH."/mail_templates/user_without_transaction.html");
	$message = str_replace("%username%", $name, $message);
	return $message;
}
?>