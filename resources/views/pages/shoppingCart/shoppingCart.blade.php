<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

<div class="container pt-3" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
        
    <table class="table">
        <tbody>
        <?php 
        for($i=1 ; $i <= 3 ; $i++){
        ?>
            <tr>
                <td width="2%">
                    <div class="form-check pt-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    </div>
                </td>
                <td width="10%"><img src="{{ asset('imgs/product/1.jfif') }}" class="rounded-0" alt="..." width="100rem"> </td>
                <td>ปลากัดหม้อตัวเมีย (Gold Flying) <br>ราคา : 199 บาท<br>จำนวน : x1</td>
                <td><a href="#" class="text-danger text-decoration-none"><p >ลบ</p></a></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>

    </div>
    </div>
</div>

<div class="container pt-3 pb-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4 pb-5  ">

            <p class="pb-2 fw-semibold">สรุปการสั่งซื้อ</p> <hr>
            <p>จำนวน <span class="text-danger">2</span>  ชิ้น</p>
            <p class="pb-2 fw-semibold">ราคารวมสินค้า <span  style="font-size: 1.25rem;font-weight: 600;line-height: 1.5rem;color:#ee4d2d ;">990</span> บาท</p>

        <div class="col-md-6 custombtn" >
              <a href="{{url('/shoppingCheckout')}}"><button type="button" >ดำเนินการต่อ</button></a>
              <a href="{{url('/')}}"><button type="button" >ซื้อสินค้าต่อ</button></a>
        </div>

  


    </div>
    </div>
</div>




<!-- component/footer -->
@include('components.footer') 

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>


