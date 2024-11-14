<?php
include('includes/login_user.php');
include('../includes/includes/head.php');
include('includes/menu.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ข้อมูลหน่วยงานผู้รับผิดชอบโครงการ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลหน่วยงานผู้รับผิดชอบโครงการ</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#userAdd">
                                <i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูล
                            </button>
                            <div class="modal fade" id="userAdd">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="" method="POST">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูลหน่วยงานผู้รับผิดชอบ</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="name_agency" class="form-label">ชื่อหน่วยงานผู้รับผิดชอบโครงการ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                            <input type="text" required name="name_agency" placeholder="ป้อน-ชื่อหน่วยงานผู้รับผิดชอบโครงการ" class="form-control">
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
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อหน่วยงานผู้รับผิดชอบโครงการ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($db_->agency_jb() as $item) { ?>
                                        <tr>
                                            <td style="width:2%;"><?= $xi++ ?></td>
                                            <td><?= $item['name_agency']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="?userDelete=<?= $item['id_agency']; ?>" class="btn btn-default deteleData" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#userEdit<?= $item['id_agency']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="แก้ไขข้อมูล">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <div class="modal fade" id="userEdit<?= $item['id_agency']; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id_agency" value="<?= $item['id_agency']; ?>">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> แก้ไขข้อมูลหน่วยงานผู้รับผิดชอบ</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="name_agency" class="form-label">ชื่อหน่วยงานผู้รับผิดชอบโครงการ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                                            <input type="text" value="<?= $item['name_agency']; ?>" required name="name_agency" class="form-control" id="name_agency">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> ยกเลิก</button>
                                                                        <button type="submit" name="updateSubmit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> อัพเดท</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include('../includes/includes/script.php');
include('user_jb_ty_code.php');
?>