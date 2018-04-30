<?php 
require_once("../includes/db_connection.php");
require_once("../includes/functions.php");
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
	<a href="index.php" class="btn btn-info viewSaveButton" role="button">Course Details</a>
	<span class="recordCount"><?php echo "( ".count_records()." ) Courses Saved"; ?>   </span>
	</div>
	
	</div>
</div>

<div class="container">
<h1>Saved Courses</h1>
<table class="table table-bordered">
<thead>
<tr><th>Index</th><th>Course Id</th><th>Course Name</th><th>Course Type</th></tr>
</thead>
<?php

$display_query=display_saved_courses();
if($display_query){

//looping the Saved datas course id,course name,course type from db
while($cos=mysqli_fetch_assoc($display_query)){ ?>
	<tbody>
	<tr>
	<td><?php echo $cos['api_assign_id'] ?></td>
	<td><?php echo $cos['course_id'] ?></td>
	<td><?php echo htmlentities($cos['course_name']); ?></td>
	<td><?php echo htmlentities($cos['course_type']); ?></td>
	</tr>
	</tbody>
<?php }}else{ ?>
	<tbody><tr><td colspan="4">No Courses Saved..</td></tr></tbody>
<?php }?>
</table>
</div>

</body>
</html> 