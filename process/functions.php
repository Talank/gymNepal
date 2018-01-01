<?php 
//Function to resize the image
function resizeImage($finalWidth,$orgImgPath,$finalImgPath,$type) {
	$func_img='imagecreatefrom'.$type;//text based Function call to create a image
	$imgSave='image'.$type;//text based function call to save the image
	$img=$func_img($orgImgPath);
	list($orgWidth,$orgHeight)=getimagesize($orgImgPath);//get the original width and height
	$finalHeight=($orgHeight/$orgWidth)*$finalWidth;//Maintain the aspect ratio
	$temp=imagecreatetruecolor($finalWidth,$finalHeight);//Create new empty image
	imagecopyresampled($temp,$img,0,0,0,0,$finalWidth,$finalHeight,$orgWidth,$orgHeight);//Resample the image(decrease sample rate) to resize
	return $imgSave($temp,$finalImgPath);//return true or false based on success or failure
}

function sendSms($message,$numbers,$sender) {
	//We are using other apis so ,we do as they say
	//Any modification in these codes may lead to feature faliure
	//Consult the api website for more details
	$username = "buddharajshrestha999@gmail.com";
	$hash = "9ff218c8388b357154241f4c71f07eb0eace0c4a4aa20b8e2329d0732f554d73";
	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
}

function getCount($sql) {
	include"../pages/connect.php";
	$query=mysqli_query($conn,$sql);
	if($query) {
		return mysqli_fetch_object($query)->num;
	} else {
		return 0;
	}
}

?>