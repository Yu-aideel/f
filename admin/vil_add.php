<button type="button" class="btn btn-default" data-toggle="modal" data-target="#userAdd">
    <i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูล
</button>
<div class="modal fade" id="userAdd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูลหมู่บ้าน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name_vil" class="form-label">ชื่อหมู่บ้าน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="text" required name="name_vil" placeholder="ป้อน-ชื่อหมู่บ้าน" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="mu_vil" class="form-label">หมู่ที่ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="number" required name="mu_vil" placeholder="ป้อน-หมู่ที่" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="am_vil" class="form-label">อำเภอ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="am_vil" id="am_vil" required class="form-control select2">
                                    <option value="" disabled selected>--กรุณาเลือก--</option>
                                    <?php foreach ($db_->select_am() as $item) {
                                        echo '<option value="' . $item['idam'] . '">' . $item['a_name_th'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="tam_vil" class="form-label">ตำบล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="tam_vil" id="tam_vil" required class="form-control select2-1">
                                    <option value="" disabled selected>--กรุณาเลือก--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> ยกเลิก</button>
                    <button type="submit" name="saveSubmit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>