@extends('vendor.vendor_dashboard')
@section('vendor')

@php
	$id=Auth::user()->id;
	$vendorId = App\Models\User::find($id);
	$status=$vendorId->status;

	$date = date('d-m-y');
	$today = App\Models\Orderitem::where('vendor_id', $date)->sum('price');
	$month = date('F');
	$months = App\Models\Orderitem::where('vendor_id', $month)->sum('price');
	$year = date('Y');
	$years = App\Models\Orderitem::where('vendor_id', $year)->sum('price');

	$pendings = App\Models\Order::where('status','pending')->get();
@endphp

<div class="page-content">
	@if($status == 'active') 
		<h4>Your Account is <span class="text-success"> Active </span></h4>
	@else
	<h4>Your Account is <span class="text-danger"> InActive </span></h4>
	<p class="text-danger">Registration is pendiong please wait for Administration approval</p>
	@endif
					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
						<div class="col">
							<div class="card radius-10 bg-secondary bg-gradient">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">{{$today}} LYD</h5>
									<div class="ms-auto">
                                        <i class='fa-sharp fa-solid fa-coins fs-3 text-white'></i>
										
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Today's Revenue</p>
									
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-dark bg-gradient">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">{{$months}} LYD</h5>
									<div class="ms-auto">
										<i class='fa-sharp fa-solid fa-coins fs-3 text-white'></i>
										
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Monthly Revenue</p>
									
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-secondary bg-gradient ">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">{{$years}} LYD</h5>
									<div class="ms-auto">
                                        <i class='fa-sharp fa-solid fa-coins fs-3 text-white'></i>
										
										
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Annual Revenue</p>
									
								</div>
							</div>
						</div>
						</div>

						<div class="col">
							<div class="card radius-10 bg-dark bg-gradient">
							 <div class="card-body">
								<div class="d-flex align-items-center">
									<h5 class="mb-0 text-white">{{count($pendings)}} Orders</h5>
									<div class="ms-auto">
										<i class='fa-sharp fa-solid fa-coins fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<p class="mb-0">Pending Orders</p>
									
								</div>
							</div>
						 </div>
						</div>
					</div><!--end row-->
				
					@php
					$orders = App\Models\Order::orderBy('id','DESC')->limit(10)->get();
				@endphp		
						
		
							  <div class="card radius-10">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<h5 class="mb-0">Orders Summary</h5>
										</div>
										<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
										</div>
									</div>
									<hr>
									<div class="table-responsive">
										<table class="table align-middle mb-0">
											<thead class="table-light">
												
												<tr>
													<th>S.N</th>
													<th>Date</th>
													<th>Invoice</th>
													<th>Amount</th>
													<th>Payment</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($orders as $key => $order)
													
												<tr>
													<td>{{$key+1}}</td>
													
													<td>{{$order->order_date}}</td>
													<td>{{$order->invoice_no}}</td>
													<td>{{$order->amount}} LYD</td>
													<td>{{$order->payment_method}}</td>
													
													<td>
														@if($order->status == 'pending')
													<div class="badge rounded-pill bg-light-warning text-warning w-50" style="font-size: 12px">Pending</div>
													@elseif($order->status == 'confirmed')
													<div class="badge rounded-pill bg-light-info text-info w-50" style="font-size: 12px">Confirmed</div>
													@elseif($order->status == 'processing')
													<div class="badge rounded-pill bg-light-primary text-primary w-50" style="font-size: 12px">In Progress</div>
													@elseif($order->status == 'delivered')
													<div class="badge rounded-pill bg-light-success text-success w-50" style="font-size: 12px">Delivered</div>
																												 
													@endif
													
													</td>
													
												</tr>
												@endforeach
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
			</div>

@endsection