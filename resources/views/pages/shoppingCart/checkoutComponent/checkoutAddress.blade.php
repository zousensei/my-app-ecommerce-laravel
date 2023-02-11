        <div class="container pt-3" >
            <div class="col-md-12" style="background-color:#fff;">
            <div class="container p-4">
                <p class="pb-2 fw-semibold">* ที่อยู่ในการจัดส่ง : ( <a href="#" class="text-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#address">แก้ไข</a> )</p>
                @if($addressOn != null)
                    <p>{{ $addressOn->customer_name }} , {{ $addressOn->customer_phone }} , {{ $addressOn->customer_address }} ต.{{ $addressOn->customer_tumbon }} อ.{{ $addressOn->customer_district }} จ.{{ $addressOn->customer_province }}  รหัสไปรษณี : {{ $addressOn->customer_postcode }}</p>
                @endif
            </div>
            </div>
        </div>

        <!-- Modal show address-->
        <div class="modal fade" id="address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header" >
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ที่อยู่ของคุณ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- address -->

                <table class="table">
                    @if($addressOn != null)
                    <tr>
                        <td>1</td>
                        <td>ชื่อผู้รับ : {{ $addressOn->customer_name }} <br> เบอร์โทร : {{ $addressOn->customer_phone }} </td>
                        <td>{{ $addressOn->customer_address }} {{ $addressOn->customer_tumbon }} {{ $addressOn->customer_district }} {{ $addressOn->customer_province }} <br> รหัสไปรษณี : {{ $addressOn->customer_postcode }}</td>
                        <td><span class="badge text-bg-success"> ค่าเริ่มต้น </span></td>
                    </tr>
                    @endif
                    <?php $addressRow = 2 ; ?>
                    @foreach($addressOff as $addressOffs)
                    <tr>
                        <td>{{ $addressRow++ }}</td>
                        <td>ชื่อผู้รับ : {{ $addressOffs->customer_name }} <br> เบอร์โทร : {{ $addressOffs->customer_phone }} </td>
                        <td>{{ $addressOffs->customer_address }} {{ $addressOffs->customer_tumbon }} {{ $addressOffs->customer_district }} {{ $addressOffs->customer_province }} <br> รหัสไปรษณี : {{ $addressOn->customer_postcode }}</td>
                        <td><a href="{{ url('/changeAddress/'.$addressOffs->customer_address_id.'') }}" class="text-decoration-none">ตั้งเป็นค่าเริ่มต้น</a></td>
                    </tr>
                    @endforeach
                </table>

                <div class="pb-4 pt-4  col-md-12 custombtn text-center" >
                    <a href="#"><button type="button" data-bs-toggle="modal" data-bs-target="#addAddress">เพิ่มที่อยู่</button></a>
                </div>

                <!-- end address -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal add address -->
        <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #ee4d2d ; color: #fff ; ">
                <h1 class="modal-title fs-5" id="exampleModalLabel">เพิ่มที่อยู่</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
            <form action="{{ url('/addAddress') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">* ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" name="customer_name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">* หมายเลขโทรศัพท์</label>
                    <input type="text" class="form-control" name="customer_phone" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">* ที่อยู่บ้านเลขที่ / หมู่บ้าน</label>
                    <input type="text" class="form-control" name="customer_address" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">* ตำบล</label>
                    <input type="text" class="form-control" name="customer_tumbon" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">* เขต/อำเภอ</label>
                    <input type="text" class="form-control" name="customer_district" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">* จังหวัด</label>
                    <input type="text" class="form-control" name="customer_province" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">* รหัสไปรษณี</label>
                    <input type="text" class="form-control" name="customer_postcode" required>
                </div>

                <div class="pb-4 pt-4 col-md-12 custombtn text-center" >
                    <button type="submit">เพิ่มที่อยู่</button>
                </div>

            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>