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
                    <h1>ข้อมูลส่วนตัว</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
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
                        <form action="" method="post">
                            <input type="hidden" name="id_user" value="<?= $user_login['id_user'] ?>">
                            <div class="card-body">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">ชื่อ-นามสกุล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $user_login['name'] ?>" name="name" placeholder="ป้อน-ชื่อ-นามสกุล" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">เบอร์โทรศัพท์ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" maxlength="10" value="<?= $user_login['phone'] ?>" name="phone" placeholder="ป้อน-เบอร์โทรศัพท์" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">อีเมล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="email" value="<?= $user_login['email'] ?>" name="email" placeholder="ป้อน-อีเมล" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6" hidden>
                                            <div class="mb-3">
                                                <label for="role" class="form-label">สถานะ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="role" class="form-control" id="role">
                                                    <option value="<?= $user_login['id_role'] ?>"><?= $user_login['name_role'] ?></option>
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
                                                    <option value="<?= $user_login['id_agency'] ?>"><?= $user_login['name_agency'] ?></option>
                                                    <option value="" disabled>--กรุณาเลือก--</option>
                                                    <?php foreach ($db_->agency() as $item2) { ?>
                                                        <option value="<?= $item2['id_agency']; ?>"><?= $item2['name_agency']; ?></option>
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
                                                <input type="text" value="<?= $user_login['username'] ?>" name="username" class="form-control" placeholder="ป้อน-username">
                                            </div>
                                        </div>
                                        <input type="hidden" name="datapassword" value="<?= $user_login['password'] ?>">
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
                                <div class="modal-footer justify-content-end">
                                    <button type="submit" name="updateSubmit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include('../includes/includes/script.php');
include('profile_code.php');
?>