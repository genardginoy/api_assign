<?php
require_once("../includes/db_connection.php");
require_once("../includes/functions.php");

//Setting default variable
$msges="";

//Fetch data from given url(json data)
$api_course_data=@file_get_contents('https://api.coursera.org/api/courses.v1');


//Checking the api course data and Parsing the json data
if($api_course_data == false && empty($api_course_data)){
	$api_error=false;
}else{
	$api_course_decode=json_decode($api_course_data,true);
}

if(isset($_POST['save'])){
	$cosId=$_POST['cosId'];
	$cosName=$_POST['cosName'];
	$cosType=$_POST['cosType'];

	//Course data already exists checking
	if(course_exists($cosId)){
		$msges="Course already saved";
	}else{
	//Save data	
	save_data($cosId,$cosName,$cosType);
		$msges="Data Saved Successfully";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>API ASSIGNMENT</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--Bootstrap CDN-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/styles.css">
</head>

<body>
<div class="container headerButtons">   
	<div class="row">
	<div class="col-md-6">
	<a href="view_saved_courses.php" class="btn btn-info viewSaveButton" role="button">View Saved Courses</a>
	<span id="recordCount" class="recordCount"></span>
	</div>
	<div class="col-md-6>">
	<div id="msges"> <span><?php echo !empty($msges) ? $msges : "" ;?></span></div>
	</div>
	</div>
</div>

<div class="container courseDetails">
<h1>Course Details</h1>
<table class="table table-bordered" id="courseTable">
<thead>
<tr><th>Course id</th><th>Course Name</th><th>Course Type</th><th>Action</th></tr>
</thead>
<?php

//looping the data course id,course name,course type
if(isset($api_course_decode['elements'])){
foreach($api_course_decode['elements'] as $course){ ?>
<form method="post" action="index.php">
<tbody>
<tr>
<td><?php echo $course['id']; ?>
<input type="hidden" name="cosId" value="<?php echo $course['id']; ?>"></td>
<td><?php echo htmlentities($course['name']);?>
<input type="hidden" name="cosName" value="<?php echo htmlentities($course['name']); ?>"></td>
<td><?php echo htmlentities($course['courseType']); ?>
<input type="hidden" name="cosType" value="<?php echo htmlentities($course['courseType']); ?>"></td>
<td><input type="submit" class="btn btn-info <?php echo in_array($course['id'],saved_button()) ? "saved" : ""; ?>"  name="save" value="<?php echo in_array($course['id'],saved_button()) ? "Saved" : "Save"; ?>" <?php echo in_array($course['id'],saved_button()) ? "disabled" : ""; ?> ></td>
</tr>
</tbody>
</form>
<?php }}else{ ?>
	<tbody><tr><td colspan="4">Data Not Found..</td></tr></tbody>
<?php }?>
</table>
</div>

<script src="js/script.js"></script>
</body>
</html> 


