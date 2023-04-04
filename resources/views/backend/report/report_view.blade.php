@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">L'agora Reports</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Reports</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<hr/>
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                    <form action="{{route('search-by-date')}}" method="post">
                        @csrf
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Search By Date</h5>
                                    <label class="form-label">Date:</label>
                                    <input type="date" name="date" class="form-control"><br>
                                    <input type="submit" class="btn btn-rounded btn-primary" value="search">
                                </div>
                            </div>
                        </div>
                    </form>
					

					<form action="{{route('search-by-month')}}" method="post">
                        @csrf
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Search By Month</h5>
                                    <label class="form-label">Select Month:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="month">
                                        <option selected="">Open this to select month</option>
                                        <option value="January">January</option>
                                        <option value="february">february</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    <label class="form-label">Select Year:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="year_name">
                                        <option selected="">Open this to select year</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                        <option value="2037">2037</option>
                                        <option value="2038">2038</option>
                                    </select>
                                    <input type="submit" class="btn btn-rounded btn-primary" value="search">
                                </div>
                            </div>
                        </div>
                    </form>

					<form action="{{route('search-by-year')}}" method="post">
                        @csrf
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Search By Year</h5>
                                    <label class="form-label">Select Year:</label>
                                    <select class="form-select mb-3" aria-label="Default select example" name="year">
                                        <option selected="">Open this to select year</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                        <option value="2031">2031</option>
                                        <option value="2032">2032</option>
                                        <option value="2033">2033</option>
                                        <option value="2034">2034</option>
                                        <option value="2035">2035</option>
                                        <option value="2036">2036</option>
                                        <option value="2037">2037</option>
                                        <option value="2038">2038</option>
                                        
                                    </select>
                                    <input type="submit" class="btn btn-rounded btn-primary" value="search">
                                </div>
                            </div>
                        </div>
                    </form>

					</div>
				</div>
				
			</div>



@endsection