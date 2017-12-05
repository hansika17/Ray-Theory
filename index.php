
<!DOCTYPE html>
<html>
<title>RayTheory</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>


#overlay {
    z-index:100;
}

.image { 
   position: relative; 
   width: 100%; /* for IE 6 */
}

h2 { 
   position: absolute; 
   top: 200px; 
   left: 0; 
   width: 100%; 
   color: orange;
   text-align: center;
}

.mySlide {display:none;}


footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> 
<body ng-app="myApp">


<div  width='100%'>
  <div class="mySlide w3-container w3-grey">
  <img src='logo.png' align='left' width='100px'>
  <center>
   <h1><b>Demo Content</b></h1>
    <h1><i>Another Demo Content with more content..>>>......>>></i></h1>
   <h1><b>Demo Content</b></h1>
    <h1><i>Another Demo Content with more content..>>>......>>></i></h1>
    <h1><b>Demo Content</b></h1>
    <h1><i>Another Demo Content with more content..>>>......>>></i></h1>
	<br><br><br>	
<div id='overlay'>
<a href="#down"><img src="scroll.gif"  height='100px'></img></a><br>
<div>
</center>
  </div>

  

 

  
</div>

<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlide");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(carousel, 2000); 
}
</script>



<br><br><br>

<br><br><br>
<br><br><br>



<style>
.mySlides {display:none}
.demo {cursor:pointer}
</style>



<a name='down'>
<div class="w3-content" style="max-width:700px">
  <a class="mySlides" href='newFile.php?courseName=firstCourse'>
 <div class="image"> <img src="firstCourse.jpg" style="width:100%"/>
	  <h2>firstCourse:Short Desciption</h2></div>
	  </a>
	  <a class="mySlides" href='newFile.php?courseName=secondCourse'>
 <div class="image"> <img  src="secondCourse.jpg" style="width:100%"/>
    <h2>secondCourse:Short Desciption</h2></div>
	  </a>
	  <a class="mySlides" href='newFile.php?courseName=thirdCourse'>
  <div class="image"><img src="thirdCourse.jpg" style="width:100%"/>
		<h2>thirdCourse:Short Desciption</h2></div>
	  </a>
	  <a class="mySlides" href='newFile.php?courseName=fourthCourse'>
 <div class="image"> <img  src="fourthCourse.jpg" style="width:100%"/>
<h2>fourthCourse:Short Desciption 	</h2></div>
	  </a>
	  
  
  
   

  <div class="w3-row-padding w3-section">
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="mean-stack-master - Copy.jpg" style="width:70%" onclick="currentDiv(1)">firstCourse
	
    </div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="Data-Scientist - Copy.jpg" style="width:70%" onclick="currentDiv(2)">secondCourse
	  
	</div>
    <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="Digital-marketing-head - Copy.jpg" style="width:70%" onclick="currentDiv(3)">thirdCourse
	   
	</div>
	 <div class="w3-col s3">
      <img class="demo w3-opacity w3-hover-opacity-off" src="Data-Scientist - Copy.jpg" style="width:70%" onclick="currentDiv(4)">fourthCourse
	   
    </div>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}

document.getElementsByClassName("mySlides");
</script>
<footer>
  <p>Posted by: Hege Refsnes</p>
  <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p>
  <div ng-controller="formCtrl">
<form method="post" name="myForm">
<div>
<label>Name:</label>
<input style="color:red" type="text" name="name" ng-model="name" required>
<span style="color:red" ng-show="myForm.name.$touched && myForm.name.$invalid">Name is required.</span>
</div>
<div>
<label>Email ID:</label>
<input type="email" name="email_id" ng-model="email_id">
<span style="color:red" ng-show="myForm.email_id.$touched && myForm.email_id.$invalid">Email is invalid</span>
</div><div>
<label>Contact Number:</label>
<input  type="text" name="mobile_no" ng-model="mobile_no" required my-directive>
<span style="color:red" ng-show="myForm.mobile_no.$touched && myForm.mobile_no.$invalid">contact number must be of 10 digit.</span>
</div>
<div>
<label>City:</label>
<input type="text" name="city" ng-model="city" required>
<span style="color:red" ng-show="myForm.city.$touched && myForm.city.$invalid">City is required.</span>
</div>
<div>
<label>Message:</label>
<input type="text" name="enquiry_msg" ng-model="enquiry_msg" required>
<span style="color:red" ng-show="myForm.enquiry_msg.$touched && myForm.enquiry_msg.$invalid">Message is required.</span>
</div>
<button type="submit" class="btn" ng-click="formsubmit(myForm.$valid)"  ng-disabled="myForm.$invalid">Submit </button>
</form>
</div>
<p><strong>Note:</strong> The footer tag is not supported in Internet Explorer 8 and earlier versions.</p></footer>

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
                            $scope.result = data; 
                        })
            }else{
                
                  alert('Form is not valid');
            }

        };
}]);
</script>
</body>


</html>

