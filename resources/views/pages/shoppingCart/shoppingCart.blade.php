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
         <p class="pb-2 fw-semibold">ตระกร้าสินค้า</p>
    </div>
    </div>
</div>

    <form action="{{ url('/addNewOrders') }}" method="POST">
    @csrf
    <div class="container pt-3" >
        <div class="col-md-12" style="background-color:#fff;">
        <div class="container p-4">
            
        <table class="table">
            <tbody>
            @if($myCart->count() != 0)
                @foreach($myCart as $key => $myCarts)
                
                <?php 
                    $product = DB::Table('tb_product')->where('product_id', $myCarts->product_id )->first();       
                ?>
                <tr>
                    <td width="2%">
                        <div class="form-check pt-4">
                             <input class="form-check-input checkbox" type="checkbox" value="{{ $product->product_price * $myCarts->amount  }}" id="checkboxPrice{{$product->product_id}}" onclick="updateCheckboxes({{$product->product_id}})"> 
                             <input class="form-check-input checkbox" type="checkbox" value="{{ $myCarts->product_id  }}" name="product_id[]" id="checkboxProductId{{$product->product_id}}" hidden> 
                             <input class="form-check-input checkbox" type="checkbox" value="{{ $myCarts->amount  }}" name="amount[]" id="checkboxAmount{{$product->product_id}}" hidden> 
                        </div>
                    </td>
                    <td width="10%"><img src="{{ asset('imgs/product/1.jfif') }}" class="rounded-0" alt="..." width="100rem"> </td>
                    <td> {{$product->product_name}} <br>ราคาต่อหน่วย : {{ number_format($product->product_price,2) }} บาท<br> 
                        จำนวน : x{{ $myCarts->amount }} <br> 
                        ราคารวม : {{ number_format($product->product_price *  $myCarts->amount,) }} บาท 
                    </td>
                    <td><a href="{{ url('/delCart/'.$myCarts->cart_id.'') }}" class="text-danger text-decoration-none"><p >ลบ</p></a></td>
                </tr>
                @endforeach
            @else
                <tr style="text-align: center;">
                    <td colspan="4"> ### ไม่มีสินค้าในตะกร้า ###</td>
                </tr>
            @endif

            </tbody>
            </table>

        </div>
        </div>
    </div>

    <div class="container pt-3" >
        <div class="col-md-12" style="background-color:#fff;">
        <div class="container p-4 pb-5  ">

                <p class="pb-2 fw-semibold">* ขนส่ง</p> <hr class="pb-3">

                <?php 
                $transports = array(
                    array( 'transport' => 'ไปรษณีไทย' , 'transport_price' => '60' ),
                    array( 'transport' => 'แฟรช' ,      'transport_price' => '120' ),
                    array( 'transport' => 'kerry' ,     'transport_price' => '80' ),
                );
                ?>

                <select class="form-select form-select-lg" id="shipping" name="transport_price" required>
                <option selected value="">เลือกขนส่ง</option>

                <?php foreach ($transports as $transport) { ?>
                    <option value="<?php echo $transport['transport_price']; ?>"><?php echo $transport['transport']; ?> ( ค่าส่ง <?php echo $transport['transport_price']; ?> บาท )</option>
                <?php } ?>

                </select>
                <input type="hidden" name="transport" id="transport">
                
        </div>
        </div>
    </div>

    <div class="container pt-3" >
        <div class="col-md-12" style="background-color:#fff;">
        <div class="container p-4 pb-5  ">

                <p class="pb-2 fw-semibold">สรุปการสั่งซื้อ</p> <hr>
                <p>จำนวน <span class="text-danger" id="count">0</span>  รายการ</p>
                <p class="pb-2 fw-semibold">ราคารวมสินค้า <span  style="font-size: 1.25rem;font-weight: 600;line-height: 1.5rem;color:#ee4d2d ;" id="total">0</span> บาท</p>

            <div class="col-md-6 custombtn" >
                <button type="button" id="notiAlert">ดำเนินการต่อ</button>
                <button type="submit" id="submitAddOrders" hidden>ดำเนินการต่อ</button>
                <a href="{{url('/')}}"><button type="button" >ซื้อสินค้าต่อ</button></a>
            </div>

        </div>
        </div>
    </div>
    </form>


    <div class="container pt-3 pb-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
        <p class="pb-2 fw-semibold">ออร์เดอรที่ยังไม่ชำระเงิน</p>

        <table class="table">
        @if($Order->count() != 0)
        <?php $No = 1 ;?>
        @foreach($Order as $Orders)
        <?php 
            $countOrders = DB::Table('tb_orders')->where('code_orders', $Orders->code_orders )->get();       
        ?>
            <tr>
                <td width="10%" class="text-center">{{ $No++ }}</td>
                <td width="10%" class="text-center">ID Order : {{ $Orders->code_orders }} </td>

                <td width="20%" class="text-center">{{ $countOrders->count() }} รายการ</td>

                <td width="20%" class="text-center">วันที่ {{ $Orders->created_at }}</td>
                <td width="20%" >
                <div class="custombtn text-center">
                  <button type="button" style="width:40%; background-color: #353b45; padding: 8px; font-size: 15px;">ดำเนินการต่อ</button>
                  <a href="{{url('/delOrders/'.$Orders->code_orders.'')}}" onclick="return confirm('คุณต้องการยกเลิกออ์เดอร์ [ {{ $Orders->code_orders }} ] ใช่ไหม ? ')">
                    <button type="button" style="width:40%; background-color: #dc3545; padding: 8px; font-size: 15px;">
                        ยกเลิก
                    </button>
                  </a>
                </div>
                
                </td>
            </tr>
        @endforeach
        @else
            <tr style="text-align: center;">
                <td colspan="4"> ### ไม่มีรายการออร์เดอร์ ###</td>
            </tr>
         @endif
        </table>

    </div>
    </div>
    </div>

