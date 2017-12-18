
	 <link rel="stylesheet" href="css/bootstrap.min.css">
<style>
	 #centerdiv {
    position: fixed;
    top: 20%;
    left: 40%;
    margin-top: -100px;
    margin-left: -200px;
}
</style>

<div class='row'  id ='centerdiv'>
<div class='row-md-12 row-xs-12'>	
<img src='success.gif' align='center' alt=' payment success'></img>
</div>

<div class='row-md-12 row-xs-12'>	
Hi Customer,
</div>
<?php echo $query;?>
<div class='row-md-12 row-xs-12'>	
We Have received your order with transaction number:<?php echo $_GET['txnid'];?>
coursename:<?php echo $_GET['coursename'];?>
Mode:<?php echo $_GET['mode'];?>
</div>

<div class='row-md-12 row-xs-12'>	
Thank you for the order.
</div>

</div>
	
	<?php
require_once('database.php');	

$msg = "Hi \n You have successfully applied to course from ratheory below are the details";

foreach ($_GET as $key => $value) 
	{
		$enquiry_data[$key] = $value;
		$msg .= "\n".$key.":".$value;
	}
$sql="select email,amount from rt_payment where txnid='".$_GET['txnid']."'";
$execute=mysqli_query($conn,$sql);

$result=mysqli_fetch_assoc($execute);
$email=$result['email'];
$headers = "From: contact@raytheory.com";
$msg.="\n amount=".$result['amount'];

mail($email,"RayTheory Course Payment Sucessfully",$msg,$headers);

$query="update rt_payment set status='1' where txnid='".$_GET['txnid']."'"; 	
mysqli_query($conn,$query);


     ?>