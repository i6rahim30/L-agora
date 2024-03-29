@extends('admin.admin_dashboard')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor Details</div>
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
							
							<div class="col-lg-10">
								<div class="card">
									<div class="card-body">
                                    <form method="post" action="{{ route('inactive.vendor.approve')}}" >
                                    @csrf
                                    <input type="hidden" name='id' value="{{ $actiVendorDetails->id}}">

                                    <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" value=" {{ $actiVendorDetails->username}}" name="username" disabled />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input name="name" type="text" class="form-control" value=" {{ $actiVendorDetails->name}}" disabled/>
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor E-mail</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="email" name="email" class="form-control" value=" {{ $actiVendorDetails->email}}" disabled />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="phone" class="form-control" value=" {{ $actiVendorDetails->phone}}" disabled />
											</div>
                                        </div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Join Date</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="vendor_join" class="form-control" value=" {{ $actiVendorDetails->vendor_join}}" disabled />
											</div>
                                        </div>  

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="address" class="form-control" value=" {{ $actiVendorDetails->address}}" disabled />
											</div>
										</div>

                                

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Info</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea disabled class="form-control" placeholder="Description" name="vendor_short_info" id="inputaddress2" >{{$actiVendorDetails->vendor_short_info}}</textarea>
											</div>
										</div>


                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Logo</h6>
											</div>
											<div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ (!empty($actiVendorDetails->photo)) ? url('upload/vendor_images/'.$actiVendorDetails->photo)
                                             : url('upload/user_null.jpg')}}" alt="Vendor" style ="width:100px; hieght:100px">
											</div>
                                            </div>


                    


										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-danger bg-gradiant px-4" value="Deactivate" />
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




@endsection