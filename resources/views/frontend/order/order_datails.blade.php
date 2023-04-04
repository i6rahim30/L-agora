@extends('dashboard')
@section('user')

@section('title')
L'agora - Order Details
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card" >
                                            <div class="card-header">
                                                <h4>Shipping Details</h4>
                                            </div>
                                            <hr>
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
                                    <div class="col-md-6">
                                        <div class="card" style="background:#F4F6FA">
                                            <div class="card-header">
                                                <h4>Order Details</h4>
                                                <span class="text-success">Invoice : {{$order->invoice_no}}</span>
                                            </div>
                                            <hr>
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
                                                        <th> <span class="badge rounded-pill bg-warning" >{{$order->status}}</span></th>
                                                        @elseif ($order->status == 'confirmed')
                                                        <th>Order Status :</th>
                                                        <th> <span class="badge rounded-pill bg-info">{{$order->status}}</span></th>
                                                        @elseif ($order->status == 'processing')
                                                        <th>Order Status :</th>
                                                        <th> <span class="badge rounded-pill bg-primary">{{$order->status}}</span></th>
                                                        @else
                                                        <th>Order Status :</th>
                                                        <th> <span class="badge rounded-pill bg-success">{{$order->status}}</span></th>
                                                        @endif
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end table --}}



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
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


        @if ($order->status !== 'delivered')
    
        @else

        @php
            $order = App\Models\Order::where('id', '=', $order->id)->where('return_reason','=',NULL)->first();
        @endphp

        @if ($order)
        <form action="{{route('return.order',$order->id)}}" method="post">
            @csrf
        <div class="form-group m-3" style=" font-weight: 600; font-size: initial; color: #000000; ">
            <label>Order Return Reason</label>
            <textarea required name="return_reason" class="form-control"  style="width:40%;height:50px"></textarea>
        </div>
            <button type="submit" class="btn-sm btn-danger ml-15" style="width:40%;">Return Order</button>
        </form>

        @else
            <h5><span class="badge rounded-pill bg-success">Your already sent a return request for this order Please check Your Dashbored for more information</span></h5>
    
        @endif

        @endif
        </div>
    </div>
   
            



        @endsection