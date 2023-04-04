@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Divisons</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Divisons</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                            <a class="btn btn-primary" href="{{route('add.divison')}}">Add New Divison</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Divisons</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>s.n</th>
										<th>Divison Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($divison as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->division_name}}</td>								
										<td>
                                            <a href="{{route('edit.division',$item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('delete.division',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                        </td>
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
										<th>s.n</th>
										<th>Divison Name</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>

            


@endsection