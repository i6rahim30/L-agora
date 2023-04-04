@extends('vendor.vendor_dashboard')
@section('vendor')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Products</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr/>

                <form method="post" action="{{ route('vendor.store.product')}}" enctype="multipart/form-data" id="myForm">
                 @csrf 
                <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">
                    <div class="border border-3 p-4 rounded">
                        <div class="form-group mb-3">
                            <label for="inputProductTitle" class="form-label">Product Name</label>
                            <input type="text" name="product_name"class="form-control" id="inputProductTitle" placeholder="Enter product title">
                        </div>
                        <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Product Tags</label>
                            <input type="text" name="product_tages" class="form-control visually-hidden" data-role="tagsinput" value="new product,top product">
                        </div>
                        <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Size</label>
                            <input type="text" name="product_size" class="form-control visually-hidden" data-role="tagsinput" value="sml,md,lg">
                        </div>
                        <div class="mb-3">
                            <label for="inputProductTitle" class="form-label">Color</label>
                            <input type="text" name="product_color" class="form-control visually-hidden" data-role="tagsinput" value="red,black,green">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputProductDescription" class="form-label">Short Description</label>
                            <textarea class="form-control" id="inputProductDescription" rows="3" name="short_descp"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputProductDescription" class="form-label">Long Description</label>
                            <textarea id="mytextarea" name="long_descp"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputProductDescription" class="form-label">Main Thumbnail</label>
                            <input class="form-control" type="file" id="formFile" name="product_thumbnail" onChange="mainThamUrl(this)">
                            <br><img src="" id="mainThmb" style="border-radius:5px"/>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputProductDescription" class="form-label">Multiple Images</label>
                            <input class="form-control" type="file" name="multi_imgs[]" multiple id="multiImg">
                            <br>
                            <div class="row" id="preview_img"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="border border-3 p-4 rounded">
                        <div class="row g-3">
                        <div class="form-group col-md-6">
                            <label for="inputPrice" class="form-label">Price</label>
                            <input type="text" class="form-control" id="inputPrice" placeholder="00.00" name="selling_price">
                            </div>
                            <div class="col-md-6">
                            <label for="inputCompareatprice" class="form-label">Dicount</label>
                            <input type="text" class="form-control" id="inputCompareatprice" placeholder="00.00" name="discount_price">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputCostPerPrice" class="form-label">Product Code</label>
                            <input type="text" class="form-control" id="inputCostPerPrice" placeholder="" name="product_code">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputStarPoints" class="form-label">Product Quantity</label>
                            <input type="text" class="form-control" id="inputStarPoints" placeholder="" name="product_qty">
                            </div>
                            <div class="form-group col-12">
                            <label for="inputProductType" class="form-label">Product Brand</label>
                            <select class="form-select" id="inputProductType" name="brand_id">
                                <option></option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                            <label for="inputVendor" class="form-label">Product Category</label>
                            <select class="form-select" id="inputVendor"name="category_id">
                                <option></option>
                                @foreach($catagory as $cat)
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                            <label for="inputCollection" class="form-label">Product Subcategory</label>
                            <select class="form-select" id="inputCollection"name="subcategory_id">
                                <option></option>
                            
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="hot_deals">
                                            <label class="form-check-label" for="flexCheckDefault">Hot Deals</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="featured">
                                            <label class="form-check-label" for="flexCheckDefault">Featured</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="special_offer">
                                            <label class="form-check-label" for="flexCheckDefault">Special Offer</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="special_deals">
                                            <label class="form-check-label" for="flexCheckDefault">Special Deals</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="d-grid">
                                <input type="submit" class="btn btn-primary bg-gradiant px-4" value="Save Changes" />
                                </div>
                            </div>
                        </div> 
                    </div>
                    </div>
                </div><!--end row-->
            </div>
            </div>
        </div>
        </form>
    </div>

    <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        product_name: {
                            required : true,
                        }, 
                        short_descp: {
                            required : true,
                        }, 
                        product_thumbnail: {
                            required : true,
                        }, 
                        multi_imgs: {
                            required : true,
                        }, 
                        selling_price: {
                            required : true,
                        }, 
                        product_code: {
                            required : true,
                        }, 
                        product_qty: {
                            required : true,
                        }, 
                        brand_id: {
                            required : true,
                        }, 
                        category_id: {
                            required : true,
                        }, 
                        subcategory_id: {
                            required : true,
                        }, 
                    },
                    messages :{
                        category_name: {
                            required : 'Please Enter Product Name',
                        },
                        short_descp: {
                            required : 'Please Enter A Short Description',
                        },
                        product_thumbnail: {
                            required : 'Please Select A Thumbnail Image',
                        },
                        multi_imgs: {
                            required : 'Please Select Product Images',
                        },
                        selling_price: {
                            required : 'Please Enter Product Price',
                        },
                        product_code: {
                            required : 'Please Enter Product Code',
                        },
                        product_qty: {
                            required : 'Please Enter Product Quantity',
                        },
                        brand_id: {
                            required : 'Please Select A Brand',
                        },
                        category_id: {
                            required : 'Please Select A Catagory',
                        },
                        subcategory_id: {
                            required : 'Please Select A Subcatagory',
                        },
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
    
</script>

    <script type="text/javascript">
        function mainThamUrl(input){
            if(input.files && input.files[0]){
                var reader =new FileReader();
                reader.onload =function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script> 
 
    $(document).ready(function(){
    $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
            
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result).css("border-radius","10px").width(100).height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
            
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
    });
    
 </script> 
  <script type="text/javascript">
  		
  		$(document).ready(function(){
  			$('select[name="category_id"]').on('change', function(){
  				var category_id = $(this).val();
  				if (category_id) {
  					$.ajax({
  						url: "{{ url('/vendor/subcategory/ajax') }}/"+category_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="subcategory_id"]').html('');
  							var d =$('select[name="subcategory_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
  </script>              




@endsection