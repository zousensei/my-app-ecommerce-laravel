<div class="container" >
    <div class="col-md-12" style="background-color:#fff;">
    <div class="container p-4">
        <p class="pb-2 fw-semibold">ที่อยู่</p>

        <table class="table">
            <tr>
                <td>1</td>
                <td>ชื่อผู้รับ : Sattawat Phanring <br> เบอร์โทร : 0630049185 </td>
                <td>92 ศรีโคตร จตุรพักตรพิมาน ร้อยเอ็ด <br> รหัสไปรษณี : 45180</td>
                <td><span class="badge text-bg-success"> ค่าเริ่มต้น </span></td>
                <td>ลบ</td>
            </tr>
            <tr>
                <td>2</td>
                <td>ชื่อผู้รับ : Sattawat Phanring <br> เบอร์โทร : 0630049185 </td>
                <td>92 ศรีโคตร จตุรพักตรพิมาน ร้อยเอ็ด <br> รหัสไปรษณี : 45180</td>
                <td>ตั้งเป็นค่าเริ่มต้น</td>
                <td>ลบ</td>
            </tr>
        </table>

        <div class="pb-4 pt-4  col-md-6 custombtn" >
            <a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#addAddress">เพิ่มที่อยู่</button></a>
        </div>

    </div>
    </div>
</div>

<!-- Modal address -->
<div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ee4d2d ; color: #fff ; ">
        <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มที่อยู่</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div class="mb-3">
        <label class="form-label">* ชื่อ-นามสกุล</label>
        <input type="text" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">* หมายเลขโทรศัพท์</label>
        <input type="text" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">* ที่อยู่</label>
        <input type="text" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">* เขต/อำเภอ</label>
        <input type="text" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">* จังหวัด</label>
        <input type="text" class="form-control" >
      </div>
      <div class="mb-3">
        <label class="form-label">* รหัสไปรษณี</label>
        <input type="text" class="form-control" >
      </div>

      <div class="pb-4 pt-4 col-md-12 custombtn text-center" >
            <a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">เพิ่มที่อยู่</button></a>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>