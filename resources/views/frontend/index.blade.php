@extends('frontend.master_dashboard')
@section('main')

@section('title')
    L'agora - MultiVendor
@endsection

        @include('frontend.home.home_slider')
        <!--slider -->

        @include('frontend.home.home_features_category')
        <!--featured categories -->

        @include('frontend.home.home_banner')
        <!--banner -->

        @include('frontend.home.home_new_products')
        <!--Products Tabs-->

        @include('frontend.home.home_features_product')
        <!--End Best Sales-->

<!-- Console Category -->

<section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_category_0->category_name}} Category </h3>
                   
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">


                        @foreach($skip_product_0 as $product)
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
                                                <span> {{{$product->selling_price}}}LYD</span>
                                                @else
                                                <span>{{$product->discount_price}}LYD</span>
                                                <span class="old-price">{{$product->selling_price}}LYD</span>
                                                @endif
                                                
                                                
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}"><i class="fi-rs-shopping-cart mr-5">Shop</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach
 
                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                   
                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End TV Category -->
         <!-- Tshirt Category -->

    <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_category_1->category_name}} Category </h3>
                   
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">



                           
                        @foreach($skip_product_1 as $product)
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
                                                <span> {{{$product->selling_price}}}LYD</span>
                                                @else
                                                <span>{{$product->discount_price}}LYD</span>
                                                <span class="old-price">{{$product->selling_price}}LYD</span>
                                                @endif
                                                
                                                
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}"><i class="fi-rs-shopping-cart mr-5">Shop</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach


                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                   
                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End Tshirt Category -->


 





        <!-- Computer Category -->

    <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_category_2->category_name}} Category </h3>
                   
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">



                        @foreach($skip_product_2 as $product)
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
                                                <span> {{{$product->selling_price}}}LYD</span>
                                                @else
                                                <span>{{$product->discount_price}}LYD</span>
                                                <span class="old-price">{{$product->selling_price}}LYD</span>
                                                @endif
                                                
                                                
                                            </div>
                                            <div class="add-cart">
                                                <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}"><i class="fi-rs-shopping-cart mr-5">Shop</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach

                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                   
                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End Computer Category -->




















        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                        <div class="product-list-small animated animated">

                            @foreach($hot_deals as $item)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}"><img src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{ $item->product_name }}</a>
                                    </h6>
                                    @php
                                    $amount = $product->selling_price - $product->discount_price; 
                                    $dicount = ($amount / $product->selling_price )*100;
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
                                    <div class="product-price">
                                                <span>{{$item->discount_price}} LYD</span>
                                                <span class="old-price">{{$item->selling_price}} LYD</span>
                    
                                    </div>
                                </div>
                            </article>
                            @endforeach
                            
                        </div>
                    </div>



                    <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="section-title style-1 mb-30 animated animated">  Special Offer </h4>
                        <div class="product-list-small animated animated">
                        @foreach($special_offer as $item)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}"><img src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{ $item->product_name }}</a>
                                    </h6>
                                    @php
                                    $amount = $product->selling_price - $product->discount_price; 
                                    $dicount = ($amount / $product->selling_price )*100;
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
                                    <div class="product-price">
                                    @if($item->discount_price == Null)
                                                <span> {{{$item->selling_price}}} LYD</span>
                                                @else
                                                <span>{{$item->discount_price}} LYD</span>
                                                <span class="old-price">{{$item->selling_price}} LYD</span>
                                                @endif
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                        <div class="product-list-small animated animated">
                        @foreach($new as $item)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}"><img src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{ $item->product_name }}</a>
                                    </h6>
                                    @php
                                    $amount = $product->selling_price - $product->discount_price; 
                                    $dicount = ($amount / $product->selling_price )*100;
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
                                    <div class="product-price">
                                    @if($item->discount_price == Null)
                                                <span> {{{$item->selling_price}}} LYD</span>
                                                @else
                                                <span>{{$item->discount_price}} LYD</span>
                                                <span class="old-price">{{$item->selling_price}} LYD</span>
                                                @endif
                    
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                        <div class="product-list-small animated animated">
                        @foreach($special_deals as $item)
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}"><img src="{{ asset($item->product_thumbnail) }}" alt="" /></a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{ $item->product_name }}</a>
                                    </h6>
                                    @php
                                    $amount = $product->selling_price - $product->discount_price; 
                                    $dicount = ($amount / $product->selling_price )*100;
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
                                    <div class="product-price">
                                    @if($item->discount_price == Null)
                                                <span> {{{$item->selling_price}}} LYD</span>
                                                @else
                                                <span>{{$item->discount_price}} LYD</span>
                                                <span class="old-price">{{$item->selling_price}} LYD</span>
                                                @endif
                    
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->









@include('frontend.home.home_vendor_list')



 <!--End Vendor List -->

 @endsection




