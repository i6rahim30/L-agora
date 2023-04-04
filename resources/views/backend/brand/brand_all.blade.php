@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Brands</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Brands</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						@if(Auth::user()->can('brand.add'))
						<div class="btn-group">
                            <a class="btn btn-primary" href="{{ route('add.brand')}}">Add New Brand</a>
						</div>
						@endif
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Brands</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>s.n</th>
										<th>Brand Name</th>
										<th>Logo</th>
										@if(Auth::user()->can('brand.edit'))
										<th>Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
                                    @foreach($brands as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->brand_name	}}</td>
										<td><img src="{{asset ($item->brand_image)}}" style="border-radius:5px;width:40px;height:40px"/></td>

										@if(Auth::user()->can('brand.edit'))
										<td>
                                            <a href="{{route('edit.brand',$item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('delete.brand',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                        </td>
										@endif

									</tr>
                                    @endforeach

									<tfoot>
									<tr>
                                        <th>s.n</th>
										<th>Brand Name</th>
										<th>Logo</th>
										@if(Auth::user()->can('brand.edit'))
										<th>Action</th>
										@endif
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>



@endsection