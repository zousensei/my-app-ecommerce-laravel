<style>
  @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap');
  *{
    font-family: 'Kanit', sans-serif;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#ee4d2d;">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">ZENZOU SHOP</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul> -->
    </div>

      <span class="d-flex" >
        <div class="position-relative ">
           <a href="{{url('/shoppingCart')}}" class=" text-white text-decoration-none">ตระกร้าสินค้า</a>
           <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-light text-danger ">2</span> 
        </div>

        <div class="dropdown">
          <a href="#"  class="px-4 text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">บัญชี</a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item" href="{{url('/home_account')}}">ข้อมูลบัญชี</a></li>
            <li><a class="dropdown-item" href="{{url('/login')}}">ออกจากระบบ</a></li>
          </ul>
        </div>
  
      </span>

  </div>
</nav>




