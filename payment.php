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
<body 		>
<?php

//read from file here and call the function 


$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'raytheory.com-facilitator@gmail.com'; //Business Email

require_once('database.php');

if(isset($_POST['CheckOut']))
{
	$msg="Hi raytheory, \nYou have recieved an Payment. \nPlease find the details below:";
	$headers = "From: webmaster@example.com" . "\r\n" .
	"CC: somebodyelse@example.com";
	foreach ($_POST as $key => $value) 
	{
		$enquiry_data[$key] = $value;
		$msg .= "\n".$key.":".$value;
	}
	$msg = wordwrap($msg,70);
	mail("contact@raytheory.com","RayTheory Payments",$msg,$headers);
	
	 $sql="INSERT INTO rt_payment (name,email,age,phone,location,note,amount,coursename,customer_ip,status,pay_time) values 
	('".$_POST['name']."','".$_POST['email']."','".$_POST['age']."','".$_POST['phone']."','".$_POST['location']."',
	'".$_POST['note']."','".$_POST['amount']."','".$_POST['coursename']."','".$_POST['customer_ip']."','0',NOW())";
	$conn->query($sql);
}
?>
 <form class="modal-content animate"  method="post" action="<?php echo $paypalURL; ?>" name="jsform">
    <div class="row" id='centerdiv'>

	<div class='col-md-12'>
	<img src='loading-animation.gif'></img>
	<br>
	<span>please wait
	payment is redirecting to paypal payment Gateway
	Dont press back button</span>
	
			<input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="course">
        <input type="hidden" name="item_number" value="1234">
        <input type="hidden" name="amount" value="1.00">
        <input type="hidden" name="currency_code" value="INR">
        
        <!-- Specify URLs -->
  
        
		
			<!-- Specify URLs -->
			<input type='hidden' name='cancel_return' value='http://localhost/raytheoryhsm/paypal_integration_php/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/raytheoryhsm/paypal_integration_php/success.php'>
		</div>	
	</div>
</form>
		
<script>
window.onload = function(){
  document.forms['jsform'].submit();
}
</script>
</body>