@extends('layouts')

@section('content')
	<div class="container">
		<form method="post"	 enctype="multipart/form-data" id="form_data">
			@csrf
			<h1 class="text-center">Add Records</h1>
		<div class="progress">
		  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
				  <label class="col-form-label col-form-label-lg"  for="inputLarge">Name</label>
				  <input class="form-control form-control-lg" type="text"  name="name" placeholder="Enter Your Name" id="inputLarge">
				  <span class="text-danger error-text name_error"></span>
				</div>
				<div class="form-group">
				  <label class="col-form-label col-form-label-lg" for="inputLarge">Email</label>
				  <input class="form-control form-control-lg" type="email"  name="email"placeholder="Enter Your Email" id="inputLarge">
				  <span class="text-danger error-text email_error"></span>
				</div>
				<div class="form-group">
				  <label class="col-form-label col-form-label-lg" for="inputLarge">Address</label>
				  <input class="form-control form-control-lg" type="text"  name="address"placeholder="Enter Your Address" id="inputLarge">
				  <span class="text-danger error-text address_error"></span>
				</div>
			</div>
			<div class="col-sm-6">

				<div class="form-group">
				  <label class="col-form-label col-form-label-lg" for="inputLarge">Mobile</label>
				  <input class="form-control form-control-lg" type="text"  name="mobile" placeholder="Enter Your Mobile" id="inputLarge">
				  <span class="text-danger error-text mobile_error"></span>
				</div>
				<div class="form-group">
				  <label class="col-form-label col-form-label-lg" for="inputLarge">Profile Image</label>
				  <input class="form-control form-control-lg" type="file"  name="myfile" id="inputLarge">
				  <span class="text-danger error-text myfile_error"></span>
				</div>
				<div class="form-group">
				  <label for="exampleSelect1" class="col-form-label col-form-label-lg" >Select Country</label>
				      <select name="country"class="form-control form-control-lg" id="exampleSelect1">
				        <option value="">Select One</option>
				        <option value="India">India</option>
				        <option value="USA">USA</option>
				        <option value="Jermany">Jermany</option>
				        <option value="Japan">Japan</option>
				        <option value="Maldives">Maldives</option>
				      </select>
				      <span class="text-danger error-text country_error"></span>
				</div>

			</div>
			<input type="submit" name="submit" value="Add Records" class="btn btn-primary btn-lg btn-block">
		</div>
	</form>
@stop