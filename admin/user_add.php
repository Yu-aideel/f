<button type="button" class="btn btn-default" data-toggle="modal" data-target="#userAdd">
    <i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูล
</button>
<div class="modal fade" id="userAdd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูลผู้ใช้ระบบ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">ชื่อ-นามสกุล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="text" name="name" placeholder="ป้อน-ชื่อ-นามสกุล" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">เบอร์โทรศัพท์ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="text" maxlength="10" name="phone" placeholder="ป้อน-เบอร์โทรศัพท์" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="email" name="email" placeholder="ป้อน-อีเมล" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="role" class="form-label">สถานะ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="role" class="form-control select2-1" id="role">
                                    <option value="" disabled selected>--กรุณาเลือก--</option>
                                    <?php foreach ($db_->role() as $item) {
                                        if ($item['id_role'] != '3') {
                                    ?>
                                            <option value="<?= $item['id_role']; ?>"><?= $item['name_role']; ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="agency" class="form-label">หน่วยงาน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="agency" class="form-control select2" id="agency">
                                    <option value="" disabled selected>--กรุณาเลือก--</option>
                                    <?php foreach ($db_->agency() as $item) { ?>
                                        <option value="<?= $item['id_agency']; ?>"><?= $item['name_agency']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="id_pos" class="form-label">ตำแหน่ง <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="id_pos" class="form-control select2-2" id="id_pos">
                                    <option value="" disabled selected>--กรุณาเลือก--</option>
                                    <?php foreach ($db_->pos() as $item) { ?>
                                        <option value="<?= $item['id_pos']; ?>"><?= $item['name_pos']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>ข้อมูลเข้าสู่ระบบ</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="text" name="username" class="form-control" placeholder="ป้อน-username">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="password" name="password" class="form-control" placeholder="ป้อน-รหัสผ่าน">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="password2" class="form-label">ยืนยันรหัสผ่าน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="password" name="password2" class="form-control" placeholder="ป้อน-ยืนยันรหัสผ่าน">
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