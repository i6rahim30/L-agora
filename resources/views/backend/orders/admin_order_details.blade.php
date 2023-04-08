@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Order Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Order Details</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<hr/>
				<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col">
						<div class="card" >
							<div class="card-header">
								<h4>Shipping Details</h4>
							</div>
							<div class="card-body">
								<table class="table">
									<tr>
										<th>Shipment for :</th>
										<th>{{$order->name}}</th>
									</tr>
									<tr>
										<th>Phone :</th>
										<th>{{$order->phone}}</th>
									</tr>
									<tr>
										<th>Email :</th>
										<th>{{$order->email}}</th>
									</tr>
									<tr>
										<th>Shipment address :</th>
										<th>{{$order->address}}</th>
									</tr>
									<tr>
										<th>Division :</th>
										<th>{{$order->division->division_name}}</th>
									</tr>
									<tr>
										<th>District Name:</th>
										<th>{{$order->district->district_name}}</th>
									</tr>
									<tr>
										<th>State Name:</th>
										<th>{{$order->state->state_name}}</th>
									</tr>
									<tr>
										<th>Order Date :</th>
										<th>{{$order->order_date}}</th>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card" >
							<div class="card-header">
								<h4>Order Details</h4>
								<span class="text-success">Invoice : {{$order->invoice_no}}</span>
							</div>
							<div class="card-body" >
								<table class="table" style="font-weight: 500">
									<tr>
										<th>Name :</th>
										<th>{{$order->user->name}}</th>
									</tr>
									<tr>
										<th>Phone :</th>
										<th>{{$order->user->phone}}</th>
									</tr>
									<tr>
										<th>Payment Type :</th>
										<th>{{$order->payment_method}}</th>
									</tr>
									<tr>
										<th>Transx Id :</th>
										<th>{{$order->transaction_id}}</th>
									</tr>
									<tr>
										<th>Invoice :</th>
										<th>{{$order->invoice_no}}</th>
									</tr>
									<tr>
										<th>Order Total :</th>
										<th>{{$order->amount}} LYD</th>
									</tr>
									<tr>
										@if ($order->status == 'pending')
										<th>Order Status :</th>
										<th> <span class="badge bg-danger" style="font-size: 15px; font-weight: 400">{{$order->status}}</span></th>
										@elseif ($order->status == 'confirmed')
										<th>Order Status :</th>
										<th> <span class="badge bg-danger" style="font-size: 15px; font-weight: 400">{{$order->status}}</span></th>
										@elseif ($order->status == 'processing')
										<th>Order Status :</th>
										<th> <span class="badge bg-danger" style="font-size: 15px; font-weight: 400">{{$order->status}}</span></th>
										@else
										<th>Order Status :</th>
										<th> <span class="badge bg-success" style="font-size: 15px; font-weight: 400">{{$order->status}}</span></th>
										@endif
									</tr>
									<tr>
										@if ($order->status == 'pending')
										<th>Confirmation</th>
										<th><a href="{{route('pending-confirm',$order->id)}}" class="btn btn-block btn-success" style="font-size: 15px" id="confirm">Confirm Order</a></th>
										@elseif ($order->status == 'confirmed')
										<th>Proccessing</th>
										<th><a href="{{route('confirm-processing',$order->id)}}" class="btn btn-block btn-info" style="font-size: 15px" id="processing">Proccess Order</a></th>
										@elseif ($order->status == 'processing')
										<th>Delivery</th>
										<th><a href="{{route('processing-delivered',$order->id)}}" class="btn btn-block btn-success" style="font-size: 15px" id="delivered">Delivered Order</a></th>
										@endif
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-1">
					<div class="col">
						<div class="card">
							<div class="table-responsive p-2">
								<table class="table">
									<tbody>
										<tr style="font-weight: bold">
											<td class="col-md-1">
												<label>Image</label>
											</td>
											<td class="col-md-1">
												<label>Product Name</label>
											</td>
											<td class="col-md-1">
												<label>Vendor Name</label>
											</td>
											<td class="col-md-1">
												<label>Product Code</label>
											</td>
											<td class="col-md-1">
												<label>Color</label>
											</td>
											<td class="col-md-1">
												<label>Size</label>
											</td>
											<td class="col-md-1">
												<label>Quantity</label>
											</td>
											<td class="col-md-1">
												<label>Price</label>
											</td>
										</tr>
										@foreach($orderItem as $item)
										<tr>
											<td class="col-md-1">
												<label><img src="{{asset($item->product->product_thumbnail)}}" style="width:50px;height:50px"></label>
											</td>
											<td class="col-md-2">
												<label>{{$item->product->product_name}}</label>
											</td>
											@if ($item->vendor_id == NULL)
												<td class="col-md-2">
													<label>L'agora</label>
												</td>
											@else
											<td class="col-md-2">
												<label>{{$item->product->vendor->name}}</label>
											</td>
											@endif
											
											<td class="col-md-1">
												<label>{{$item->product->product_code}}</label>
											</td>
											@if($item->color == NULL)
												<td>
													<label>....</label>
												</td>
											@else
												<td class="col-md-1">
													<label>{{$item->color}}</label>
												</td>
											@endif
		
											
											 @if($item->size == NULL)
												<td>
													<label>....</label>
												</td>
											@else
												<td class="col-md-1">
													<label>{{$item->size}}</label>
												</td>
											@endif
											<td class="col-md-1">
												<label>{{$item->qty}}</label>
											</td>
											<td class="col-md-3">
												<label>{{$item->price}} LYD <br><span style="font-weight:bold"> Total = {{$item->price * $item->qty}} LYD</span></label>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>



@endsection