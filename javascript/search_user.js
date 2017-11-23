$(document).ready(function(){
  $('#string').keyup(function() { 
 	var id=$('#string').val();
 	$.post('sql3.php',{id:id},function(data){

 		$("#content").html(data);
 	 });
 });
});
