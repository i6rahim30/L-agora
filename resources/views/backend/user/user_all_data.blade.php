@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Users Data</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Users Data</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                    
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Users</h6>
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
										<th>UserName</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Status</th>		
									</tr>
								</thead>
								<tbody>
                                    @foreach($users as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>	<img src="{{ (!empty($item->photo)) ? url('upload/user_images/'.$item->photo) : url('upload/user_null.jpg')}}" alt="User" class="rounded-circle p-1 bg-dark" width="60" height="60"></td>
										<td>{{$item->name}}</td>
										<td>{{$item->username}}</td>
										<td>{{$item->email}}</td>
										<td>{{$item->phone}}</td>
										<td>
                                            @if ($item->UserOnline())
                                            <span class="badge badge-pill bg-success">Active Now</span></td>	
                                            @else
                                            <span class="badge badge-pill bg-danger">{{Carbon\Carbon::parse($item->last_seen)->diffForHumans()}}</span></td>	
                                            @endif			
								
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
                                    	<th>s.n</th>
										<th>Image</th>
										<th>Name</th>
										<th>UserName</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Status</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>



@endsection