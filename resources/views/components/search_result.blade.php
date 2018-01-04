<div class="table-responsive"><table id=t1 class="table table-bordered">
	<thead class="thead-light">
		<tr>
			<th scope="col">Reg no.</th>
			<th scope="col">Dp</th>
			<th scope="col">Name</th>
			<th scope="col">address</th>
			<th scope="col">R.day</th>
			<th scope="col">Status</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
<tbody>
@foreach($users as $user)
	@php
		$duedate=date_create($user->duedate);
		$today=date_create(date('y-m-d',time()));
		$count=date_diff($duedate,$today)->format("%R%a");
	@endphp
	<tr>
		<td id="user_id">{{$user->id}}</td>
		<td><img src="/xxx.jpg" height=70 width=70 style="padding:10px;"></td>
		<td>{{$user->firstname, $user->lastname}}</td>
		<td>{{$user->information->temporay_address}}</td>
		@if($count>0)
			<td>{{$count}}</td>
		@else
			<td style="color:red;">Finished</td>
		@endif
		@if($user->status->status!=0)
			<td><img src="#" width="30" height="28"></td>
		@else
			<td><img src="#" width="23" height="22"></td>
		@endif
		<td><button id="edit">Edit</button></td>
		@if($user->status->status!=0)
			<td><a href="attend/{{$user->id}}"><button class="tick_mark">Attend</button></a></td>
		@endif
	</tr>
@endforeach
</tbody>
</table>
</div>
