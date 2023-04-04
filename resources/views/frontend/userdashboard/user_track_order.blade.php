@extends('dashboard')
@section('user')

@section('title')
L'agora - Track Your Order
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Track Your Order
                </div>
            </div>
        </div>
        <div class="page-content pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="row">

                            <!-- dashboard sidebar -->
                            @include('frontend.body.dashboard_sidebar_menu')
                            <!-- dashboard sidebar -->


                            <div class="col-md-9">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Track Your Order</h5>
                                            </div>
                                            <div class="card-body">
                                              
                                            <form method="POST" action="{{ route('order.tracking')}}">
                                            @csrf 
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label>Invoice Code <span class="required">*</span></label>
                                                            <input class="form-control" name="code" type="text" placeholder="Your Order Invoice Code" required=""/>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Track</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>



        @endsection