<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/paths.php');
require WPAY_PATH.'/vendor/autoload.php';

function updateSheet($values, $row){
	$client = new Google_Client();
	
	$client->setApplicationName('Wpay Sheet');
	$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
	$client->setAccessType('online');
	
	$client->setAuthConfig(__DIR__ . '/wpay_sheet.json');

	$sheets = new Google_Service_Sheets($client);

	$spreadsheetId = "1ufOWChyLzbrsDebbP2MxLYutb1bykwq_6n7cI_MNINM";

	$updateRange = 'emails!A'.$row.':H'.$row;
	$updateBody = new Google_Service_Sheets_ValueRange([
	    'majorDimension' => 'ROWS',
	    'values' => [$values],
	]);
	//print_r($sheets->spreadsheets_values);exit;

	try {
		$sheets->spreadsheets_values->update(
			$spreadsheetId,
			$updateRange,
			$updateBody,
			['valueInputOption' => 'USER_ENTERED']
		);	

	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

?>