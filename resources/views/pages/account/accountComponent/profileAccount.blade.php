<div class="container pt-5" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
        <p class="pb-2 fw-semibold">ข้อมูลของฉัน</p>

        <form action="{{ url('/updateProfile') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">* ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" name="customer_username" value="{{ $customer->customer_username }}" required>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" name="customer_name" value="{{ $customer->customer_name }}" placeholder="เพิ่มชื่อ" >
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="customer_lname" value="{{ $customer->customer_lname }}" placeholder="เพิ่มนามสกุล" >
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">* อีเมล์</label>
                    <input type="email" class="form-control" name="customer_email" value="{{ $customer->customer_email }}" placeholder="เพิ่ม email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">* หมายเลขโทรศัพท์</label>
                    <input type="tel" class="form-control" name="customer_phone" value="{{ $customer->customer_phone }}" placeholder="เพิ่มหมายเลขโทรศัพท์" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">วันเกิด</label>
                    <input type="date" class="form-control" name="customer_birthday" value="{{ $customer->customer_birthday }}" placeholder="เพิ่มวันเกิด" >
                </div>
            </div>

            <div class="px-4 pb-5 mb-3 col-md-6 custombtn" >
              <button type="submit" >บันทึกข้อมูล</button>
            </div>
        </form>
        
    </div>
    </div>
</div>