<!-- component/footer -->
@include('components.footer') 

<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script> //การส่ง transport ไปกับ select  
    document.getElementById("shipping").addEventListener("change", function() {
        var selectedTransport = this.options[this.selectedIndex].text;
        selectedTransport = selectedTransport.split(" (")[0];
        document.getElementById("transport").value = selectedTransport;
    });
</script>

<script>
    function updateCheckboxes(id) { //เลือก check พร้อมกัน
        var checkboxPrice = document.getElementById("checkboxPrice" + id);
        var checkboxProductId = document.getElementById("checkboxProductId" + id);
        var checkboxAmount = document.getElementById("checkboxAmount" + id);
        checkboxProductId.checked = checkboxPrice.checked;
        checkboxAmount.checked = checkboxPrice.checked;
    }
</script>

<script>
    // คำนวนราคา
    const checkboxes     = document.querySelectorAll('.checkbox');
    const shippingSelect = document.querySelector('#shipping');
    const total          = document.querySelector('#total');
    const count          = document.querySelector('#count');

    let sum          = 0;
    let shippingFee  = 0;
    let checkedCount = 0;

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
            sum += parseInt(checkbox.value);
            checkedCount++;
            } else {
            sum -= parseInt(checkbox.value);
            checkedCount--;
            }

            total.textContent = sum + shippingFee;
            count.textContent = checkedCount;
        });
    });

    shippingSelect.addEventListener('change', () => {
    shippingFee = parseInt(shippingSelect.value) || 0;
    total.textContent = sum + shippingFee;
    });

    //แจ้งเตือนให้เลือกสินค้า
    document.querySelector("#notiAlert").addEventListener("click", function() {
        if (checkedCount === 0) {
            Swal.fire({
                    text : "กรุณาเลือกสินค้า",
                    confirmButtonColor: "#ee4d2d",
            })
        }else{
            $('#submitAddOrders').click();
        } 
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


