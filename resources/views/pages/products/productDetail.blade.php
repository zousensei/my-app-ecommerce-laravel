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

<?php $product_qty = $products_detail->product_amount ; ?>
<div class="container pt-5 ">
  <div class="row"  style="background-color:#fff ;">

    <div class="col-md-5 pt-5 pb-5">
      <img src="{{ asset('imgs/product/1.jfif') }}" alt="Denim Jeans" style="width:100%">
    </div>

    <div class="col-md-7 p-3 pt-5 pb-5" >

        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">สินค้า</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">รายละเอียด</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

              <!-- contant -->
                  <div class="pt-4">
                    
                  <span style="font-size: 1.25rem;font-weight: 600;line-height: 1.5rem;">
                    {{ $products_detail->product_name }} 
                  </span>
                  <div class="pt-3">
                    <button button type="button" class="btn btn-outline-danger btn-sm">ถูกใจ</button>&nbsp;
                    <button type="button" class="btn btn-outline-secondary btn-sm">แชร์</button>
                  </div>
                  <div class="pt-3" >
                    <div class="container" style="background-color: #fef6f5 ;"> 
                        <h4 class="p-3"><span style="font-size: 1.875rem;font-weight: 700;color: #ee4d2d;">฿{{ $products_detail->product_price }} </span> THB</h4>
                    </div>
                  </div>

                  <form action="{{url('/carts')}}" method="POST" id="formcart">
                       @csrf
                       <input type="hidden" name="back" value="1" id="backpage">
                       <input type="hidden" name="product_id" value="{{$products_detail->product_id}}">
                      <div class="col-md-6 py-3 ">
                        <h6 class="fw-semibold">เลือกจำนวนสินค้า</h6>
                        <input type="number" class="form-control" min="1" max="<?php echo  $product_qty ?>" name="amount" value="1"/>
                        <small>( มีสินค้าทั้งหมด <?php echo  $product_qty ?> ชิ้น )</small>
                      </div>

                      <div class="pt-3 custombtn">
                        <button type="submit" >ซื้อสินค้า</button>
                        <a href="javascript:;"  onclick="addCart();"><button type="button">ใส่ตระกร้า</button></a>
                      </div>

                  </form>

                  </div>
                <!-- end contant -->

          </div>

          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
               <!-- contant -->
               <div class="pt-4">
               <div style="overflow: auto ; width: 100%; height: 455px; ">

               <div class="pt-1" >
                    <div class="container p-3" style="background-color:#fef6f5 ; font-weight: 600;"> 
                          ข้อมูลจำเพาะของสินค้า
                    </div>
                </div>

                <div class="pt-1" >
                    <div class="container p-3" style="background-color:#fff ;">  
                    <?php
                    $category_id      = $products_detail->category_id  ;
                    $categoey_product = DB::table('tb_category')->where('category_id', $category_id )->first();
                    ?>    
                    <p>หมวดหมู่ : {{ $categoey_product->category_name }}</p>
                    <p>จำนวน :   {{ $products_detail->product_amount }}</p>
                    <p>ส่งจาก : ร้อยเอ็ด</p>

                    </div>
                </div>

                <div class="pt-1" >
                    <div class="container p-3" style="background-color:#fef6f5 ; font-weight: 600;"> 
                        รายละเอียดสินค้า
                    </div>
                </div>

                <div class="pt-1" >
                    <div class="container p-3" style="background-color:#fff ;">      
                        {{ $products_detail->product_name }} 
                    </div>
                </div>

               </div>
               </div>
               <!-- end contant -->
          </div>

        </div>

    </div>
  </div>
</div>

<div class="container pt-3 pb-5" >
    <div class="row" style="background-color:#fff;">
    <div class="container p-4">
         <p class="pb-2 fw-semibold">คะแนนของสินค้า</p>
    </div>
    </div>
</div>

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

<script>

   function addCart(){ //เพิ่มสินค้าลงตะกร้า
      document.getElementById('backpage').value =2;
      $('#formcart').submit();
    }

    //---------------------------------------------------------//

</script>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


