<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'raytheory.com-facilitator@gmail.com'; //Business Email

require_once('database.php');

if(isset($_POST['CheckOut']))
{

echo $sql="INSERT INTO raytheory.rt_payment (name,email,age,phone,location,note,amount,customer_ip,pay_time) values 
('".$_POST['name']."','".$_POST['email']."','".$_POST['age']."','".$_POST['phone']."','".$_POST['location']."',
'".$_POST['note']."','".$_POST['amount']."','".$_POST['customer_ip']."',NOW())";
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
			<input type="hidden" name="amount" value="<?=$_POST['amount']?>">
        
			<!-- Specify details about the item that buyers will purchase. -->
			<input type="hidden" name="currency_code" value="USD">
		
			<!-- Specify URLs -->
			<input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
			<input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>
		</div>	
	</div>
</form>
		
<script>
window.onload = function(){
  document.forms['jsform'].submit();
}
</script>
</body>