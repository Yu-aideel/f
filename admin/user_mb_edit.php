<?php
include('includes/login_user.php');
include('../includes/includes/head.php');
include('includes/menu.php');

$id = $_GET['id'];
$item = $db_->user_id_user($id)->fetch(PDO::FETCH_ASSOC);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>แก้ไขข้อมูลเจ้าหน้าที่พัฒนาชุมชนตำบล</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลเจ้าหน้าที่พัฒนาชุมชนตำบล</li>
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
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id_user" value="<?= $item['id_user']; ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
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
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">อีเมล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['email'] ?>" name="email" placeholder="ป้อน-อีเมล" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" name="role" value="<?= $item['id_role'] ?>">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="id_pos" class="form-label">ตำแหน่ง <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="id_pos" class="form-control" id="id_pos">
                                                    <option value="<?= $item['id_pos'] ?>"><?= $item['name_pos'] ?></option>
                                                    <option value="" disabled>--กรุณาเลือก--</option>
                                                    <?php foreach ($db_->pos() as $item2) { ?>
                                                        <option value="<?= $item2['id_pos']; ?>"><?= $item2['name_pos']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="id_am" class="form-label">อำเภอ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="id_am" class="form-control select2-1" id="id_am">
                                                    <option value="<?= $item['idam'] ?>"><?= $item['a_name_th'] ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="id_tam" class="form-label">ตำบล <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="id_tam[]" class="form-control select2-1" multiple id="id_tam">
                                                    <?php
                                                    foreach ($db_->user_tam_id($id) as $item3) {
                                                        echo '<option value="' . $item3['idtm'] . '" selected>' . $item3['tm_name_th'] . '</option>';
                                                    }
                                                    foreach ($db_->am_id($item['idam']) as $item2) {
                                                        echo '<option value="' . $item2['idtm'] . '">' . $item2['tm_name_th'] . '</option>';
                                                    }
                                                    ?>
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
                                    <a href="user_mb" class="btn btn-default">
                                        <i class="fa-solid fa-xmark"></i> ปิด
                                    </a>
                                    <button type="submit" name="updateSubmit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include('../includes/includes/script.php');
include('user_mb_code.php');
?>