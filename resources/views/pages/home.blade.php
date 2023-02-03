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
    <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: rgb(238, 77, 45);,
  font-size: 1rem;
}

.card button {
  border: none;
  outline: 0;
  padding: 6px;
  color: white;
  background-color: #ee4d2d;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body style="background-color: #e9ecef ;">

<!-- component/navbar -->
@include('components.navbar') 

<!-- component/carousel -->
@include('components.carousel') 

<!-- component/category -->
@include('components.category') 

<div class="container  pb-5">
    <p class="pb-2 fw-semibold">Product</p>
    <div class="row">
    <?php 
    for($i=1 ; $i <= 12 ; $i++){
     ?>
     <div class="col-md-2 pb-3" >
        <div class="card p-3"  style="background-color: #f7fffe ;">
            <img src="{{ asset('imgs/product/1.jfif') }}" alt="Denim Jeans" style="width:100%">
            <h5 class="pt-2 fw-semibold text-truncate" style="font-size: 1rem;">เครื่องเป่าผมราคาถูกที่ต้องการมากที่สุด</h5>
            <p class="price fw-semibold">฿19.99</p>
            <a href="{{url('/detail_product')}}" class="text-dark text-decoration-none"><button>Add to Cart</button></a>
        </div>
    </div>
    <?php } ?>
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


