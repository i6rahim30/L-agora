@extends('frontend.master_dashboard')
@section('main')


@section('title')
Vendor - {{$vendor->name}}
@endsection


<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Vendor Details
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="archive-header-2 text-center pt-80 pb-50">
                <h1 class="display-2 mb-50">{{$vendor->name}}</h1>

                
            </div>
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{count($vproduct)}}</strong> items for you!</p>
                        </div>
                    <div class="row product-grid">
                    @foreach($vproduct as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                <img class="default-img" src="{{ asset($product->product_thumbnail) }}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye" id="{{ $product->id }}" onclick="productView(this.id)"></i></a>
                                        </div>
                                        @php
                                        $amount = $product->selling_price - $product->discount_price; 
                                        $dicount = ($amount / $product->selling_price )*100;
                                        @endphp
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($product->discount_price == Null)
                                            <span class="new">New</span>
                                            @else
                                            <span class="hot">{{round($dicount)}} %</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="#">{{$product['category']['category_name']}}</a>
                                        </div>
                                        <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{ $product->product_name }}</a></h2>
                                        @php
                                        $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                        $count = App\Models\Review::where('product_id',$product->id)->where('status',1)->count();
                                      
                                        @endphp
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                @if ($avarage == 0)

                                                    
                                                @elseif($avarage == 1 || $avarage < 2)
                                                <div class="product-rating" style="width: 20%"></div>      
                                                @elseif($avarage == 2 || $avarage < 3)
                                                <div class="product-rating" style="width: 40%"></div>      
                                                @elseif($avarage == 3 || $avarage < 4)
                                                <div class="product-rating" style="width: 60%"></div>      
                                                @elseif($avarage == 4 || $avarage < 5)
                                                <div class="product-rating" style="width: 80%"></div>      
                                                @elseif($avarage == 5 || $avarage < 5)
                                                <div class="product-rating" style="width: 100%"></div>      
                                                @endif
                                               
                                            </div>
                                            <span class="font-small ml-5 text-muted"> ({{$count}} reviews)</span>
                                        </div>
                                        <div>
                                            @if($product->vendor_id == Null)
                                            <span class="font-small text-muted">By <a href="#">L'agora</a></span>
                                            @else
                                            <span class="font-small text-muted">By <a href="#">{{$product['vendor']['name']}}</a></span>
                                            @endif
                                            
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                @if($product->discount_price == Null)
                                                <span> {{{$product->selling_price}}} LYD</span>
                                                @else
                                                <span>{{$product->discount_price}} LYD</span>
                                                <br>
                                                <span class="old-price">{{$product->selling_price}} LYD</span>
                                                @endif
                                                
                                                
                                            </div>
                                            <div class="add-cart">
                                            <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}"><i class="fi-rs-shopping-cart mr-5"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach
                    
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        {{$vproduct->links()}}
                    </div>
                 
                    <!--End Deals-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    <div class="sidebar-widget widget-store-info mb-30 bg-3 border-0">
                        <div class="vendor-logo mb-30">
                            <img src="{{ (!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo) : url('upload/user_null.jpg')}}" alt="" />
                        </div>
                        <div class="vendor-info">
                            <div class="product-category">
                                <span class="text-muted">Since {{$vendor->vendor_join}}</span>
                            </div>
                            <h4 class="mb-5"><a href="vendor-details-1.html" class="text-heading">{{$vendor->name}}</a></h4>
                            @php
                            $avarage = App\Models\Review::where('vendor_id',$vendor->id)->where('status',1)->avg('rating');
                            $count = App\Models\Review::where('vendor_id',$vendor->id)->where('status',1)->count();
                          
                            @endphp
                            <div class="product-rate-cover mb-15">
                                <div class="product-rate d-inline-block">
                                    @if ($avarage == 0)

                                                    
                                    @elseif($avarage == 1 || $avarage < 2)
                                    <div class="product-rating" style="width: 20%"></div>      
                                    @elseif($avarage == 2 || $avarage < 3)
                                    <div class="product-rating" style="width: 40%"></div>      
                                    @elseif($avarage == 3 || $avarage < 4)
                                    <div class="product-rating" style="width: 60%"></div>      
                                    @elseif($avarage == 4 || $avarage < 5)
                                    <div class="product-rating" style="width: 80%"></div>      
                                    @elseif($avarage == 5 || $avarage < 5)
                                    <div class="product-rating" style="width: 100%"></div>      
                                    @endif
                                   
                                </div>
                                <span class="font-small ml-5 text-muted"> ({{$count}} reviews)</span>
                            </div>
                            <div class="vendor-des mb-30">
                                <p class="font-sm text-heading">{{$vendor->vendor_short_info}}</p>
                            </div>
                            <div class="follow-social mb-20">
                                <h6 class="mb-15">Follow Us</h6>
                                <ul class="social-network">
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset ('frontend/assets/imgs/theme/icons/social-tw.svg')}}" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset ('frontend/assets/imgs/theme/icons/social-fb.svg')}}" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset ('frontend/assets/imgs/theme/icons/social-insta.svg')}}" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset ('frontend/assets/imgs/theme/icons/social-pin.svg')}}" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="vendor-info">
                                <ul class="font-sm mb-20">
                                    <li><img class="mr-5" src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$vendor->address}}</span></li>
                                    <li><img class="mr-5" src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>{{$vendor->phone}}</span></li>
                                </ul>
                                <a href="vendor-details-1.html" class="btn btn-xs">Contact Seller <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
         
                              
                        
                
                </div>
            </div>
        </div>


@endsection