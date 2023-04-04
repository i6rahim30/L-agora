@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Admins</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Admins</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                            <a class="btn btn-primary" href="{{route('add.admin')}}">Add Admin</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Admins</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>s.n</th>
										<th>Image</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($alladminuser as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{ (!empty($item->photo)) ? url('upload/admin_images/'.$item->photo) : url('upload/user_null.jpg')}}" alt="Admin" class="rounded-circle" width="40"></td>
										<td>{{$item->name}}</td>
										<td>{{$item->email}}</td>
										<td>{{$item->phone}}</td>
										<td>
											@foreach ($item->roles as $role)
												<span class="badge badge-pill bg-success" style="font-size:14px">{{$role->name}}</span>
											@endforeach
										</td>
										<td>
                                            <a href="{{route('edit.admin.role',$item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('delete.admin.role',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                        </td>
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
										<th>s.n</th>
										<th>Image</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Role</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>



@endsection