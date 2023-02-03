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
      padding: 15px;
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

<?php $count_num = 5 ; ?>
<div class="container pt-5 pb-5">
  <div class="row"  style="background-color:#fff ;">

    <div class="col-md-5 pt-5 pb-5">
      <img src="{{ asset('imgs/product/1.jfif') }}" alt="Denim Jeans" style="width:100%">
    </div>

    <div class="col-md-7 p-3 pt-5 pb-5" >
    <!-- contant -->
      <span style="font-size: 1.25rem;font-weight: 600;line-height: 1.5rem;">
        ไดร์เป่าผม รุ่นckl-6268 คละสี คละยี่ห้อ CKL or JMF ไดร์เป่าผม ปรับความร้อน&แรงลมได้) ไดร์เป่าผม เป่าผม ไ
      </span>

      <div class="pt-3" >
        <div class="container" style="background-color: #fef6f5 ;"> 
            <h4 class="p-3"><span style="font-size: 1.875rem;font-weight: 700;color: #ee4d2d;">฿199.00</span> THB</h4>
        </div>
      </div>

      <div class="col-md-6 py-3 ">
        <h6 class="fw-semibold">เลือกจำนวนสินค้า</h6>
        <input type="number" class="form-control" min="1" max="<?php echo  $count_num ?>" value="1"/>
        <small>( มีสินค้าทั้งหมด <?php echo  $count_num ?> ชิ้น )</small>
      </div>

      <div class="pt-3 custombtn">
        <a href="{{url('/shoppingCart')}}"><button type="button" >ซื้อสินค้า</button></a>
        <button type="button" >ใส่ตระกร้า</button>
      </div>
    <!-- end contant -->
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


