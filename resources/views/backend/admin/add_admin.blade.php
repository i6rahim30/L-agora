@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Admin User</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Admin User</li>
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
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                    <form method="post" action="{{ route('admin.user.store')}}">
                                        @csrf 

                                    <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Username</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" placeholder="Username" name="username"/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input name="name" type="text" class="form-control" placeholder="Full Name" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">E-mail</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="email" name="email" class="form-control" placeholder="Email" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="phone" class="form-control" placeholder="Phone Number" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="address" class="form-control" placeholder="Address" />
											</div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" name="password" class="form-control" placeholder="Password" />
											</div>
										</div>

                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Assign Role</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<select class="form-select mb-3" aria-label="default select example" placeholder="Selecr" name="roles">
                                                    @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
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