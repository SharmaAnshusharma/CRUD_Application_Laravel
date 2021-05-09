	<script type="text/javascript">
		$(document).ready(function(){
			 $("#form_data").on('submit', function(e){
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url:'add',
					type:'post',
					data:formData,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
		            beforeSend:function()
		            {
		                $(document).find('span.error-text').text('');
		            },
					success:function(response)
					{
						if(response.status == 0);
						{
							$.each(response.error, function(prefix, val){
		                        $('span.'+prefix+'_error').text(val[0]);
		                    });
						}
						if(response.status == 'success')
						{
							swal("Thanks!", "Data Inserted Successfully.", "success", {
							  button: "OK Done!",
							});	
							$("#form_data")[0].reset();
						}
												
						
						
					}
				});
			});

			//Delete
			$(document).on('click','.delete',function(){
				var member_id = $(this).attr('id');
				
				var token = $("meta[name='csrf-token']").attr("content");
				  	$.ajax({
						url:'delete/'+member_id,
						type:'DELETE',
						data:{"member_id":member_id,"_token": token},
						dataType:'json',
						success:function(response)
						{
							if(response.status == 'success')
							{
								swal({
								  title: "Are you sure?",
								  text: "Once deleted, you will not be able to recover!",
								  icon: "warning",
								  buttons: true,
								  dangerMode: true,
								})
								.then((willDelete) => {
								  if (willDelete) {
								  	swal("Poof! Your data has been deleted!", {
									      icon: "success",
									    });
								  	 location.reload();
								   } else {
								    swal("Your Data  is safe!",{
								    	icon:"success"
								    });
								  }
								});
													
							}							
						}
					});
				
				});


			$(document).on('click','.edit',function(){
				var member_id = $(this).attr('id');
				var token = $("meta[name='csrf-token']").attr("content");
				
				$('#myModal').modal('hide');
				$.ajax({
					url:'edit/'+member_id,
					type:'post',
					data:{'member_id':member_id,'_token': token},
					success:function(response)
					{
						console.log(response);
						
						var name = response.name;
						var id = response.id;
						var email = response.email;
						var address = response.address;
						var mobile = response.mobile;
						var country = response.country;
          				//setting the value
          				$(".modal-body #name").val(name);
          				$(".modal-body #id").val(id);
          				$(".modal-body #email").val(email);
          				$(".modal-body #address").val(address);
          				$(".modal-body #mobile").val(mobile);
          				$(".modal-body #country").val(country);
          				
						// getting the value



			            $('#myModal').modal('show');
					}
				});
			});



			$('#updateData').submit(function(e){
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url:'update',
					type:'post',
					data:formData,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response)
					{
						if(response.status == "success");
						{
							swal("Thanks!", "Data Updated Successfully.", "success", {
							  button: "OK Done!",
							});	
							$("#form_data")[0].reset();
						}
						
					}
				});
			});

			// $(document).on('click','.send_email',function(){
			// 	var member_id = $(this).attr('id');
				
			// 	var token = $("meta[name='csrf-token']").attr("content");
				
				
			// 	$.ajax({
			// 		url:'sendMail/'+member_id,
			// 		type:'post',
			// 		data:{'member_id':member_id,'_token': token},
			// 		success:function(response)
			// 		{
			// 			console.log(response);
						
			// 			var name = response.name;
			// 			var id = response.id;
			// 			var email = response.email;
			// 			var address = response.address;
			// 			var mobile = response.mobile;
			// 			var country = response.country;
   //        				//setting the value
   //        				$(".modal-body #name").val(name);
   //        				$(".modal-body #id").val(id);
   //        				$(".modal-body #email").val(email);
   //        				$(".modal-body #address").val(address);
   //        				$(".modal-body #mobile").val(mobile);
   //        				$(".modal-body #country").val(country);
          				
			// 			// getting the value



			//             $('#myModalSendEmail').modal('show');
			// 		}
			// 	});
			// });


			/*$("#downloadPDF").on('click',function(){
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax({
					url:'downloadPDF',
					type:'post',
					data:{'_token': token,name:'download'},
					success:function()
					{

					}

				});
			});*/

			

		});
		</script>
	

	<footer>
	 
  
 
  

<div class="footer">
  <p class="bg-primary" style="position: fixed;left: 0; bottom: 0;width: 100%;height:30px; color: white; text-align: center;">&copy; Copyright :Anshu Sharma| Designed & Developed By Anshu sharma</p>
</div>

	</footer>
</body>
</html>