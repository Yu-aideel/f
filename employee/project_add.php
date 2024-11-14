<button type="button" class="btn btn-default" data-toggle="modal" data-target="#userAdd">
    <i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูล
</button>
<div class="modal fade" id="userAdd">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูลโครงการ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="year" class="form-label">ปี <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="year" id="year" required class="form-control select2">
                                    <option value="" disabled selected>--กรุณาเลือก--</option>
                                    <?php
                                    $b = year_thai() + 10;
                                    $l = year_thai() - 3;
                                    for ($i = $l; $i < $b; $i++) {
                                    ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="id_tam" class="form-label">ตำบล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="id_tam[]" id="id_tam" required class="form-control select2" multiple>
                                    <?php foreach ($db_->tam() as $item) { ?>
                                        <option value="<?= $item['idtm']; ?>"><?= $item['tm_name_th']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="id_vil" class="form-label">ชื่อหมู่บ้าน/ชุมชน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <select name="id_vil[]" id="id_vil" required class="form-control select2" multiple>
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