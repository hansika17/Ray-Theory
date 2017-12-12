<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <style>
*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
 <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<?php
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'hansika.kalra171@gmail.com'; //Business Email
$conn= new mysqli('localhost','root','','raytheory');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `rt_coursedescription` where coursename='".htmlspecialchars($_GET["courseName"])."';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo "<body background='wave.svg'><div class='row'>";
		echo "<img  src='".htmlspecialchars($_GET["courseName"]).".jpg' width='100%' height ='60px'><br><br><br><br>";
		echo "<div class='col-md-12'><font size='18'  align='left'>".htmlspecialchars($_GET["courseName"])."</font> </div>";
		echo "<input type='hidden' name='price' value='".$row["rt_onlineprice"]."'";
		echo "<br><br><br><br><br><br>";
		echo "<div class='col-md-9' style='border-style: solid; border-width: thin;'>";
		echo "<div class='col-md-4'> <b>Training Mode <br>Upcoming Slot:-</b></div>";
		echo "<div class='col-md-4'> <b>LIVE ONLINE:</b><br>".$row["rt_onlinebatchtime"]."</div>";
		echo "<div class='col-md-4'> <b>CLASSROOM:</b><br>". $row["rt_offlinebatchtime"]."</div>";
		echo "</div>";
		echo "<div class='col-md-3'> <button onclick=\"document.getElementById('modal-wrapper').style.display='block'\"'><a class='btn btn-primary announce' data-toggle='modal' data-userid='".$row["rt_onlineprice"]."' >Pay Now </a></button> </div>";		
		echo "<br><br>";
		$sql2 = "SELECT * FROM rt_coursehighlights where rt_coursedescription ='".$row["primarykey"]."';";
		
		echo "<br><br><br><br><br><br>
		<div class='col-md-12' style='border-style: solid; border-width: thin;'>";
		$result2 = $conn->query($sql2);

		if ($result2->num_rows > 0)
		{
			// output data of each row
			while($row2 = $result2->fetch_assoc()) 
			{
				echo "<div class='col-md-4'>";
				echo "<img src='".$row2["rt_name"].".jpg'></a>";
				echo "<b>".$row2["rt_name"]."</b>";
				echo $row2["rt_highdesc"];
				echo "</div>";
				
		
			}
		} else 
		{
			echo "No Course description";
		}
		echo "</div>";
        echo "<br><br><br><br><div class='col-md-12'><center> <b> Course Desciption:</b>" . $row["rt_contentdesc"]. "</center></div><br>";
		echo "<br>"."</div>";
        }
} else {
    echo "0 results";
}
$conn->close();

?>
<div  id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="<?php echo $paypalURL; ?>" method="post">
       
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
    </div>

    <div class="container">
	 <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
      
	<input type="hidden" name="amount" id = "priceTag">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
		<input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>
	  <input type="hidden" name="customer_ip" value="<?=$_SERVER['REMOTE_ADDR']?>">
      <table>
	  <span id="mandatory"></span></td><tr>
        <tr>
	<td>Full Name: 
         <input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /> <span>*</span>
		  <span id="correctName"></span>
        
        
          Email: 
          <input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /> <span>*</span>
		  <span id="correctEmail"></span>
           Phone: 
         <input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" id="phone"/> <span>*</span>
		  <span id="correctNumber"></span>
         Occupation: 
          <input name="occupation" id="occupation" value="<?php echo (empty($posted['occupation'])) ? '' : $posted['occupation']; ?>" /> <span>*</span>
		
        
        
          Age: 
          <input name="age" id="age" value="<?php echo (empty($posted['age'])) ? '' : $posted['age']; ?>" /> <span>*</span>
		  
          Location: 
          <input name="location" value="<?php echo (empty($posted['location'])) ? '' : $posted['location']; ?>" id="location"/> <span>*</span>
		  
		 Any Note: 
          <input name="note" value="<?php echo (empty($posted['note'])) ? '' : $posted['note']; ?>" id="note"/> <span>*</span>
		 
		  
		     <input type="submit" value="Submit" id="submit" />
       
    </div>
    
  </form>
  
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
$(document).on("click", ".announce", function () {
     var priceTag = $(this).data('userid');
     $(".modal #priceTag").val( priceTag );
});
</script>
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
</body>

