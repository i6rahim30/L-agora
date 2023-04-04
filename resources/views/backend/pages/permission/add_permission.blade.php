@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Permissions</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Permissions</li>
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
                                    <form method="post" action="{{ route('store.permission')}}" id="myForm">
                                        @csrf 

                                   
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Permission Name</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<input name="name" type="text" class="form-control" value="" />
											</div>
										</div>

										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Permission Group</h6>
											</div>
											<div class="form-group col-sm-9 text-secondary">
												<select  name="group_name"class="form-select mb-3" aria-label="Default select example">
                                                    <option selected="">Open this select Group</option>
                                                    <option value="brand">Brand</option>
                                                    <option value="category">Category</option>
                                                    <option value="subcategory">Subcategory</option>
                                                    <option value="product">Product</option>
                                                    <option value="slider">Slider</option>
                                                    <option value="ads">Ads</option>
                                                    <option value="coupons">Coupons</option>
                                                    <option value="locations">Locations</option>
                                                    <option value="vendors">Vendors</option>
                                                    <option value="order">Order</option>
                                                    <option value="reporting">Reporting</option>
                                                    <option value="userManagment">User Managment</option>
                                                    <option value="reviews">Reviews</option>
                                                    <option value="roles">Roles</option>
                                                    <option value="admin">Admin</option>
                                                </select>
											</div>
										</div>


										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary bg-gradiant px-4" value="Add New Permission" />
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
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        name: {
                            required : true,
                        }, 
                    },
                    messages :{
                        name: {
                            required : 'Please Enter Permission Name',
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