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
    @foreach ($product as $products)
     <div class="col-md-2 pb-3" >
        <div class="card p-3"  style="background-color: #f7fffe ;">
            <img src="{{ asset('imgs/product/1.jfif') }}" alt="Denim Jeans" style="width:100%">
            <h5 class="pt-2 fw-semibold text-truncate" style="font-size: 1rem;">{{ $products->product_name }}</h5>
            <p class="price fw-semibold">฿{{ number_format($products->product_price,2) }}</p>
            <a href="{{url('/detail_product/'.$products->product_id.'')}}" class="text-dark text-decoration-none"><button>รายละเอียด</button></a>
        </div>
    </div>
    @endforeach
    </div>
</div>

<!-- component/footer -->
@include('components.footer') 

<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


