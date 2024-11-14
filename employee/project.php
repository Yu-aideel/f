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
                    <h1>หมู่บ้านที่เกี่ยวข้องกับโครงการ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">หมู่บ้านที่เกี่ยวข้องกับโครงการ</li>
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
                            ชื่อโครงการ : <?= $project['name_pro'] ?>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <?php include('project_add.php'); ?>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ปี</th>
                                        <th>ชื่อหมู่บ้าน กข.คจ.</th>
                                        <th>หมู่</th>
                                        <th>ตำบล</th>
                                        <th>อำเภอ</th>
                                        <th>จังหวัด</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($db_->project_vil() as $item) { ?>
                                        <tr>
                                            <td style="width:2%;"><?= $xi++ ?></td>
                                            <td><?= $item['year'] ?></td>
                                            <td><?= $item['name_vil'] ?></td>
                                            <td><?= ($item['mu_vil'] == '0') ? 'ชุมชน' : $item['mu_vil']; ?></td>
                                            <td><?= $item['tm_name_th'] ?></td>
                                            <td><?= $item['a_name_th'] ?></td>
                                            <td>ยะลา</td>
                                            <td>
                                                <a href="?Delete=<?= $item['id_provil']; ?>" class="btn btn-default deteleData" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
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
include('project_code.php');
?>