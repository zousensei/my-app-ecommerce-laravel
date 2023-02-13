<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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

<!-- accountComponent/profileAccount -->
@include('pages.account.accountComponent.profileAccount') 

<!-- accountComponent/addressAccount -->
@include('pages.account.accountComponent.addressAccount') 


<div class="container pt-3" >
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
                <td width="10%" >{{ $No++ }}</td>
                <td width="10%" class="text-center">ID Order : {{ $Orders->code_orders }} </td>

                <td width="20%" class="text-center">{{ $countOrders->count() }} รายการ</td>

                <td width="20%" class="text-center">วันที่ {{ $Orders->created_at }}</td>
                <td width="20%" >
                <div class="custombtn text-center">
                 <a href="{{url('/shoppingCheckout/'.$Orders->code_orders.'')}}">
                    <button type="button" style="width:40%; background-color: #353b45; padding: 8px; font-size: 15px;">
                            ดำเนินการต่อ
                    </button>
                 </a>
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

<!-- accountComponent/historyOrderAccount -->
@include('pages.account.accountComponent.historyOrderAccount') 


<!-- component/footer -->
@include('components.footer') 

<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


