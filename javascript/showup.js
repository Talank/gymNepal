//code for showing amount to be paid in the input field
var amount;
function showAmount(){
	var months = document.getElementById('selectMonths').value;
	if(months=="0"){
	      amount ='000';
	    }
		else if (months == "1") {
		  amount =700;
		}
		else if(months =="3"){
		  amount =2100;
		}
		else if(months=="6"){  
		  amount =4200;
		}
		else{
		  amount =8400;
		}
		document.getElementById("amount").value = amount;
}

function showDueAmount(){
	var enteredAmount= document.getElementById("amount").value;
	var dueAmount = amount - enteredAmount;
	document.getElementById("dueAmount").innerHTML = dueAmount;
}

$(document).ready(function(){
  $("#b11").click(function(){
    $("#div2").show();
  });
  $("#b22").click(function(){
    $("#div2").hide();
  });
});