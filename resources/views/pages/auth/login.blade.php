<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<body style="background-color: #e9ecef ;">

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
              <p class="pb-2 fw-semibold">เข้าสู่ระบบ</p>
              <form action="{{url('/checklogin')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control" name="username" placeholder="หมายเลขโทรศัพท์ / Email / ชื่อผู้ใช้" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน" required>
                    </div>
                    <div class="custombtn" >
                        <button type="submit" >เข้าสู่ระบบ</button>
                    </div>
                    <small><a href="#" class="text-danger forgotPassword">ลืมรหัสผ่าน</a></small>
                    <hr>
                    <div class="custombtn" >
                        <a href="{{url('/')}}"><button type="button" style="background-color: #DB4437;">Sing in with Google</button></a> <br><br>
                        <a href="{{url('/')}}"><button type="button" style="background-color: #4267B2;">Sing in with Facebook</button></a>
                    </div>
                    <p class="text-center pt-4"><span class="opacity-50">เพิ่งเคยเข้ามาใน zenzou shop ใช่หรือไม่</span>  <a href="#" class="text-danger register">สมัครใหม่</a></p>
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
    $('.register').click(function(e){
        e.preventDefault();
        $.ajax({
            url: '/register',
            type: 'GET',
            success: function(response){
                $('#page-content').html(response);
            }
        });
    });
});

  $(document).ready(function(){
    $('.forgotPassword').click(function(e){
        e.preventDefault();
        $.ajax({
            url: '/forgotPassword',
            type: 'GET',
            success: function(response){
                $('#page-content').html(response);
            }
        });
    });
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
<script>
    var alert = "{{Session::get('error')}}";
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


