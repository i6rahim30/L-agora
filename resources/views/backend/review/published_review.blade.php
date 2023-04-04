@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Published Reviews</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Published Reviews <span class="badge rounded-pill bg-danger"> {{ count($review) }}</span></li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<hr/>
				<div class="card">
					<div class="card-body">
						<div>
							<table id="example" class="table table-striped table-bordered" style="table-layout: fixed; width: 100%">
								<thead>
									<tr>
										<th>s.n</th>
										<th>Image</th>
										<th>Product Name</th>
										<th>comment</th>
										<th>User Name</th>
										<th>Rating</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($review as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{asset($item['product']['product_thumbnail'])}}" style="width:40px;height:40px"></td>
										<td>{{$item['product']['product_name']}}</td>
                                    <td style="word-wrap: break-word;"><div>{{$item->comment}}</div></td>
										<td>{{$item['user']['name']}}</td>
										<td>
                                        @if ($item->rating == NULL)
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>   
                                        @elseif($item->rating == 1)
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i> 

                                        @elseif($item->rating == 2)
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                    
                                        @elseif($item->rating == 3)
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        @elseif($item->rating == 4)
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-secondary"></i>
        
                                        @elseif($item->rating == 5)
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                            
                                        @endif
                                    </td>
										<td> 
                                            @if ($item->status == 0)
                                            <span class="badge rounded-pill bg-warning" style="font-size:12px">Pending</span>                                         
                                            @elseif($item->status == 1)
                                            <span class="badge rounded-pill bg-success" style="font-size:12px">Published</span>
                                            @endif
                                        </td>

										
										<td>
                                            <a href="{{route('review.delete',$item->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
										<th>s.n</th>
										<th>Image</th>
										<th>Product Name</th>
										<th>comment</th>
										<th>User Name</th>
										<th>Rating</th>
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