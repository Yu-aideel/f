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
                    <h1>ข้อมูลตัวชี้วัด</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลตัวชี้วัด</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        ชื่อโครงการ : <?= $project['name_pro'] ?>
                    </div>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <?php
                                foreach ($db_->year() as $key => $for) {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?= ($key == 0) ? 'active' : '' ?>" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home<?= $key ?>" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                                            ปี <?= $for['year'] ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <?php
                                foreach ($db_->year() as $key2 => $item) {
                                ?>
                                    <div class="tab-pane fade <?= ($key2 == 0) ? 'active show' : '' ?>" id="custom-tabs-four-home<?= $key2 ?>" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <table class="table table-bordered table-striped display">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อหมู่บ้าน กข.คจ.</th>
                                                    <th>หมู่</th>
                                                    <th>ตำบล</th>
                                                    <th>อำเภอ</th>
                                                    <th>จังหวัด</th>
                                                    <th style="width: 5%;">จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $xiu = 1;
                                                foreach ($db_->project_vil_id_2($item['year']) as $item) { ?>
                                                    <tr>
                                                        <td style="width:2%;"><?= $xiu++ ?></td>
                                                        <td><?= $item['name_vil'] ?></td>
                                                        <td><?= ($item['mu_vil'] == '0') ? 'ชุมชน' : $item['mu_vil']; ?></td>
                                                        <td><?= $item['tm_name_th'] ?></td>
                                                        <td><?= $item['a_name_th'] ?></td>
                                                        <td>ยะลา</td>
                                                        <td>
                                                            <a href="project_view?id=<?= $item['id_provil']; ?>" class="btn btn-default" data-bs-toggle="tooltip" data-bs-placement="top" title="ดูตัวชี้วัด">
                                                                <i class="fa-solid fa-magnifying-glass"></i> ดูตัวชี้วัด
                                                            </a>
                                                            <a href="?delete=<?= $item['id_provil']; ?>" class="btn btn-default deteleData" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล">
                                                                <i class="fa-solid fa-trash"></i> ลบข้อมูล
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card -->
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