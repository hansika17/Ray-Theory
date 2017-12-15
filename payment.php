<?php
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'raytheory.com-facilitator@gmail.com'; //Business Email

$conn= new mysqli('localhost','root','','raytheory');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['CheckOut']))
{
	print_r($_POST);
	
}
?>
 <form class="modal-content animate"  method="post" action="<?php echo $paypalURL; ?>" name="jsform">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
    </div>

    <div class="container">
	
	<span>please wait
	payment is redirecting to paypal payment Gateway
	Dont press back button</span>
	
		<input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="amount" value="10.00">
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="currency_code" value="USD">
		</div>
		</form>
		<script>
window.onload = function(){
  document.forms['jsform'].submit();
}
</script>