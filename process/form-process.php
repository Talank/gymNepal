<?php

include "functions.php";
 $firstname=$_POST['firstname'];

 $lastname=$_POST['lastname'];

 $phone=$_POST['phone'];

 $dob=$_POST['dob'];
 $temp_address=$_POST['temp_address'];
 $perm_address=$_POST['perm_address'];
 $occupation=$_POST['occupation'];
 $plan=$_POST['plan'];
 $issue=$_POST['issue'];
 $image=$_FILES["fileToUpload"]["name"];
 $today=date('Y-m-d');
 $date=date_create($today);

if ($plan == 1) {
  date_add($date,date_interval_create_from_date_string("1 months"));
}
else if($plan ==3){
  date_add($date,date_interval_create_from_date_string("3 months"));
}
else if($plan==6){
  date_add($date,date_interval_create_from_date_string("6 months"));
}
else{
  date_add($date,date_interval_create_from_date_string("12 months"));
}
$plan=date_format($date,"Y-m-d");
echo "Date Calculated:".$plan;

 include"../pages/connect.php";
 $stmt="INSERT into users values('','$firstname','$lastname','$plan','$issue','$image')";
 $stmt2="INSERT into information values('',$phone,'$dob','$temp_address','$perm_address','$occupation')";
  $stmt3="INSERT into status values('',1)";

   $result=mysqli_query($conn,$stmt);
   $result2=mysqli_query($conn,$stmt2);
   $result3=mysqli_query($conn,$stmt3);

   if($result && $result2 && $result3){
   // header("location:../process/search.php");
   }
   else{
    echo "sorry";
   }


?>

<?php
$target_dir = "../Images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType =strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if($imageFileType=="jpg"||$imageFileType=="jpeg")
		$imageFileType='jpeg';
	
    if (resizeImage(500,$_FILES["fileToUpload"]["tmp_name"],$target_file,$imageFileType)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>