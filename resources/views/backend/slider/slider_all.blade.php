@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Sliders</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sliders</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						@if(Auth::user()->can('slider.add'))
						<div class="btn-group">
                            <a class="btn btn-primary" href="{{route('add.slider')}}">Add New Slider</a>
						</div>
						@endif
						
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
										<th>Slider Title</th>
										<th>Short Title</th>
										<th>Slider Image</th>
										@if(Auth::user()->can('slider.edit'))
										<th>Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
                                    @foreach($sliders as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->slider_title}}</td>
										<td>{{$item->short_title}}</td>
										<td><img src="{{asset ($item->slider_image)}}" style="width:40px;height:40px"/></td>
										@if(Auth::user()->can('slider.edit'))
										<td>
                                            <a href="{{route('edit.slider',$item->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('delete.slider',$item->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                        </td>
										@endif
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
										<th>s.n</th>
										<th>Slider Title</th>
										<th>Short Title</th>
										<th>Slider Image</th>
										@if(Auth::user()->can('slider.edit'))
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