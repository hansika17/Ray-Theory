<head>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 
 <style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}
.active, .accordion:hover {
    background-color: #ccc; 
}
.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
}
</style>


 <style>
*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}
/* Full-width input fields */
input[type=text], input[type=password],input[type=number] {
    width: 35%;
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
    width: 250;
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
<script type = "text/javascript" src="js/jquery.min.js"></script>
</head>


<div class="container-fluid bg-3">  
<?php
require_once('database.php');
$sql = "SELECT * FROM `rt_coursedescription` where primarykey='".htmlspecialchars($_GET["primarykey"])."';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
		
		echo "<body ><div class='row container-fluid bg-3'>";
		echo "<div class='col-md-12'> <img  src='".$row["rt_coursename"].".jpg' width='100%' height ='10%'> </img> </div><br><br><br><br>";
		echo "<div class='col-md-12 container-fluid bg-3'><font size='18'  align='left'>".$row["rt_coursename"]."</font> </div>";
		echo "<br><br><br><br><br><br>";
		echo "<div class='col-md-9 container-fluid bg-3' style='border-style: solid; border-width: thin;'>";
		echo "<div class='row'><div class='col-md-4'> <b>Training Mode <br>Upcoming Slot:-</b></div>";
		echo "<div class='col-md-4'> <b>LIVE ONLINE:</b><br>".$row["rt_onlinebatchtime"]."</div>";
		echo "<div class='col-md-4'> <b>CLASSROOM:</b><br>". $row["rt_offlinebatchtime"]."</div>";
		echo "</div></div>";
		echo "<div class='col-md-3'> <button align='right' onclick=\"document.getElementById('modal-wrapper').style.display='block'\"'> Pay Now</button> </div>";	
		echo "<br><br>";
		$sql2 = "SELECT * FROM rt_coursehighlights where rt_coursedescription ='".$row["primarykey"]."';";
		
		echo "<br><br><br>
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
		
		$sql3 = "SELECT * FROM rt_coursecontentdescription where rt_coursedescription ='".$row["primarykey"]."';";
		
		echo "<br><br><br>";
				echo "<div class='col-md-12' style='border-style: solid; border-width: thin;'>";
		$result3 = $conn->query($sql3);
		if ($result3->num_rows > 0)
		{
			// output data of each row
			while($row3 = $result3->fetch_assoc()) 
			{
				echo "<div class='col-md-12'>";
				echo "<br/>";
				echo "<button onclick=\"myFunction('".$row3["rt_name"]."')\" class='w3-button w3-block w3-black w3-left-align'>".$row3["rt_name"]." (".$row3["rt_contenttime"].")     >></button>";
				echo "<div id='".$row3["rt_name"]."' class='w3-hide w3-animate-zoom'>";
				echo "<p class='w3-button w3-block w3-left-align'>".$row3["rt_divdescription"]."</p>";
				echo "</div>";
				echo "</div>";
				
		
			}
		} else 
		{
			echo "No Course description";
		}
		
		
		
		echo "<br>"."</div>";
        
} else {
    echo "0 results";
}
$conn->close();
echo "</div>";
?>
</div>
<link rel="stylesheet" href="css/w3.css">




<div id="modal-wrapper" class="modal" >
  
  <form class="modal-content animate"  method="post" action="payment.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
    </div>
	<br>
    <div class="container">
	
		<input type="hidden" name="customer_ip" value="<?=$_SERVER['REMOTE_ADDR']?>">
        <input type="hidden" name="coursename" value="<?php echo $row['rt_coursename'];?>">
		
		<div class='row'>
				 <div class='col-md-3'>Online: <br><input checked type="radio" id="priceFirst" name="amount" value="<?php echo $row['rt_onlineprice'];?>"><?php echo $row['rt_onlineprice'];?></input>&#36; or &#8377;</div>
				<div class='col-md-6'> Offline: <br><input type="radio" id="priceSecond" name="amount" value="<?php echo $row['rt_offlineprice'];?>"><?php echo $row['rt_offlineprice'];?></input>&#36; or &#8377;</div>
        </div>
		
		 <span style="color:red" id="mandatory"></span>
		  <br/>
		<input name="name" id="name" value="<?php echo (empty($posted['name'])) ? '' : $posted['name']; ?>" placeholder="Full Name" type="text" >    
		  <br/> 
		  <span style="color:red" id="correctName"></span>
		  <br/>
	        <input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" placeholder="Email" type="text"/> 
		  <br/> 
		  <span style="color:red" id="correctEmail"></span> 
		  <br/>
		<input placeholder="Phone" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" id="phone" type="text"/>  
		  <br/>
		 <span style="color:red" id="correctNumber"></span>   
		  <br/>
	        <input type="text" placeholder="Occupation" name="occupation" id="occupation" value="<?php echo (empty($posted['occupation'])) ? '' : $posted['occupation']; ?>" />
			<br/>
		  <br/>
      <input type="text" placeholder="Age" name="age" id="age" value="<?php echo (empty($posted['age'])) ? '' : $posted['age']; ?>" />   
		  <br/>
		  <span style="color:red" id="correctAge"></span>
		  <br/>
		  <input type="text" placeholder="Location" name="location" value="<?php echo (empty($posted['location'])) ? '' : $posted['location']; ?>" id="location"/> 
      <br/>
	  <br/>
	   <input type="text" name="note" placeholder="Any Note" value="<?php echo (empty($posted['note'])) ? '' : $posted['note']; ?>" id="note"/> 
	  <br/>
	 <br/>
	 <button type="submit" value="CheckOut" id="submit" name="CheckOut">CheckOut</button>   
    </div>
    
  </form>
  
  
</div>
<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script>
// If user clicks anywhere outside of the modal, Modal will close
var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script type = "text/javascript">
$("#submit").click(function() {
var name = $("#name").val();
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
else if (!validateAge(age)) {
event.preventDefault();
  $( "#correctAge" ).text( "Age must be in 2 digit number only" ).show();
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
function validateAge(sEmail) {
var filter =  /^\d{1,2}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
};
function validateNumber(sEmail) {
var filter = /^\d{10}$/;
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