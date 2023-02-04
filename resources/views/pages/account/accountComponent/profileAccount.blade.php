<div class="container pt-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
        <p class="pb-2 fw-semibold">ข้อมูลของฉัน</p>

        <form action="">
                <div class="mb-3">
                    <label class="form-label">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">อีเมล์</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">หมายเลขโทรศัพท์</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">วันเกิด</label>
                    <input type="date" class="form-control" name="birthday" required>
                </div>
            </div>

            <div class="px-4 pb-5 mb-3 col-md-6 custombtn" >
              <a href="{{url('/shoppingCheckout')}}"><button type="button" >บันทึกข้อมูล</button></a>
            </div>
        </form>
        
    </div>
    </div>
</div>