<?php
include('includes/login_user.php');
include('../includes/includes/head.php');
include('includes/menu.php');

$id_pro = $_GET['id'];
$item = $db_->select_where_project($id_pro)->fetch(PDO::FETCH_ASSOC);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>แก้ไขข้อมูลโครงการ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลโครงการ</li>
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
                            <a href="project" class="btn btn-default">
                                <i class="fa-solid fa-arrow-rotate-left"></i>
                                ย้อนกลับ</a>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id_pro" value="<?= $item['id_pro']; ?>">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="name_pro" class="form-label">ชื่อโครงการ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['name_pro']; ?>" required name="name_pro" placeholder="ป้อน-ชื่อโครงการ" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label for="type_pro" class="form-label">ประเภทโครงการ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="type_pro" required class="form-control select2">
                                                    <option value="<?= $item['id_type']; ?>"><?= $item['name_type']; ?></option>
                                                    <?php foreach ($db_->type() as $item2) { ?>
                                                        <option value="<?= $item2['id_type']; ?>"><?= $item2['name_type']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="plan_pro" class="form-label">แผนงาน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['plan_pro']; ?>" required name="plan_pro" placeholder="ป้อน-แผนงาน" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="p_pro" class="form-label">ผลผลิต <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['p_pro']; ?>" required name="p_pro" placeholder="ป้อน-ผลผลิต" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="pan_pro" class="form-label">พันธกิจ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['pan_pro']; ?>" required name="pan_pro" placeholder="ป้อน-พันธกิจ" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="pra_pro" class="form-label">ประเด็นยุทธศาสตร์ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['pra_pro']; ?>" required name="pra_pro" placeholder="ป้อน-ประเด็นยุทธศาสตร์" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="kol_pro" class="form-label">กลยุทธ์ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['kol_pro']; ?>" required name="kol_pro" placeholder="ป้อน-กลยุทธ์" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="cna_pro" class="form-label">คณะ/สถาบัน/สำนัก <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['cna_pro']; ?>" required name="cna_pro" placeholder="ป้อน-คณะ/สถาบัน/สำนัก" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="kong_pro" class="form-label">กอง <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['kong_pro']; ?>" required name="kong_pro" placeholder="ป้อน-กอง" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="userh_pro" class="form-label">ผู้รับผิดชอบหลัก <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['userh_pro']; ?>" required name="userh_pro" placeholder="ป้อน-ผู้รับผิดชอบหลัก" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="prite_pro" class="form-label">งบประมาณ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['prite_pro']; ?>" value="<?= $item['prite_pro']; ?>" required name="prite_pro" placeholder="ป้อน-ชื่อโครงการ" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="user_pro" style="height: 150px;" placeholder="Leave a comment here" id="floatingTextarea"><?= $item['user_pro']; ?></textarea>
                                                    <label for="floatingTextarea">ผู้รับผิดชอบ</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="lag_pro" style="height: 150px;" placeholder="Leave a comment here" id="floatingTextarea"><?= $item['lag_pro']; ?></textarea>
                                                    <label for="floatingTextarea">หลักการและเหตุผล</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="obj_pro" style="height: 150px;" placeholder="Leave a comment here" id="floatingTextarea"><?= $item['obj_pro']; ?></textarea>
                                                    <label for="floatingTextarea">วัตถุประสงค์</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="paom_pro" style="height: 150px;" placeholder="Leave a comment here" id="floatingTextarea"><?= $item['paom_pro']; ?></textarea>
                                                    <label for="floatingTextarea">เป้าหมายเชิงปริมาณ</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="paon_pro" style="height: 150px;" placeholder="Leave a comment here" id="floatingTextarea"><?= $item['paon_pro']; ?></textarea>
                                                    <label for="floatingTextarea">เป้าหมายเชิงคุณภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="start_pro" class="form-label">วันที่ดำเนินการ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['start_pro']; ?>" required readonly name="start_pro" id="start_pro" placeholder="เลือก-วันที่ดำเนินการ" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="end_pro" class="form-label">วันที่สิ้นสุด <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <input type="text" value="<?= $item['end_pro']; ?>" required readonly name="end_pro" id="end_pro" placeholder="เลือก-วันที่สิ้นสุด" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="agency_id" class="form-label">หน่วยงานที่รับผิดชอบ <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="agency_id" required class="form-control select2">
                                                    <option value="<?= $item['id_agency']; ?>" disabled><?= $item['name_agency']; ?></option>
                                                    <?php foreach ($db_->agency() as $item2) { ?>
                                                        <option value="<?= $item2['id_agency']; ?>"><?= $item2['name_agency']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="id_tam" class="form-label">หมู่บ้าน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="id_tam[]" required class="form-control select2" multiple>
                                                    <?php foreach ($db_->protam_id($item['id_pro']) as $provil) { ?>
                                                        <option value="<?= $provil['idtm']; ?>" selected><?= $provil['tm_name_th']; ?></option>
                                                    <?php  }
                                                    foreach ($db_->tam() as $item2) { ?>
                                                        <option value="<?= $item2['idtm']; ?>"><?= $item2['tm_name_th']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="id_vil" class="form-label">ชื่อหมู่บ้าน/ชุมชน <i class="fa-solid fa-asterisk text-danger"></i></label>
                                                <select name="id_vil[]" required class="form-control select2" multiple>
                                                    <?php foreach ($db_->provil_id($item['id_pro']) as $provil) { ?>
                                                        <option value="<?= $provil['id_vil']; ?>" selected><?= $provil['name_vil']; ?></option>
                                                    <?php  }
                                                    foreach ($db_->select_vil() as $item2) { ?>
                                                        <option value="<?= $item2['id_vil']; ?>"><?= $item2['name_vil']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer  justify-content-end">
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
include('project_code.php');
?>