@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">SubCategories</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">SubCategories</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						@if(Auth::user()->can('subcategory.add'))
						<div class="btn-group">
                            <a class="btn btn-primary" href="{{route('add.subcategory')}}">Add New SubCategory</a>
						</div>
						@endif
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">SubCategories</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>s.n</th>
										<th>Category Name</th>
										<th>SubCategory Name</th>
										@if(Auth::user()->can('subcategory.edit'))
										<th>Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
                                    @foreach($subcategories as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item['category']['category_name']}}</td>
										<td>{{$item->subcategory_name}}</td>
										@if(Auth::user()->can('subcategory.edit'))
										<td>
                                            <a href="{{route('edit.subcategory',$item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('delete.subcategory',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                        </td>
										@endif

									</tr>
                                    @endforeach

									<tfoot>
									<tr>
                                    <th>s.n</th>
                                      <th>Category Name</th>
										<th>SubCategory Name</th>
										@if(Auth::user()->can('subcategory.edit'))
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