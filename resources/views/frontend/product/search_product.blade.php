<style>

    .card {
        background-color: white;

        border: solid rgb(195, 195, 195);
    }
    .input-box {
        position: relative;
    }
    .input-box i {
        position: absolute;
        right: 13px;
        top:15px;
        color: #ced4da
    }
    .form-control {
        height:50px;
    }
    .form-control:focus{
        box-shadow: none;
        border-color:#eee;
    }
    .list{
		padding: 15px;
		display: flex;
		align-items: center;
	}
	.border-bottom{
		border: none;
	}
	.list i {
		font-size: 19px;
		color: red;
	}
	.list small{
		color: #8e8e8e;
	}
</style>

@if($products -> isEmpty())
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding: 15px;">
<h4 class="text-left text-Secondary">Product Not Found</h4>
            </div>
        </div>
    </div>
</div>  
@else 
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @foreach($products as $item)
                        <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}">
                            <div class="list border-bottom">
                                <img src="{{asset($item->product_thumbnail)}}" style="width:40px;height:40px">
                                <div class="d-flex flex-column ml-5" style="margin-left:10px;font-size:16px;font-weight:bold">
                                    <span>{{$item->product_name}}</span><small>{{$item->selling_price}} LYD</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>  
    </div>

@endif