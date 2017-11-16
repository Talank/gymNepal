$(document).ready(function() {  
 
 $('#string').keyup(function() { 
 	var name=$('#string').val();
 	$.post('sql2.php',{name:name},function(data){

 		$('#content').html(data);
 	});

 });
 $("#datepicker").datepicker();
 

});