<div class="container pt-5 pb-5">
    <p class="pb-2 fw-semibold">Category</p>
        <div class="container pt-3 pb-2" style="background-color: #f7fffe ;">
                
        <div class="row" style="overflow-x: hidden;">
        <?php 
        for($i=1 ; $i <= 6 ; $i++){
        ?>
        
            <div class="col-md-2 text-center p-2" style="boder:1px;">
                <a href="#" class="text-dark text-decoration-none">
                    <img src="{{ asset('imgs/category/1.jpg') }}" class="rounded-circle text-center" alt="..." width="100rem">
                    <p >คอมพิมเตอร์และแลปท๊อป</p> 
                </a>
            </div>
        

        <?php }?>

        </div>

    </div>
</div>