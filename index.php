<!DOCTYPE html>
<html>
<head>

<style>


.thumb {

}
.text, .text-js {
    display: none;
    position: absolute;
    bottom: 50px;
    left: 5%;
    width: 90%;
    background: #999;
    background: rbga(	,0.3);
    text-align: center
}
.thumb:hover .text {
    display: block
}


</style>
 <script src="js/jquery.min.js"></script>
<script>

$('.text').hide().removeClass('text').addClass('text-js');

$('.thumb').hover(function(){
    $(this).find('.text-js').fadeToggle();
});

</script>


<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
 
  <script src="js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>




<body ng-app="myApp">

<nav class="navbar navbar-inverse">


<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <a class="navbar-brand" href="#"><img src='logo.png' align='left' height='30px'></img></a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#contact">Contact</a></li>
      </ul>
      
    </div>
  </div>
     

</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Demo Text</h1>      
    <p>Some More Demo Text</p>
	<a href="#contact">
	<img align='center' src="scroll.gif" z-index="999999" width='150px'></img>
	</a>
	</div>
</div>


<br>

<br>

<br>

<br>

<br>

<br>


<div class="container-fluid bg-3 text-center">    
  <div class="row">
  
  <?php

require_once('database.php');

$sql = "SELECT * FROM rt_coursedescription order by rt_coursename;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<div class='col-sm-3 thumb'>"; 
		echo "<a href='NEWfile.PHP?primarykey=".$row["primarykey"]."' >";
		echo "<img src='".$row["rt_coursename"].".jpg' class='img-responsive' style='width:100%' alt='Image' / > </a>";
		echo "<div class='text'>".$row["rt_conentshortdesc"]."</div>";
		echo "<p>".$row["rt_coursename"]."</p>";
		echo "</div>";
	} 
}	else {
    echo "0 results";
}
$conn->close();

?>
  </div>
</div><br><br>











<a name='contact'/>
<footer>
<center>
<div class='row'>
  <div ng-controller="formCtrl" align='right' class ='col-md-8'>
<form method="post" name="myForm">

<div>
<label>Name:</label>
<input style=" width:350px;" style="color:red" type="text" name="name" ng-model="name" required>
<br><span style="color:red" ng-show="myForm.name.$touched && myForm.name.$invalid">Name is required.</span>
</div>
<div>
<label>Email ID:</label>
<input style=" width:350px;" type="email" name="email_id" ng-model="email_id">
<br><span style="color:red" ng-show="myForm.email_id.$touched && myForm.email_id.$invalid">Email is required.</span>
<span style="color:red" ng-show="myForm.email_id.$touched && myForm.email_id.$invalid">Email is invalid</span>
</div><div>
<label>Contact Number:</label>
<input style=" width:350px;" 	type="number" name="mobile_no" ng-model="mobile_no" ng-model="mobile_no" ng-minlength="10" 
                   ng-maxlength="10"  required>
<br><span style="color:red" ng-show="myForm.mobile_no.$touched && myForm.mobile_no.$invalid">Contact is required.</span>
 <span style="color:red" ng-show="((myForm.mobile_no.$error.minlength ||
                           myForm.mobile_no.$error.maxlength) && 
                           myForm.mobile_no.$dirty)">Please enter a 10 digit number</span>
</div>
<div>
<label>City:</label>
<input style=" width:350px;" type="text" name="city" ng-model="city" required>
<br><span style="color:red" ng-show="myForm.city.$touched && myForm.city.$invalid">City is required.</span>
</div>
<div>
<label>Message:</label>
<textarea placeholder="" style=" width:350px; overflow-y: scroll; height:200px;" type="text" name="enquiry_msg" ng-model="enquiry_msg" required></textarea>
<br><span style="color:red" ng-show="myForm.enquiry_msg.$touched && myForm.enquiry_msg.$invalid">Message is required.</span>
</div>
<br>
<button type="submit" class="btn" ng-click="formsubmit(myForm.$valid)"  ng-disabled="myForm.$invalid">Submit </button>
<h4 style="color:red">{{result}}</h4>
</form>

</div></div>
<p><strong>Note:</strong> The footer tag is not supported in Internet Explorer 8 and earlier versions.</p>

<center></footer>

<script>
var app = angular.module('myApp',['ngRoute']);
app.directive('myDirective', function() {
    return {
        require: 'ngModel',
        link: function(scope, element, attr, mCtrl) {
            function myValidation(value) {
                if (value.length<10 || value.length>10  ) {
                    mCtrl.$setValidity('number', true);
                } else {
                    mCtrl.$setValidity('number', false);
                }
                return value;
            }
            mCtrl.$parsers.push(myValidation);
        }
    };
});
</script>
<script>
var app = angular.module('myApp',[]);
app.controller("formCtrl", ['$scope', '$http', function($scope, $http) {
        $scope.url = 'enquiry_save.php';
        $scope.formsubmit = function(isValid) {
            if (isValid) {
              
                $http.post($scope.url, {"name": $scope.name, "email_id": $scope.email_id, "mobile_no": $scope.mobile_no, "city": $scope.city,
				"enquiry_msg": $scope.enquiry_msg})
                        .then(function (data, status) {
                            console.log(data);
                            $scope.status = status;
                            $scope.data = data;
                            $scope.result = data.data; 
                        })
            }else{
                
                  alert('Form is not valid');
            }
        };
}]);
</script>
</body>


</html>
