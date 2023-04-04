@extends('vendor.vendor_dashboard')
@section('vendor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Profile</li>
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
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="{{ (!empty($vendorData->photo)) ? url('upload/vendor_images/'.$vendorData->photo) : url('upload/user_null.jpg')}}" alt="Vendor" class="rounded-circle p-1 bg-dark" width="110">
											<div class="mt-3">
												<h4> {{ $vendorData->name}}</h4>
											<p class="text-secondary mb-1"> {{ $vendorData->email}}</p>
											<hr class= "my-4">
                                        
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                    <form method="post" action="{{ route('vendor.profile.store')}}" enctype="multipart/form-data">
                                        @csrf 

                                    <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value=" {{ $vendorData->username}}" disabled />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input name="name" type="text" class="form-control" value=" {{ $vendorData->name}}" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor E-mail</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="email" name="email" class="form-control" value=" {{ $vendorData->email}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="phone" class="form-control" value=" {{ $vendorData->phone}}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="address" class="form-control" value=" {{ $vendorData->address}}" />
											</div>
										</div>

                                

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Info</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea class="form-control" placeholder="Description" name="vendor_short_info" id="inputaddress2" >{{$vendorData->vendor_short_info}}</textarea>
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Logo</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="file" name="photo" class="form-control" id="image"/>
											</div>
                                            </div>


                                            <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0"></h6>
											</div>
											<div class="col-sm-9 text-secondary">
											<img id="showImage" src="{{ (!empty($vendorData->photo)) ? url('upload/vendor_images/'.$vendorData->photo)
                                             : url('upload/user_null.jpg')}}" alt="Vendor" style ="width:100px; hieght:100px">
											</div>
                                            </div>



										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-dark bg-gradiant px-4" value="Save Changes" />
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
@endsection