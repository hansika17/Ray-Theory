<?php
$conn= new mysqli('localhost','root','','raytheory');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>