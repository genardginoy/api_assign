
$(document).ready(function(){
   
   var text=$('#courseTable >tbody >tr').text();
   if(text !== "Data Not Found.."){
   	 var rowCount = $('#courseTable >tbody >tr').length;
   $("#recordCount").text("( " + rowCount + " ) Courses");
   }else{
   	   $("#recordCount").text("( " +0+ " ) Courses");
   }
   //console.log(text);
   //alert(rowCount);
});
