<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: #BFA280;
        /*text-align: center;*/
        margin-left: 35px;
    }

</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: #BFA280; font-size: 26px;"><strong>L'agora</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               L'agora Head Office <br>
               Email:support@L'agora.ly <br>
               Mob: +218-912128888 <br>
               Tripoli ,RasHassan <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{$order->name}} <br>
           <strong>Email:</strong> {{$order->email}} <br>
           <strong>Phone:</strong> {{$order->phone}} <br>
            @php
            $div = $order->division->division_name;
            $dis = $order->district->district_name;
            $state = $order->state->state_name;
            @endphp
           <strong>Address:</strong> {{$order->address}} / {{$div}} / {{$dis}} / {{$state}} <br>
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: #BFA280;">Invoice:</span> #{{$order->invoice_no}}</h3>
            Order Date: {{$order->order_date}} <br>
            Delivery Date: {{$order->delivered_date}} <br>
            Payment Type : {{$order->payment_method}}
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: #BFA280; color:#FFFFFF;">

      <tr class="font">
        <th>Product Name</th>
        <th>Color</th>
        <th>Size</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Vendor </th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>

     @foreach ($orderItem as $item)
         
      <tr class="font">
        <td align="center">{{$item->product->product_name}}</td>
        @if($item->color == NULL)
            <td align="center">......</td>   
        @else
            <td align="center">{{$item->color}}</td>
        @endif
        @if($item->size == NULL)
            <td align="center">......</td>   
        @else
            <td align="center">{{$item->size}}</td>
        @endif>
        <td align="center">{{$item->product->product_code}}</td>
        <td align="center">{{$item->qty}}</td>
        @if($item->vendor_id == NULL)
            <td align="center">L'agora</td>   
        @else
            <td align="center">{{$item->product->vendor->name}}</td>
        @endif>
        <td align="center">{{$item->price}} LYD</td>
      </tr>
     @endforeach
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: #BFA280;">Total:</span> {{$order->amount}}</h2>
            <h5><span style="color: #BFA280;">Total amount might differ when applying coupons</h5>

        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Choosing L'agora</p>
  </div>
</body>
</html>