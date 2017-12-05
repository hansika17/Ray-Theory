


<?php

$conn= new mysqli('localhost','root','root','raytheory');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<h1 align='center'>".htmlspecialchars($_GET["courseName"])."</h1>";
$sql = "SELECT rt_contentdesc , rt_price ,rt_batchmode, rt_newbatchtime FROM `rt_coursedescription` where coursename='".htmlspecialchars($_GET["courseName"])."';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo "<body background='wave.svg'>";
		echo "<br><br><br><br><br><br><img align ='left' src=\"".htmlspecialchars($_GET["courseName"]).".jpg\" width=\"550px\" height =\"400px\">";
        echo "<br><br><div  align='right'><br>";
        echo "<br>"."<font size='4'><b>Course Desciption:</b></font> " . $row["rt_contentdesc"]. "<br>";
        echo "<br>"."<font size='4'><b>Charges:</b></font> " . $row["rt_price"]. "<br>";
        echo "<br>"."<font size='4'><b>Batch Mode:</b></font> " . $row["rt_batchmode"]. "<br>";
        echo "<br>"."<font size='4'><b>New Batch Time:</b></font> " . $row["rt_newbatchtime"]. "<br>";
		echo "<br>"."<button > Pay Now </button></div>";
        }
} else {
    echo "0 results";
}
$conn->close();



?>

