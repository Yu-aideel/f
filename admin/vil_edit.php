<?php
include('includes/login_user.php');
include('../includes/includes/head.php');
include('includes/menu.php');

$id_vil = $_GET['id'];
$fet_vil = $db_->select_where_vil($id_vil)->fetch(PDO::FETCH_ASSOC);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>แก้ไขข้อมูลหมู่บ้าน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลหมู่บ้าน</li>
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
                            <a href="vil" class="btn btn-default">ย้อนกลับ</a>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" value="<?= $fet_vil['id_vil'] ?>" name="id_vil">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="name_vil" class="form-label">ชื่อหมู่บ้าน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" required value="<?= $fet_vil['name_vil'] ?>" name="name_vil" placeholder="ป้อน-ชื่อหมู่บ้าน" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="mu_vil" class="form-label">หมู่ที่ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="number" required value="<?= $fet_vil['mu_vil'] ?>" name="mu_vil" placeholder="ป้อน-หมู่ที่" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="am_vil" class="form-label">อำเภอ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="am_vil" id="am_vil" required class="form-control select2">
                                                    <option value="<?= $fet_vil['idam'] ?>"><?= $fet_vil['a_name_th'] ?></option>
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
                                                    <option value="<?= $fet_vil['idtm'] ?>"><?= $fet_vil['tm_name_th'] ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" name="editSubmit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> บันทึก</button>
                                    </div>
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
include('vil_code.php');
?>