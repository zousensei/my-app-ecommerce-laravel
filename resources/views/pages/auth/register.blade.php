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
      background-color: #ff7337;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .custombtn button:hover {
      opacity: 0.7;
    }
    </style>
</head>
<body style="background-color: #ee4d2d;">

<div class="row" id="page-content"> 

<div class="col-md-12" style="background-color:#fff;">
    <div class="container p-3">
        <h3 class="fw-semibold">ZENZOU <span style="color: #ee4d2d;">SHOP</span> </h3>
    </div>
</div>

  <div class="col-md-4"></div>
  <div class="col-md-4">

      <div class="container p-5" ><br>
        <div class="col-md-12" style="background-color:#fff;">
           <div class="container p-4">
              <p class="pb-2 fw-semibold">สมัครสมาชิกใหม่</p>
              <form  action="{{url('/createAccount')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control" name="customer_username" placeholder="ชื่อผู้ใช้" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="customer_phone" placeholder="หมายเลขโทรศัพท์" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="customer_email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="customer_password" placeholder="รหัสผ่าน" required>
                    </div>
                    <div class="custombtn" >
                        <button type="submit">ต่อไป</button>
                    </div>
                    <hr>
                    <p class="text-center">
                       <small>โดยการเปิดบัญชี zenzou shop ท่านรับทราบและตกลงตาม <br> 
                       <a href="">เงือนไขการให้บริการ</a>  &  <a href="">นโยบายความเป็นส่วนตัว</a></small>
                    </p> 
                    <p class="text-center pt-3"><span class="opacity-50">หากมีบัญชีผู้ใช้แล้ว คุณสามารถ</span>  <a href="#" class="text-danger loginIndex">เข้าสู่ระบบ</a></p>
              </form>
            </div>
        </div>
      </div>

  </div>
</div>
<div class="col-md-4"></div>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('.loginIndex').click(function(e){
        e.preventDefault();
        $.ajax({
            url: '/login',
            type: 'GET',
            success: function(response){
                $('#page-content').html(response);
            }
        });
    });
});

</script>

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


