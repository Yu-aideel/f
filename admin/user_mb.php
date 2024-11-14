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
                    <h1>ข้อมูลเจ้าหน้าที่พัฒนาชุมชนตำบล</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลเจ้าหน้าที่พัฒนาชุมชนตำบล</li>
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
                            <?php include('user_mb_add.php'); ?>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>อำเภอ</th>
                                        <th>ตำบล</th>
                                        <th>Username</th>
                                        <th>สถานะ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($db_->select_user_mb() as $item) { ?>
                                        <tr>
                                            <td style="width:2%;"><?= $xi++ ?></td>
                                            <td><?= $item['name']; ?></td>
                                            <td><?= $item['name_pos']; ?></td>
                                            <td><?= $item['a_name_th']; ?></td>
                                            <td>
                                                <ol>

                                                    <?php
                                                    foreach ($db_->user_tam_id_user($item['id_user']) as $key => $for) {
                                                        echo '<li>' . $for['tm_name_th'] . '</li>';
                                                    }
                                                    ?>

                                                </ol>
                                            </td>
                                            <td><?= $item['username']; ?></td>
                                            <td><?= $item['name_role']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php include('user_view.php'); ?>
                                                    <a href="?userDelete=<?= $item['id_user']; ?>" class="btn btn-default deteleData" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                    <a href="user_mb_edit?id=<?= $item['id_user']; ?>" class="btn btn-default">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
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
include('user_mb_code.php');
?>