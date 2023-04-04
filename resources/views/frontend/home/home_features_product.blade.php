@php

$featured = App\Models\Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
@endphp



<section class="section-padding pb-5">
            <div class="container">
                <div class="section-title wow animate__animated animate__fadeIn">
                    <h3 class=""> Featured Products </h3>

                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                        <div class="banner-img style-2">
                            <div class="banner-text">
                                <h3 class="mb-100">Bring nature into your home</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                        <div class="tab-content" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        
                                    @foreach($featured as $product)
                                    <div class="product-cart-wrap">
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
                                                <div class="product-price mt-10">
                                                    @if($product->discount_price == Null)
                                                    <span> {{{$product->selling_price}}}LYD</span>
                                                    @else
                                                    <span>{{$product->discount_price}}LYD</span>
                                                    <span class="old-price">{{$product->selling_price}}LYD</span>
                                                    @endif
                                                </div>
                                                <div class="sold mt-15 mb-15">
                                                    
                                                </div>
                                                <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}" class="btn w-100 hover-up">View Product</a>
                                            </div>
                                        </div>
                                        @endforeach

                                        <!--End product Wrap-->
        <!--Products Tabs-->
     
                                    </div>
                                </div>
                            </div>
                            <!--End tab-pane-->


                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>