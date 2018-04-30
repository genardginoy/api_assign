<?php 

/**********************
*******FUNCTIONS*******
**********************/

//confim query
function confirm_query($result_set){
if(!$result_set){
	die("database query failed");
}
}

//mysqli query function 
function my_query($sql){
	global $db_connection;
	$query=mysqli_query($db_connection,$sql);
	return $query;
}

//escaping values
function escape_value($escape_value){
	global $db_connection;
	$escape_val=mysqli_real_escape_string($db_connection,$escape_value);
	return $escape_val;
}

//save data to db
function save_data($course_id,$course_name,$course_type){
	global $db_connection;
	$cos_id=escape_value($course_id);
	$cos_name=escape_value($course_name);
	$cos_type=escape_value($course_type);

	$save_query="INSERT INTO api_courses (";
	$save_query.="course_id,course_name,course_type";
	$save_query.=") VALUES (";
	$save_query.="'{$cos_id}','{$cos_name}','{$cos_type}')";
	$save=my_query($save_query);
	confirm_query($save);

	if($save && mysqli_affected_rows($db_connection)==1){
		return true;
	}else{
		return false;
	}

}


//course already exists
function course_exists($cosid){
	global $db_connection;
	$course_id=escape_value($cosid);
	$exists_query="SELECT course_id FROM api_courses ";
	$exists_query.="WHERE course_id='{$course_id}' ";
	$query=my_query($exists_query);
	confirm_query($query);
	if(mysqli_num_rows($query) != 0){
		return true;
	}else{
		return false;
	}
}

function saved_button(){
	$arr=array();
	global $db_connection;
	$exists_query="SELECT course_id FROM api_courses";
	$query=my_query($exists_query);
	confirm_query($query);
	while($row=mysqli_fetch_assoc($query)){
			$arr[]=$row['course_id'];
	}
	return $arr;
}

//Function to display Saved courses
function display_saved_courses(){
	global $db_connection;
	$display_query="SELECT * FROM api_courses";
	$query=my_query($display_query);
	confirm_query($query);
	if(mysqli_num_rows($query) != 0){
		return $query;
     }else{
     return false;	
     }
}

//Count records
function count_records(){
	global $db_connection;
	$count_query="SELECT api_assign_id FROM api_courses";
	$query=my_query($count_query);
	confirm_query($query);
	if($query){
		$count_saved_courses=mysqli_num_rows($query);
		if($count_saved_courses > 0 ){
			return $count_saved_courses;
		}else{
			return 0;
		}
	}
}


?>