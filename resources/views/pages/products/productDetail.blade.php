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

<?php $count_num = 5 ; ?>
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
                    ไดร์เป่าผม รุ่นckl-6268 คละสี คละยี่ห้อ CKL or JMF ไดร์เป่าผม ปรับความร้อน&แรงลมได้) ไดร์เป่าผม เป่าผม 
                  </span>
                  <div class="pt-3">
                    <button button type="button" class="btn btn-outline-danger btn-sm">ถูกใจ</button>&nbsp;
                    <button type="button" class="btn btn-outline-secondary btn-sm">แชร์</button>
                  </div>
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
                    <p>หมวดหมู่ : ไดร์เป่าผม</p>
                    <p>จำนวน : 5</p>
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
                      รองเท้าลายการ์ตูน รองเท้าแตะน่ารัก ใส่เล่นในวันสบายๆ ตัวรองเท้าเป็นยาง ล้างทำความสะอาดง่าย แบบสวม หน้ารองเท้าแต่งเป็นลายกีกี้ ลาล่า เพิ่มความน่ารัก เอาใจสาวกลิตเติ้ลทวินสตาร์🌈
                      <br>
                      ---<br>
                      1、หลังจากรับสินค้า ถ้าลูกค้าพอใจ กรุณาให้5ดาวค่ะ⭐⭐⭐⭐⭐ 
                      นี่เป็นสิ่งสำคัญมากสำหรับร้านค้าค่ะ 🙏🏻🙏🏻  HotSale.store ขอบคุณที่ให้กำลังใจค่ะ 💐💐<br><br>

                      2、หากลูกค้าไม่พอใจกับการสั่งสินค้าหรือมีปัญหาอย่างไรเกิดขึ้น 
                      📲📲 โปรดบอกในแชท ทางร้านจะรับผิดชอบในสิ่งที่เกิดขึ้นและช่วยกันแก้ไขปัญหาค่ะ 🙇🏻‍♀️🙇🏻‍♂️ <br><br>

                      #HotSale #Fashion #Women #littletwinstars #รองเท้าแตะลิตเติ้ลทวินสตาร์ #พริตตี้ #ราคาส่ง #พร้อมส่ง #รองเท้าสตรี #รองเท้า #รองเท้าลำลอง #รองเท้าเกาหลี #รองเท้าฤดูร้อน #รองเท้าแตะราคาถูก #รองเท้านุ่ม #รองเท้าราคาส่ง #รองเท้าเด็กผู้หญิง #รองเท้าคุณภาพดีราคาถูก #รองเท้าsale #รองเท้าลุยน้ำ #รองเท้าฮิต #รองเท้ารัดส้น #รองเท้าลําลอง #ราคาถูก #รองเท้าส้นสูง #รองเท้าแฟชั่น  #รองเท้าแตะแบบสบาย #รองเท้าแตะรัดส้น #รองเท้ารัดส้น #รองเท้ารัดส้นผู้หญิง #รองเท้าสายรัดข้อ #รองเท้าผู้หญิง #รองเท้าพร้อมส่ง #รองเท้านําเข้า #รองเท้าแตะลำลอง
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

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


