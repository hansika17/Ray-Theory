<?php
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'hansika.kalra171@gmail.com'; //Business Email

	$conn= new mysqli('localhost','root','','raytheory');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<h1 align='center'>".htmlspecialchars($_POST["courseName"])."</h1>";
$sql = "SELECT rt_contentdesc , rt_price ,rt_batchmode, rt_newbatchtime FROM `rt_coursedescription` where coursename='".htmlspecialchars($_POST["courseName"])."';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
?>
<html>
  <head>
  <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  </head>
  <body>
   
<br/>Name: <?php echo $row['rt_contentdesc'];}} ?>
     <form action="<?php echo $paypalURL; ?>" method="post">
	  <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
      
	<input type="hidden" name="amount" value="10">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
		<input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>
	  <input type="text" name="customer_ip" value="<?=$_SERVER['REMOTE_ADDR']?>">
      <table>
	  <tr><td><span id="mandatory"></span></td><tr>
        <tr>
	<td>Full Name: 
         <input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /> <span>*</span>
		  <span id="correctName"></span></td></tr>
        
        
          <tr><td>Email: 
          <input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /> <span>*</span>
		  <span id="correctEmail"></span></td></tr>
          <tr><td> Phone: 
         <input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" id="phone"/> <span>*</span>
		  <span id="correctNumber"></span></td></tr>
         <tr><td>Occupation: 
          <input name="occupation" id="occupation" value="<?php echo (empty($posted['occupation'])) ? '' : $posted['occupation']; ?>" /> <span>*</span>
		</td></tr>
        
        
          <tr><td>Age: 
          <input name="age" id="age" value="<?php echo (empty($posted['age'])) ? '' : $posted['age']; ?>" /> <span>*</span>
		  </td></tr>
         <tr><td> Location: 
          <input name="location" value="<?php echo (empty($posted['location'])) ? '' : $posted['location']; ?>" id="location"/> <span>*</span>
		  </td></tr>
		<tr><td> Any Note: 
          <input name="note" value="<?php echo (empty($posted['note'])) ? '' : $posted['note']; ?>" id="note"/> <span>*</span>
		 </td></tr>
		  
		     <td colspan="4"><input type="submit" value="Submit" id="submit" /></td>
        </tr>
      </table>
    </form>
	<script type = "text/javascript">
$("#submit").click(function() {
var name = $("#firstname").val();
var email = $("#email").val();
var phone = $("#phone").val();
var occupation = $("#occupation").val();
var location = $("#location").val();
var age = $("#age").val();
var note = $("#note").val();
$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
if (name == '' || email == '' || phone == '' || occupation == '' || location == '' || age == '' || note == ''  ) {
 event.preventDefault();
  $( "#mandatory" ).text( "please fill required fields" ).show();
} 
 else if (!validateEmail(email)) {
event.preventDefault();
  $( "#correctEmail" ).text( "please fill correct email" ).show();
}
 else if (!validateName(name)) {
event.preventDefault();
  $( "#correctName" ).text( "please enter full name other than special characters and numbers " ).show();
}
else if (!validateNumber(phone)) {
event.preventDefault();
  $( "#correctNumber" ).text( "please fill number of 10 digit" ).show();
}
function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
};
function validateName(sEmail) {
var filter = /^[a-zA-Z\s]+$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
};
function validateNumber(sEmail) {
var filter = /^\d{10}$/;;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
};
});
  </script>