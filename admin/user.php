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
                    <h1>ข้อมูลผู้ใช้ระบบ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลผู้ใช้ระบบ</li>
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
                            <?php include('user_add.php'); ?>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>หน่วยงาน</th>
                                        <th>Username</th>
                                        <th>สถานะ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($db_->select_user_admin($user_login['id_user']) as $item) { ?>
                                        <tr>
                                            <td style="width:2%;"><?= $xi++ ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['name_agency']; ?></td>
                                            <td><?= $item['username']; ?></td>
                                            <td><?= $item['name_role']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php include('user_view.php'); ?>
                                                    <a href="?userDelete=<?= $item['id_user']; ?>" class="btn btn-default deteleData" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#userEdit<?= $item['id_user']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="แก้ไขข้อมูล">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <div class="modal fade" id="userEdit<?= $item['id_user']; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id_user" value="<?= $item['id_user']; ?>">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> แก้ไขข้อมูลผู้ใช้ระบบ</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="mb-3">
                                                                                    <label for="name" class="form-label">ชื่อ-นามสกุล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                                                    <input type="text" value="<?= $item['name'] ?>" name="name" placeholder="ป้อน-ชื่อ-นามสกุล" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="mb-3">
                                                                                    <label for="phone" class="form-label">เบอร์โทรศัพท์ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                                                    <input type="text" maxlength="10" value="<?= $item['phone'] ?>" name="phone" placeholder="ป้อน-เบอร์โทรศัพท์" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="mb-3">
                                                                                    <label for="email" class="form-label">อีเมล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                                                    <input type="email" value="<?= $item['email'] ?>" name="email" placeholder="ป้อน-อีเมล" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="mb-3">
                                                                                    <label for="role" class="form-label">สถานะ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                                                    <select name="role" class="form-control" id="role">
                                                                                        <option value="<?= $item['id_role'] ?>"><?= $item['name_role'] ?></option>
                                                                                        <option value="" disabled>--กรุณาเลือก--</option>
                                                                                        <?php
                                                                                        foreach ($db_->role() as $item2) {
                                                                                            if ($item2['id_role'] != '3') {
                                                                                        ?>
                                                                                                <option value="<?= $item2['id_role']; ?>"><?= $item2['name_role']; ?></option>
                                                                                        <?php }
                                                                                        } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="mb-3">
                                                                                    <label for="agency" class="form-label">หน่วยงาน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                                                    <select name="agency" class="form-control" id="agency">
                                                                                        <option value="<?= $item['id_agency'] ?>"><?= $item['name_agency'] ?></option>
                                                                                        <option value="" disabled>--กรุณาเลือก--</option>
                                                                                        <?php foreach ($db_->agency() as $item2) { ?>
                                                                                            <option value="<?= $item2['id_agency']; ?>"><?= $item2['name_agency']; ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="mb-3">
                                                                                    <label for="id_pos" class="form-label">ตำแหน่ง <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                                                    <select name="id_pos" class="form-control select2" id="id_pos">
                                                                                            <option value="<?= $item['id_pos']; ?>"><?= $item['name_pos']; ?></option>
                                                                                        <option value="" disabled>--กรุณาเลือก--</option>
                                                                                        <?php foreach ($db_->pos() as $item2) { ?>
                                                                                            <option value="<?= $item2['id_pos']; ?>"><?= $item2['name_pos']; ?></option>
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
                                                                                    <input type="text" value="<?= $item['username'] ?>" name="username" class="form-control" placeholder="ป้อน-username">
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" name="datapassword" value="<?= $item['password'] ?>">
                                                                            <div class="col-6">
                                                                                <div class="mb-3">
                                                                                    <label for="password" class="form-label">รหัสผ่าน</label>
                                                                                    <input type="password" name="password" class="form-control" placeholder="ป้อน-รหัสผ่าน">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="mb-3">
                                                                                    <label for="password2" class="form-label">ยืนยันรหัสผ่าน</label>
                                                                                    <input type="password" name="password2" class="form-control" placeholder="ป้อน-ยืนยันรหัสผ่าน">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> ยกเลิก</button>
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
include('user_code.php');
?>