<div class="container pt-3 pb-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
        <p class="pb-2 fw-semibold">การสั่งซื้อของฉัน</p>

        <table class="table">

            <?php 
                $sum_total = 0 ;
                $i = 1 ;
            ?>
            @foreach($myOrderDetails as $myOrderDetail)
            <?php 
                $countOrdersDetails = DB::Table('tb_orders_detail')->where('code_orders', $myOrderDetail->code_orders )->get();       
            ?>
            <tr>
                <td>{{ $i++ }}</td>
                <td>ID Order : {{ $myOrderDetail->code_orders }} </td>
                <td> 
                    @foreach($countOrdersDetails as $countOrdersDetail)
                    <?php
                         $product   =  DB::Table('tb_product')->where('product_id', $countOrdersDetail->product_id )->first();   
                         $detail    =  DB::Table('tb_orders_detail')->where('code_orders', $countOrdersDetail->code_orders )->first();  

                    ?>
                    ( x{{ $detail->amount }} )  {{ $product->product_name }} <br>
                    @endforeach
                </td>
                <td>ราคารวมส่ง : {{ $detail->price_total }}</td>
                <td>วันที่ : {{ $detail->created_at }}</td>
            </tr>
            @endforeach
        </table>

    </div>
    </div>
</div>
