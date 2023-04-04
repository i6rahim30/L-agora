@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Banners</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Banners</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                            <a class="btn btn-primary" href="{{route('add.banner')}}">Add New Banner</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>s.n</th>
										<th>Banner Title</th>
										<th>Banner URL</th>
										<th>Banner Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($banner as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->banner_title}}</td>
										<td>{{$item->banner_url}}</td>
										<td><img src="{{asset ($item->banner_image)}}" style="width:40px;height:40px"/></td>
										<td>
                                            <a href="{{route('edit.banner',$item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('delete.banner',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                        </td>
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
                                        <th>s.n</th>
										<th>Banner Title</th>
										<th>Banner URL</th>
										<th>Banner Image</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>



@endsection