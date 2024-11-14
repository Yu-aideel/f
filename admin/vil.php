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
                    <h1>ข้อมูลหมู่บ้าน/ชุมชน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ข้อมูลหมู่บ้าน/ชุมชน</li>
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
                            <?php 
                            include('vil_add.php'); 
                            include('vil_up_add.php'); 
                            ?>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อหมู่บ้าน/ชุมชน</th>
                                        <th>หมู่ที่</th>
                                        <th>ตำบล</th>
                                        <th>อำเภอ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($db_->select_vil() as $item) { ?>
                                        <tr>
                                            <td style="width:2%;"><?= $xi++ ?></td>
                                            <td><?= $item['name_vil']; ?></td>
                                            <td><?= ($item['mu_vil'] == '0') ? 'ชุมชน' : $item['mu_vil']; ?></td>
                                            <td><?= $item['tm_name_th']; ?></td>
                                            <td><?= $item['a_name_th']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="?Delete=<?= $item['id_vil']; ?>" class="btn btn-default deteleData" data-bs-toggle="tooltip" data-bs-placement="top" title="ลบข้อมูล">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                    <a href="vil_edit?id=<?= $item['id_vil']; ?>" class="btn btn-default">
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
include('vil_code.php');
?>