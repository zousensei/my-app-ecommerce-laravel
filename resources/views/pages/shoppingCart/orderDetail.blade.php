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
    
         <div class="row">
            <div class="col-md-6">
                <p class="pb-2 fw-semibold">รายละเอียดการซื้อ:</p>
                <p>ID Order : 623513</p>
                <p>วันที่ : 12-12-2026 10:11:59</p>
            </div>
            <div class="col-md-6">
                <p class="pb-2 fw-semibold">ข้อมูลการจัดส่งลูกค้า :</p>
                <p>ชื่อผู้รับ : Sattawat Phanring เบอร์โทร : 0630049185</p>
                <p>92 ศรีโคตร จตุรพักตรพิมาน ร้อยเอ็ด รหัสไปรษณี : 45180</p>
            </div>
        </div>

    </div>
    </div>
</div>

<div class="container pt-3" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
    
      <table class="table">
                <tr style="background-color:#fafafa ;">
                    <td>No.</td>
                    <td>รายการสินค้า</td>
                    <td>จำนวน</td>
                    <td>ราคา</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>น้ำปลา</td>
                    <td>x1</td>
                    <td>180</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>น้ำตาลทราย</td>
                    <td>x1</td>
                    <td>70</td>
                </tr>
                <tr style="background-color:#fafafa ;">
                    <td></td>
                    <td>ยอดรวมทั้งหมด</td>
                    <td></td>
                    <td>250</td>
                </tr>
        </table>

    </div>
    </div>
</div>

<div class="container pt-3 pb-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4 pb-5  ">

            <p class="pb-2 fw-semibold">สรุปการสั่งซื้อ</p> <hr>
            <p>ยอดราคารวมสินค้า : <span class="text-danger">250</span>  บาท</p>
            <p>ค่าจัดส่ง : <span class="text-danger">50</span>  บาท</p>
            <p class="pb-2 fw-semibold">ราคารวมทั้งหมด <span  style="font-size: 1.25rem;font-weight: 600;line-height: 1.5rem;color:#ee4d2d ;">300</span> บาท</p>

            <div class="col-md-6 custombtn" >
                <a href="{{url('/')}}"><button type="button" >กลับหน้าหลัก</button></a>
            </div>

    </div>
    </div>
</div>


<!-- component/footer -->
@include('components.footer') 

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


