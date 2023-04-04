@extends('vendor.vendor_dashboard')
@section('vendor')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Products</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Products <span class="badge rounded-pill bg-danger"> {{ count($products) }}</span></li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                            <a class="btn btn-primary" href="{{route('vendor.add.product')}}">Add New Product</a>
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
										<th>Image</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>QTY</th>
										<th>Discount</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($products as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{asset ($item->product_thumbnail)}}" style="width:40px;height:40px"/></td>
										<td>{{$item->product_name}}</td>
										<td>{{$item->selling_price}}</td>
										<td>{{$item->product_qty}}</td>

										<td>
											@if($item->discount_price == NULL)
											<span class="badge rounded-pill bg-info">No Discount</span>
											@else
											@php
											$amount = $item->selling_price - $item->discount_price;
											$discount = ($amount/$item->selling_price) * 100;
											@endphp
											<span class="badge rounded-pill bg-danger"> {{ round($discount) }}%</span>
											@endif
										</td>

										<td>
											@if($item->status == 1)
											<span class="badge rounded-pill bg-success">Active</span>
											@else
											<span class="badge rounded-pill bg-danger">InActive</span>
											@endif
										</td>
										<td>
                                            <a href="{{route('vendor.edit.product',$item->id)}}" class="btn btn-primary" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('edit.category',$item->id)}}" class="btn btn-primary" title="Details Page"><i class="fa fa-eye"></i></a>
											@if($item->status == 1)
                                            <a href="{{route('vendor.product.inactive',$item->id)}}" class="btn btn-danger" title="DeActivate Item"><i class="fa-solid fa-thumbs-down"></i></a>
											@else
											<a href="{{route('vendor.product.active',$item->id)}}" class="btn btn-success" title="Activate Item"><i class="fa-solid fa-thumbs-up"></i></a>
											@endif
                                            <a href="{{route('vendor.delete.product',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
                                        <th>s.n</th>
										<th>Image</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>QTY</th>
										<th>Discount</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>



@endsection