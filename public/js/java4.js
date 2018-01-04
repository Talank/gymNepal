$(document).ready(function() {  
 $.ajaxSetup({
 	  headers: {
 	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 	  }
 	});
 $('#content').on('click','#edit',function() {
 	var user_id=$('#user_id').html();
 	$.get('renew/'+user_id,function(data) {
 		$('#renew').html(data);
 	});
 	$('#body').css('overflow','hidden');
 	$('#id02').css('display','block');
 });

 $('#closeCounter').click(function() {
 	$('#id02').css('display','none');
 	$('#body').css('overflow','auto');
 })

 $('#renew').on('click','#renewSubmit',function() {
 	var tender=$("input[name='tender']").val();
 	var amount=$("input[name='amount']").val();
 	var discount=$("input[name='discount']").val();
 	var dueAmount=$("input[name='dueAmount']").val();
 	var cutPrevious=$("input[name='cutPrevious']").val();
 	var preDueAmount=$("input[name='preDueAmount']").val();
 	var date=$("#selectMonths").find(":selected").text();
 	var token=$("input[name='renew_token']").val();
 	var firstname=$("input[name=renew_firstname]").val();
 	var lastname=$("input[name=renew_lastname").val();
 	$.get('update',{_token:token,amount:amount,discount:discount,dueAmount:dueAmount,cutPrevious:cutPrevious,preDueAmount:preDueAmount,date:date,tender:tender,firstname:firstname,lastname:lastname},function(data) {
 		$('#renew').html(data);
 	});

 })
 $('#string').keyup(function() { 
 	var name=$('#string').val();
 	var token=$("#token").val();
 	$.post('search',{name:name,_token:token},function(data) {
 		$('#content').html(data);
 	});
});
});