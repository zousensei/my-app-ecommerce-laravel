<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>ZENZOU</title>
    <style>
      .custombtn button {
      border: none;
      outline: 0;
      padding: 10px;
      color: white;
      background-color: #ee4d2d;
      text-align: center;
      cursor: pointer;
      width: 40%;
      font-size: 18px;
    }

    .custombtn button:hover {
      opacity: 0.7;
    }
    </style>
</head>
<body style="background-color: #e9ecef ;">

<!-- component/navbar -->
@include('components.navbar') 



<div class="container pt-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
         <p class="pb-2 fw-semibold">ทำการสั่งซื้อ</p>
    </div>
    </div>
</div>
<form action="" method="POST">

<!-- checkoutComponent/checkoutAddress -->
@include('pages.shoppingCart.checkoutComponent.checkoutAddress') 


<div class="container pt-3" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
        
    <table class="table">
        <tbody>
            <?php 
                $sum_total = 0 ;
            ?>
            @foreach($myOrder as $myOrders)
            <?php 
                $product   =  DB::Table('tb_product')->where('product_id', $myOrders->product_id )->first();   
                $sum       =  $product->product_price * $myOrders->amount ;
                $sum_total += $sum ;
            ?>
            <tr>
                <td width="10%"><img src="{{ asset('imgs/product/1.jfif') }}" class="rounded-0" alt="..." width="100rem"> </td>
                <td>
                {{ $product->product_name }} <br>
                ราคาต่อหน่วย : {{ $product->product_price }} บาท<br>
                จำนวน : x{{ $myOrders->amount }} <br>
                ราคารวม : {{ number_format($product->product_price *  $myOrders->amount,2) }} บาท 
                </td>
            </tr>
            <input class="form-check-input" type="text" value="{{ $myOrders->product_id  }}" name="product_id[]" hidden> 
            <input class="form-check-input" type="text" value="{{ $myOrders->amount }}" name="amount[]" hidden> 
            @endforeach
        </tbody>
        </table>

    </div>
    </div>
</div>

<div class="container pt-3" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
         <p class="pb-2 fw-semibold">* ช่องทางชำระเงิน</p>
         <p >ชำระเงินผ่านช่องทาง : <span id="name_bank"> </span> </p> 
         <select class="form-select form-select-lg mb-3"  name="bank" required>
            <option selected value="">เลือกช่องทางชำระเงิน</option>
            <option value="Wallet">Wallet</option>
            <option value="KPLUS">KPLUS</option>
            <option value="Krungsri">Krungsri</option>
            <option value="Krungthai Next">Krungthai Next</option>
            <option value="SCB EASY">SCB EASY</option>
            <option value="BualuangM">BualuangM</option>
        </select>

    </div>
    </div>
</div>

<div class="container pt-3 pb-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4 pb-5  ">

            <p class="pb-2 fw-semibold">สรุปการสั่งซื้อ</p> <hr>
            <p>ยอดราคารวมสินค้า : <span class="text-danger">{{ number_format($sum_total,2) }}</span>  บาท</p>
            <p>ค่าจัดส่ง :  <span class="text-danger"> ( {{ $checkMyOrder->transport }} ) {{ $checkMyOrder->transport_price }}</span>  บาท</p>
            <p class="pb-2 fw-semibold">ราคารวมสินค้า <span  style="font-size: 1.25rem;font-weight: 600;line-height: 1.5rem;color:#ee4d2d ;">{{ number_format($sum_total + $checkMyOrder->transport_price,2) }}</span> บาท</p>

            <div class="col-md-6 custombtn" >
                 <input class="form-check-input" type="text" value="{{ $checkMyOrder->code_orders }}" name="code_orders" hidden> 
                 <input class="form-check-input" type="text" value="{{ $checkMyOrder->transport }}" name="transport" hidden> 
                 <input class="form-check-input" type="text" value="{{ $checkMyOrder->transport_price }}" name="transport_price" hidden> 
                <button type="submit" >สั่งซื้อสินค้า</button>
                <a href="{{url('/delOrders/'.$checkMyOrder->code_orders.'')}}" onclick="return confirm('คุณต้องการยกเลิก [ ออร์เดอร์นี้ ] ใช่ไหม ? ')">
                    <button type="button" style="background-color: #353b45;">ยกเลิก ออร์เดอร์
                </button></a>
            </div>

    </div>
    </div>
</div>

</form>


<!-- component/footer -->
@include('components.footer') 

<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //สคลิปแสดงข้อมูลธนาคารที่เลือก
    const selectElement = document.querySelector('.form-select');
    const nameBankElement = document.querySelector('#name_bank');
  
    selectElement.addEventListener('change', function() {
        nameBankElement.textContent = selectElement.value;
    });
</script>

<script>
    var alert = "{{Session::get('success')}}";
    if(alert){
        Swal.fire({
            text : alert,
            confirmButtonColor: "#ee4d2d",
         })
    }
</script>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


