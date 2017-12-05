<?php
$conn=new mysqli('localhost','root','','raytheory');
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);

if(!empty($post_date))
{
	$name=$_POST['name'];
	$email_id=$_POST['email_id'];
	$mobile_no=$_POST['mobile_no'];
	$city=$_POST['city'];
	$enquiry_msg=$_POST['enquiry_msg'];
	$error=0;
	if(!empty($name) && !empty($email_id) && !empty($mobile_no) && !empty($city) && !empty($enquiry_msg))
	{
		$sql="INSERT INTO rt_enquiry(email_id, city, mobile_no, enquiry_msg) values('$email_id','$city','$mobile_no','$enquiry_msg')";
		$saved=mysqli_query($conn,$sql);
	}
	if($saved)
	{
		$message="enquiry is saved"; 
	}
	else
	{
		$message="enquiry is not saved please try again later";
	}
}
?>

