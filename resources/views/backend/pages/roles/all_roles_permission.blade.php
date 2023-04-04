@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Permissions Per Role</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Permissions Per Role</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
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
										<th style="width:10%">s.n</th>
										<th style="width:60%">Role Name</th>
										<th style="width:10%">Permissions</th>
										<th style="width:20%">Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($roles as $key => $item)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$item->name}}</td>
										<td>
                                            @php
                                              $i=0
                                            @endphp
                                            @foreach ($item->permissions as $perm)
                                            @php
                                             $i+=1
                                            @endphp
                                            @endforeach
                                            <span class="badge rounded-pill bg-success" style="font-size:14px;">{{$i}}</span>
                                        </td>
										<td>
                                            <a href="{{route('admin.edit.roles',$item->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
									</tr>
                                    @endforeach

									<tfoot>
									<tr>
										<th>s.n</th>
										<th>Role Name</th>
                                        <th>Permissions</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>



@endsection