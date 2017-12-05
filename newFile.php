


<?php

$conn= new mysqli('localhost','root','root','raytheory');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT rt_contentdesc , rt_price ,rt_batchmode, rt_newbatchtime FROM `rt_coursedescription` where coursename='".htmlspecialchars($_GET["courseName"])."';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		
		echo "<img align ='left' src=\"".htmlspecialchars($_GET["courseName"]).".jpg\" width=\"500px\" height =\"400px\">";
        echo "<div align ='left' style=\"padding-left=100px;\">".htmlspecialchars($_GET["courseName"]) ."</div><br>";
        echo "<br>"."rt_contentdesc: " . $row["rt_contentdesc"]. "<br>";
        echo "<br>"."rt_price: " . $row["rt_price"]. "<br>";
        echo "<br>"."rt_batchmode: " . $row["rt_batchmode"]. "<br>";
        echo "<br>"."rt_newbatchtime: " . $row["rt_newbatchtime"]. "<br>";
		echo "<br>"."<button > pay </button>";
        }
} else {
    echo "0 results";
}
$conn->close();



?>

