<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
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
input[type=text], input[type=password] {
    width: 400;
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
</style>
</head>
<?php

$conn= new mysqli('localhost','root','root','raytheory');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `rt_coursedescription` where coursename='".htmlspecialchars($_GET["courseName"])."';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo "<body ><div class='row'>";
		echo "<img  src='".htmlspecialchars($_GET["courseName"]).".jpg' width='100%' height ='60px'><br><br><br><br>";
		echo "<div class='col-md-12'><font size='18'  align='left'>".htmlspecialchars($_GET["courseName"])."</font> </div>";
		echo "<br><br><br><br><br><br>";
		echo "<div class='col-md-9' style='border-style: solid; border-width: thin;'>";
		echo "<div class='col-md-4'> <b>Training Mode <br>Upcoming Slot:-</b></div>";
		echo "<div class='col-md-4'> <b>LIVE ONLINE:</b><br>".$row["rt_onlinebatchtime"]."</div>";
		echo "<div class='col-md-4'> <b>CLASSROOM:</b><br>". $row["rt_offlinebatchtime"]."</div>";
		echo "</div>";
		echo "<div class='col-md-3'> <button onclick=\"document.getElementById('modal-wrapper').style.display='block'\"'> Pay Now </button> </div>";		
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
		

		$sql3 = "SELECT * FROM rt_coursecontentdescription where rt_coursedescription ='".$row["primarykey"]."';";
		
		echo "<br><br><br>";
		
		$result3 = $conn->query($sql3);

		if ($result3->num_rows > 0)
		{
			// output data of each row
			while($row3 = $result3->fetch_assoc()) 
			{
				echo "<div class='col-md-12'>";
				echo "<button class='accordion'> >".$row3["rt_name"]." (".$row3["rt_contenttime"].")</button>";
				echo "<div class='panel'>";
				echo "<p >".$row3["rt_divdescription"]."</p>";
				echo "</div>";
				echo "</div>";
				
		
			}
		} else 
		{
			echo "No Course description";
		}

		
		
		
		echo "<br>"."</div>";
        }
} else {
    echo "0 results";
}
$conn->close();

?>





<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
    </div>

    <div class="container">
	      <input type="RADIO" style="margin:26px 30px;"> SDFS       <input type="radio" style="margin:26px 30px;"> AJKSDFJK
		  <br/>
		  <br/>
      <input type="password" placeholder="Demo Content" name="psw">        
		  <br/>
	        <input type="text" placeholder="Demo Content" name="uname">
		  <br/>
      <input type="password" placeholder="Demo Content" name="psw">    
		  <br/>
	        <input type="text" placeholder="Demo Content" name="uname">
		  <br/>
      <input type="password" placeholder="Demo Content" name="psw">    
		  <br/>
      <button type="submit">Login</button>     
    </div>
    
  </form>
  
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
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
</body>

