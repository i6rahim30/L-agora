@extends('frontend.master_dashboard')
@section('main')

@section('title')
L'agora - All Products
@endsection

<div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">All Products</h1>
                            <div class="breadcrumb">
                                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> All Products
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                        </div>
                        
                    </div>
                    <div class="row product-grid">

                    @foreach($products as $product)
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
                        {{$products->links()}}
                    </div>
                    
                    <!--End Deals-->

                    
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    
                    <!-- Fillter By Price -->
                    <div class="sidebar-widget price_range range mb-30">
                        <form method="post" action="{{route('shop.filter')}}">
                            @csrf

                        <h5 class="section-title style-1 mb-30">Fill by price</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div id="slider-range" class="price-filter-range" data-min="0" data-max="50000"></div>
                               <input type="hidden" id="price_range" name="price_range" value="">
                               <input type="text" id="amount" value="0 - 50000" readonly="">
                               <br><br>
                               <button type="submit" class="btn btn-sm btn-default">Filter</button>
                            </div>
                            
                        </div>
                        <div class="list-group">
                            <div class="list-group-item mb-10 mt-10">

                                @if(!empty($_GET['category']))
                                @php
                                $filterCat = explode(',',$_GET['category']);
                                @endphp
                            
                                @endif


                                <label class="fw-900">Category</label>

                                @foreach($categories as $category)

                                @php                            
                                $products = App\Models\Product::where('category_id',$category->id)->get();    
                                @endphp

                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="category[]" id="exampleCheckbox{{$category->id}}" value="{{$category->category_slug}}" @if(!empty($filterCat) && in_array($category->category_slug,$filterCat)) checked @endif onchange="this.form.submit()" />
                                    <label class="form-check-label" for="exampleCheckbox{{$category->id}}"><span>{{$category->category_name}} ({{count($products)}})</span></label>
                                </div>
                                @endforeach
                                <label class="fw-900 mt-15">Brand</label>





                                @if(!empty($_GET['brand']))
                                @php
                                $filterbrand = explode(',',$_GET['brand']);
                                @endphp
                            
                                @endif


                                @foreach($brands as $brand)
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="brand[]" id="examplebrand{{$brand->id}}" value="{{$brand->brand_slug}}" @if(!empty($filterbrand) && in_array($brand->brand_slug,$filterbrand)) checked @endif onchange="this.form.submit()" />
                                    <label class="form-check-label" for="examplebrand{{$brand->id}}"><span>{{$brand->brand_name}}</span></label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                       
                    </div>
                </form>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">New products</h5>
                    @foreach($newProduct as $product)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset($product->product_thumbnail) }}" style="border-radius:10px;"alt="#" />
                            </div>
                            <div class="content pt-10">
                                <p><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></p>
                                @if($product->discount_price == Null)
                                <p class="price mb-0 mt-5">{{$product->selling_price}} LYD</p>
                                @else
                                <p class="price mb-0 mt-5">{{$product->discount_price}} LYD</p>
                                @endif       
                                @php
                                $avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                                $count = App\Models\Review::where('product_id',$product->id)->where('status',1)->count();
                                
                                @endphp
                                <div class="product-rate">
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
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
    
            $(document).ready(function (){
                if ($('#slider-range').length > 0) {
                    const max_price = parseInt($('#slider-range').data('max'));
                    const min_price = parseInt($('#slider-range').data('min'));
                    let price_range = min_price+"-"+max_price;
                    let price = price_range.split('-');
                        $("#slider-range").slider({
                            range: true, 
                            min: min_price,
                            max: max_price,
                            values: price,  
                        slide: function (event, ui) { 
                        $("#amount").val(ui.values[0]+"-"+ui.values[1]);
                        $("#price_range").val(ui.values[0]+"-"+ui.values[1]);
                        }
                        });  
                }
            })
        </script>
@endsection