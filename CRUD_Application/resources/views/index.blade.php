@extends('layouts')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<div class="container">
  <form method="post" action="downloadPDF" class="form-inline">
    @csrf
    	<input type="submit" name="download_pdf" class="btn btn-primary" value="PDF download"> &nbsp &nbsp
      <input type="submit" name="download_excel" class="btn btn-warning" value="Excel download">
	</form>

    <table class="table table-primary" id="table_id">
			<thead>
				
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Profile</th>
				<th>Action 1</th>
        <th>Action 2</th>
			</thead>
			<tbody>
				@if(count($members)>0)
					@foreach($members as $member)
					<tr>
						<td>{{$member['name']}}</td>
						<td>{{$member['email']}}</td>
						<td>{{$member['mobile']}}</td>
						<td>{{$member['address']}}</td>
						<td><img src="storage/{{$member['profile']}}" widht="50px" height="50px"></td>
						<td><button type="button" name="delete" id="{{$member['id']}}" class="btn btn-outline-dark delete">Delete</button> </td><td> <button type="button" name="edit" id="{{$member['id']}}"  data-toggle="modal" data-target="#myModal" class="btn btn-outline-dark edit">Edit</button></td>
					</tr>
					@endforeach
					@else
					<h3>No Records are Found!</h3>
				@endif
			</tbody>
		</table>
	
<div >
	{{$members->links()}}
</div>
</div>

<!-- The Modal -->
      	<form method="post" action="Update" enctype="multipart/form-data" id="updateForm">
  	@csrf
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
        		

          <div class="col-sm-6">
          	<input type="hidden" name="id" id="id">
            <div class="form-group">
              <label class="col-form-label " for="inputLarge">Name</label>
              <input class="form-control " type="text" name="name" value="" placeholder="Enter Your Name" id="name" required>
            </div>
            <div class="form-group">
              <label class="col-form-label " for="inputLarge">Email</label>
              <input class="form-control " type="email" name="email" value="" placeholder="Enter Your Name" id="email" disabled="">
            </div>
            
            <div class="form-group">
              <label class="col-form-label " for="inputLarge">Address</label>
              <input class="form-control " type="text"  name="address"placeholder="Enter Your Address" id="address"required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label class="col-form-label " for="inputLarge">Mobile</label>
              <input class="form-control " type="text"  name="mobile" placeholder="Enter Your Mobile" id="mobile"required>
            </div>
            
            <div class="form-group">
              <label for="exampleSelect1" class="col-form-label " >Select Country</label>
                  <select name="country"class="form-control " id="country"required>
                    <option value="">Select One</option>
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="Jermany">Jermany</option>
                    <option value="Japan">Japan</option>
                    <option value="Maldives">Maldives</option>
                  </select>
            </div>
            
          </div>
          <input type="submit" name="submit" value="Add Records" class="btn btn-primary col-sm-12">
       </div>
     

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
	    
    </div>
  </div>

</div>
</form>
@stop

