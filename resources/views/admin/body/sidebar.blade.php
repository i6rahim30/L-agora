<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset ('adminbackend/assets/images/lagora.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
			<li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				@if(Auth::user()->can('brand.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-badge-dollar'></i>
						</div>
						<div class="menu-title">Brand</div>
					</a>
					<ul>@if(Auth::user()->can('brand.list'))
						<li> <a href="{{route('all.brand')}}"><i class="bx bx-right-arrow-alt"></i>All Brands</a>
						</li>
						@endif
						@if(Auth::user()->can('brand.add'))
						<li> <a href="{{route('add.brand')}}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
						</li>
						@endif
					</ul>
				</li>	
				@endif
				
				@if(Auth::user()->can('category.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Catagory</div>
					</a>
					<ul>
						@if(Auth::user()->can('category.list'))
						<li> <a href="{{route('all.category')}}"><i class="bx bx-right-arrow-alt"></i>All Catagory</a>
						</li>
						@endif

						@if(Auth::user()->can('category.add'))
						<li> <a href="{{route('add.category')}}"><i class="bx bx-right-arrow-alt"></i>Add Catagory</a>
						</li>
						@endif
				
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('subcategory.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">SubCatagory</div>
					</a>
					<ul>
						@if(Auth::user()->can('subcategory.list'))
						<li> <a href="{{route('all.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>All SubCatagory</a>
						</li>
						@endif

						@if(Auth::user()->can('subcategory.add'))
						<li> <a href="{{route('add.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>Add SubCatagory</a>
						</li>
						@endif
				
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('product.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-gift"></i>
						</div>
						<div class="menu-title">Products</div>
					</a>
					<ul>
						@if(Auth::user()->can('product.list'))
						<li> <a href="{{route('all.product')}}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
						</li>
						@endif

						@if(Auth::user()->can('product.add'))
						<li> <a href="{{route('add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Products</a>
						</li>
						@endif
				
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('slider.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-image-alt"></i>
						</div>
						<div class="menu-title">Slider Manager</div>
					</a>
					<ul>
						@if(Auth::user()->can('slider.list'))
						<li> <a href="{{route('all.slider')}}"><i class="bx bx-right-arrow-alt"></i>All Sliders</a>
						</li>
						@endif

						@if(Auth::user()->can('slider.add'))
						<li> <a href="{{route('add.slider')}}"><i class="bx bx-right-arrow-alt"></i>Add Sliders</a>
						</li>
						@endif
				
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('ads.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-image-alt"></i>
						</div>
						<div class="menu-title">Banner Manager</div>
					</a>
					<ul>
						<li> <a href="{{route('all.banner')}}"><i class="bx bx-right-arrow-alt"></i>All Banners</a>
						</li>
					
						<li> <a href="{{route('add.banner')}}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
						</li>
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('coupon.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bxs-coupon"></i>
						</div>
						<div class="menu-title">Coupon System</div>
					</a>
					<ul>
						<li> <a href="{{route('all.coupon')}}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
						</li>
						<li> <a href="{{route('add.coupon')}}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
						</li>
				
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('location.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bxs-ship"></i>
						</div>
						<div class="menu-title">Shipping Areas</div>
					</a>
					<ul>
						<li> <a href="{{route('all.divison')}}"><i class="bx bx-right-arrow-alt"></i>All Divisons</a>
						</li>
						<li> <a href="{{route('all.district')}}"><i class="bx bx-right-arrow-alt"></i>All Districts</a>
						</li>
						<li> <a href="{{route('all.state')}}"><i class="bx bx-right-arrow-alt"></i>All States</a>
						</li>
				
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('vendor.menu'))
				<li class="menu-label">vendor managment</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-store'></i>
						</div>
						<div class="menu-title">Vendors</div>
					</a>
					<ul>
						<li>
							<a href="{{route('inactive.vendor')}}"><i class="bx bx-right-arrow-alt"></i>Inactive Vendors</a>
						</li>
						<li> 
							<a href="{{route('active.vendor')}}"><i class="bx bx-right-arrow-alt"></i>Active Vendors</a>
						</li>
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('order.menu'))
				<li class="menu-label">Order managment</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Orders</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('pending.order')}}"><i class="bx bx-right-arrow-alt"></i>Pending Orders</a>
						</li>
						<li> 
							<a href="{{route('admin.confirmed.order')}}"><i class="bx bx-right-arrow-alt"></i>Confirmed Orders</a>
						</li>
						<li> 
							<a href="{{route('admin.processing.order')}}"><i class="bx bx-right-arrow-alt"></i>Processing Orders</a>
						</li>
						<li> 
							<a href="{{route('admin.delivered.order')}}"><i class="bx bx-right-arrow-alt"></i>Delivered Orders</a>
						</li>
					</ul>
				</li>
				@endif


				@if(Auth::user()->can('return.order.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-left-top-arrow-circle'></i>
						</div>
						<div class="menu-title">Returned Orders</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('return.request')}}"><i class="bx bx-right-arrow-alt"></i>Return Requests</a>
						</li>
						<li> 
							<a href="{{route('complete.return.request')}}"><i class="bx bx-right-arrow-alt"></i>Returned Orders</a>
						</li>
					</ul>
				</li>
				@endif

				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-report' ></i>
						</div>
						<div class="menu-title">Reports</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('report.view')}}"><i class="bx bx-right-arrow-alt"></i>View Reports</a>
						</li>
						<li> 
							<a href="{{route('order.by.user')}}"><i class="bx bx-right-arrow-alt"></i>Users Orders Reports</a>
						</li>
						
					</ul>
				</li>

				@if(Auth::user()->can('user.management.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-user' ></i>
						</div>
						<div class="menu-title">User Manage</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('all-user')}}"><i class="bx bx-right-arrow-alt"></i>All Users</a>
						</li>
						<li> 
							<a href="{{route('all-vendor')}}"><i class="bx bx-right-arrow-alt"></i>All Vendors</a>
						</li>
						
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('review.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-star' ></i>
						</div>
						<div class="menu-title">Review Manage</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('pending.review')}}"><i class="bx bx-right-arrow-alt"></i>All Pending Reviews</a>
						</li>
						<li> 
							<a href="{{route('published-review')}}"><i class="bx bx-right-arrow-alt"></i>Published Reviews</a>
						</li>
						
					</ul>
				</li>
				@endif
				
				@if(Auth::user()->can('stock.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cylinder'></i>
						</div>
						<div class="menu-title">Stock Manage</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('product.stock')}}"><i class="bx bx-right-arrow-alt"></i>Stock</a>
						</li>
					</ul>
				</li>
				@endif
				

				@if(Auth::user()->can('role.permission.menu'))
				<li class="menu-label">Roles & Permission</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-user-detail'></i>
						</div>
						<div class="menu-title">Roles & Permission</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('all.permission')}}"><i class="bx bx-right-arrow-alt"></i>All Permission</a>
						</li>
						<li> 
							<a href="{{route('all.roles')}}"><i class="bx bx-right-arrow-alt"></i>All Roles</a>
						</li>
	
						{{-- <li> 
							<a href="{{route('add.roles.permission')}}"><i class="bx bx-right-arrow-alt"></i>Assign Permissions</a>
						</li> --}}
						<li> 
							<a href="{{route('all.roles.permission')}}"><i class="bx bx-right-arrow-alt"></i>Allocated Permissions</a>
						</li>
	
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('admin.user.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxs-face-mask'></i>
						</div>
						<div class="menu-title">Admin Manage</div>
					</a>
					<ul>
						<li> 
							<a href="{{route('all.admin')}}"><i class="bx bx-right-arrow-alt"></i>All Admins</a>
						</li>
						<li> 
							<a href="{{route('add.admin')}}"><i class="bx bx-right-arrow-alt"></i>Add Admins</a>
						</li>
	
						{{-- <li> 
							<a href="{{route('add.roles.permission')}}"><i class="bx bx-right-arrow-alt"></i>Assign Permissions</a>
						</li> --}}
						<li> 
							<a href="{{route('all.roles.permission')}}"><i class="bx bx-right-arrow-alt"></i>Allocated Permissions</a>
						</li>
	
					</ul>
				</li>
				@endif
				
				
				
		
			</ul>
			<!--end navigation-->
		</div>