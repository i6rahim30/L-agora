@php
$categories = App\Models\Category::orderBy('category_name','ASC')->get();
@endphp
<header class="header-area header-style-1 header-height-2">
        
        
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{url('/')}}"><img src="{{ asset ('frontend/assets/imgs/theme/logo1.png')}}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="{{route('product.search')}}" method="post">
                                @csrf
                                
                                <select class="select-active">
                                    <option>Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                                <input onfocus="search_result_show()" onblur="search_results_hide()" placeholder="Search" name="search" id="search"/>
                                <div id="searchProducts"></div>
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    {{-- <form action="#">
                                        <select class="select-active">
                                            <option>Your Location</option>
                                            <option>Alabama</option>
                                        </select>
                                    </form> --}}
                                </div>


                                <div class="header-action-icon-2">
                                    <a href="{{ route('compare') }}">
                                        <img class="svgInject" alt="L'agora" src="{{ asset('frontend/assets/imgs/theme/icons/icon-compare.svg')}}" />
                                        </a>
                                    <a href="{{ route('compare') }}"><span class="lable ml-0">Compare</span></a>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{route('Wishlist')}}">
                                        <img class="svgInject" alt="L'agora" src="{{ asset ('frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                        <span class="pro-count blue" id="wishQty">0</span>
                                    </a>
                                    <a href="{{route('Wishlist')}}"><span class="lable">Wishlist</span></a>
                                </div>


                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="#">
                                        <img alt="L'agora" src="{{ asset ('frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                        <span class="pro-count blue" id="cartQty">0</span>
                                    </a>
                                    <a href="{{route('mycart')}}"><span class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                        <!-- mini cart start with ajax -->
                                            <div id="miniCart">

                                            </div>
                                        <!-- mini cart end with ajax -->

                                        
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span> LYD </span><span id="cartTotal"></span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{route('mycart')}}" class="outline">View cart</a>
                                                <a href="{{route('checkout')}}">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{ route('dashboard')}}">
                                        <img class="svgInject mr-10" alt="Nest" src="{{ asset ('frontend/assets/imgs/theme/icons/icon-user.svg')}}" />
                                    </a>

                                    @auth 
                                    <a href="{{ route('dashboard')}}"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{ route('dashboard')}}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('dashboard')}}"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('dashboard')}}"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                            </li>
                                            <li>
                                                <a href="{{route('Wishlist')}}"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="{{route('mycart')}}"><i class="fi fi-rs-shopping-cart mr-10"></i>My Cart</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>Log out</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @else 
                                    <a href="{{ route('login')}}"><span class="lable ml-0">Login</span></a>
                                    <span class="lable" style="margin-left:2px;margin-right:2px">|</span>
                                    <a href="{{ route('register')}}"><span class="lable ml-0">Sign Up</span></a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        @php
        $categories = App\Models\Category::orderBy('category_name','ASC')->get();

        @endphp


    
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{url('/')}}"><img src="{{ asset ('frontend/assets/imgs/theme/logo1.png')}}" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span>Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach($categories as $item)
                                        @if ($loop->index < 5)
                                        <li>
                                            <a href="{{url('product/category/'.$item->id.'/'.$item->category_slug)}}">
                                            <img src="{{ asset ($item->category_image) }}" alt="" />{{ $item->category_name }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                        @foreach($categories as $item)
                                        @if ($loop->index > 4)
                                        <li>
                                            <a href="{{url('product/category/'.$item->id.'/'.$item->category_slug)}}">
                                            <img src="{{ asset ($item->category_image) }}" alt="" />{{ $item->category_name }}</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                
                                    <li>
                                        <a class="active" href="{{url('/')}}">Home  </a>
                                        
                                    </li>
                                    @php
                                    $categories = App\Models\Category::orderBy('category_name','ASC')->limit(5)->get();
                                    @endphp

                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{url('product/category/'.$category->id.'/'.$category->category_slug)}}">{{ $category->category_name}} <i class="fi-rs-angle-down"></i></a>
                                        @php
                                        $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                        @endphp
                                        <ul class="sub-menu">
                                        @foreach($subcategories as $subcategory)
                                            <li><a href="{{url('product/subcategory/'.$subcategory->id.'/'.$subcategory->subcategory_slug)}}">{{$subcategory->subcategory_name }}</a></li>
                                        @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li>
                                        <a href="{{route('shop.page')}}">All Products</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>


                    
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{route('Wishlist')}}">
                                    <img alt="L'agora" src="{{ asset ('frontend/assets/imgs/theme/icons/icon-heart.svg')}}" />
                                    <span class="pro-count blue" id="mwishQty">0</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="#">
                                    <img alt="L'agora" src="{{ asset ('frontend/assets/imgs/theme/icons/icon-cart.svg')}}" />
                                    <span class="pro-count blue" id="mcartQty">0</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                <!-- mini cart start with ajax -->
                                <div id="mminiCart">

                                </div>
                                <!-- mini cart end with ajax -->
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="{{route('mycart')}}">View cart</a>
                                            <a href="{{route('mycart')}}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <style>
        #searchProducts{
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            z-index: 999;
            border-radius: 8px;
            margin-top: 5px;
        }
    </style>

    <script>
        
    function search_result_show(){
        $("#searchProducts").slideDown();
    }
    function search_results_hide(){
        $("#searchProducts").slideUp();
    }
    </script>

