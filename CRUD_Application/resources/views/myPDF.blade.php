<!DOCTYPE html>
<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-primary " id="table_id">
		<thead class="bg-dark text-white">
			<tr>
				<th>SR No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>	
				<th>Profile</th>
			</tr>
		</thead>
		<tbody>
			@if(count($members)>0)
				{{$count=1}}
				@foreach($members as $member)
				<tr>
					<td>{{$count}}</td>
					<td>{{$member['name']}}</td>
					<td>{{$member['email']}}</td>
					<td>{{$member['mobile']}}</td>
					<td>{{$member['address']}}</td>
					<td><img src="storage/{{$member['profile']}}" widht="50px" height="50px"></td>
				</tr>
				{{$count++}}
				@endforeach
				@else
				<h3>No Records are Found!</h3>
			@endif
		</tbody>
	</table>
	
</body>
</html>
