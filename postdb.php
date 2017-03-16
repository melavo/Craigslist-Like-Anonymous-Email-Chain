<?php
if(!session_id()) session_start();
require_once './api/api.db.php';
require_once './api/Config.php';
require_once './api/api.zoho.php';
if(isset($_POST["submit"])) {
	$zoho = new Zoho(array('authtoken'=>zoho_token,'zoid'=>zoho_zoid));//change your account
	$realEmail = "webmater@demo.com";// you can change to other email
	
	/*
	create random email and post to zoho
	and this email display on site
	*/
	$emailRandomw = generateRandomString(14).'@'.zoho_domain; // change to yourdomain
	
	$dataCreateEmail = array(
			"role"=>"member",
			"emailAddress"=>$emailRandomw,
			"primaryEmailAddress"=>$emailRandomw,
			"timeZone"=> "America/Chicago",
			"language"=>"En",
			"displayName"=> $_POST['ads_name'],
			"password"=>"Abc@123",
			"userExist"=>false,
			"country"=>"us"
			);
	
	$zuid = $zoho->createEmail($dataCreateEmail);
	
	// add forwarding to real email
	$dataForwarding = array("zuid"=>$zuid,
							"accountId"=>$emailRandomw,
							"mailForward"=>array( 
										"mailForwardTo"=>$realEmail
							),
							"mode"=>"enableMailForward");
	$zoho->addforwarding($dataForwarding);
	
	
	$target_dir = "./uploads/";
	$target_file = $target_dir . basename($_FILES["ads_img"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["ads_img"]["tmp_name"]);
	if($check !== false) {
		move_uploaded_file($_FILES["ads_img"]["tmp_name"],$target_file);
	}
	
	DB::insert('ads', array(
	  'ads_name' => $_POST['ads_name'],
	  'ads_content' => $_POST['ads_content'],
	  'ads_img' => 'uploads/'.basename($target_file),
	  'email_reply' => $emailRandomw,
	  'status' => $_POST['status']
	));
	echo "done";
}
header('Location: formads.php');
exit;
?>