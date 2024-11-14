<button type="button" class="btn btn-default" data-toggle="modal" data-target="#userUp">
    <i class="fa-solid fa-file-pen"></i> อัพโหลด
</button>
<div class="modal fade" id="userUp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="vil_up_save" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> อัพโหลดข้อมูลหมู่บ้าน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="file_upload" class="form-label">ไฟล์ Excel <i class="fa-solid fa-asterisk text-danger"></i></label>
                                <input type="file" required name="file_upload" class="form-control" accept=".xlsx, .xls, .csv">
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="../includes/file/ex_vil.xlsx" class="btn btn-success click_dowload">ไฟล์ตัวอย่าง</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> ยกเลิก</button>
                    <button type="submit" name="importSubmit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>