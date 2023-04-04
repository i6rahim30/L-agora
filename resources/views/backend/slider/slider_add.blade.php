@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Slider</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Slider</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-10">
								<div class="card">
									<div class="card-body">
                                    <form method="post" action="{{ route('store.slider')}}" enctype="multipart/form-data" id="myForm">
                                        @csrf 

                                   
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Slider Title</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input name="slider_title" type="text" class="form-control" value="" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Short Title</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input name="short_title" type="text" class="form-control" value="" />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Sldier Image</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" name="slider_image" class="form-control" id="image" required/>
											</div>
                                            </div>


                                            <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<img id="showImage" src="{{url('upload/user_null.jpg')}}" alt="Admin" style ="width:100px; hieght:100px">
											</div>
                                            </div>



										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary bg-gradiant px-4" value="Save Changes" />
											</div>
										</div>
									</div>
                                    </form>


								</div>
							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



            <script type="text/javascript">
                $(document).ready(function(){
             $('#image').change(function(e){
            var reader = new FileReader ();
            reader.onload = function (e){
            $('#showImage').attr('src',e.target.result);}
            reader.readAsDataURL(e.target.files['0']);


             });

            

                });
            </script>
            <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                            slider_title: {
                            required : true,
                        }, 
                            short_title: {
                            required : true,
                        }, 
                    },
                    messages :{
                            slider_title: {
                            required : 'Please Enter Slider Title',
                        },
                            short_title: {
                            required : 'Please Enter Short Title',
                        },
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
    
</script>
@endsection