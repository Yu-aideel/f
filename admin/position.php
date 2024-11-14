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
                    <h1>ข้อมูลตำแหน่ง</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลตำแหน่ง</li>
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
                                                <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> เพิ่มข้อมูลตำแหน่ง</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="name_pos" class="form-label">ชื่อตำแหน่ง</label>
                                                            <input type="text" name="name_pos" placeholder="ป้อน-ชื่อตำแหน่ง" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-end">
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
                                        <th>ชื่อตำแหน่ง</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($db_->pos() as $item) { ?>
                                        <tr>
                                            <td style="width:2%;"><?= $xi++ ?></td>
                                            <td><?= $item['name_pos']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="?userDelete=<?= $item['id_pos']; ?>" class="btn btn-default deteleData" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#userEdit<?= $item['id_pos']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="แก้ไขข้อมูล">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <div class="modal fade" id="userEdit<?= $item['id_pos']; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id_pos" value="<?= $item['id_pos']; ?>">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> แก้ไขข้อมูลตำแหน่ง</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="name_pos" class="form-label">ชื่อตำแหน่ง</label>
                                                                            <input type="text" value="<?= $item['name_pos']; ?>" name="name_pos" class="form-control" id="name_pos">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-end">
                                                                        <button type="submit" name="updateSubmit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึก</button>
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
include('position_code.php');
?>