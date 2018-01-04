
<div class="jumbotron text-center">
	<img src=../Images/bullsgym.jpg width="80" height="80" class="img-rounded" alt="Bulls Gyms">
	<div  align="center"><p>Bulls Gym Association,Nayabazar</p></div>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Reciept
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<td>
									Name
								</td>
								<td class="text-left">
									<b>{{$fristname}} {{$lastname}}</b>
								</td>
							</tr>
							<tr>
								<td>
									Registration id
								</td>
								<td  class="text-left">
									<b>{{$user_id}}</b>
								</td>
							</tr>
							<tr>
								<td>
									Date of payment
								</td>
								<td class="text-left">
									<b>@php
										echo date('y-m-d');
										@endphp
									</b>
								</td>
							</tr>
							<tr>
								<td>
									Status
								</td>
								<td  class="text-left">
									<b>@if($due>0)
										NOT CLEAR
										@else
										CLEAR
										@endif</b>
								</td>
							</tr>
							<tr>
								<td>
									Amount To Be Paid:
								</td>
								<td class="text-left">
									Rs:<b>{{$amount}}</b>
								</td>
							</tr>
							<tr>
								<td>
									Due amount
								</td>
								<td class="text-left">
									Rs:<b>{{$due}}</b>
								</td>
							</tr>
							<tr>
								<td>
									Net Amount
								</td>
								<td class="text-left">
									Rs:<b>{{$amount-$amount*0.01*$discount}}</b>
								</td>
							</tr>
							<tr>
								<td>
									Tender
								</td>
								<td class="text-left">
									Rs:<b>{{$tender}}</b>
								</td>
							</tr>
							<tr>
								<td>
									Return
								</td>
								<td class="text-left">
									Rs:<b>@if($tender<=$amount)
										0
										@else
										{{$tender-$amount+$amount*0.01*$discount}}
										@endif</b>
								</td>
							</tr>
							<tr>
								<td>
									Signature
								</td>
								<td class="text-left">
									<b>-----------</b>
								</td>
							</tr>
						</table>
					</div>
				</div>
			
	</div>
		</div>
		
	</div>
	<div class="text-center">
		<button class="btn btn-primary" onclick="printPage()" id="print">print</button>
		<a href="destroy_session.php"><button class="btn btn-danger" id="back">back</button></a>
	</div>
	
</div>