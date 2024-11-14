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
                    <h1>แบบรายงานภาวะหนี้สินและฐานะการเงิน</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">แบบรายงานภาวะหนี้สินและฐานะการเงิน</li>
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
                    <style>
                        #table {
                            overflow-x: scroll;
                        }
                    </style>

                    <div class="row">
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
                                                <div id="table">
                                                    <table style="text-align: center;" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="3">ที่</th>
                                                                <th rowspan="3">ชื่อหมู่บ้าน <br> กข.คจ.</th>
                                                                <th rowspan="3">หมู่</th>
                                                                <th rowspan="3">ตำบล</th>
                                                                <th rowspan="3">อำเภอ</th>
                                                                <th rowspan="3">จังหวัด</th>
                                                                <th rowspan="3">ประธานคณะกรรมการ <br> กข.คจ. หมู่บ้าน</th>
                                                                <th rowspan="3">เบอร์โทรศัพท์ <br> ประธานคณะกรรมการ <br> กข.คจ. หมู่บ้าน</th>
                                                                <th colspan="3">การจัดระดับการประเมิน ศักยภาพ <br> (กข.คจ.) ตามหลักธรรมาภิบาล</th>
                                                                <th rowspan="3" colspan="2">ตรวจสอบผลรวมจำนวนเงินทุน <br> กข.คจ.ทั้งหมด ก = ข+ค+ง+จ</th>
                                                                <th rowspan="3">จำนวนเงินทุนโครงการ <br> กข.คจ. ทั้งหมด</th>
                                                                <th colspan="2">จำนวนครัวเรือนที่ยืมเงิน</th>
                                                                <th rowspan="3">จำนวนเงินทุน<br>ที่ฝากธนาคาร (บาท)</th>
                                                                <th rowspan="2" colspan="4">ธนาคารที่กองทุนแก้ไขปัญหาความยากจน <br> (กข.คจ.) หมู่บ้านเปิดบัญชี</th>
                                                                <th rowspan="3">เลขบัญชีเงินฝากธนาคาร</th>
                                                                <th rowspan="3">ตรวจสอบจำนวนครัวเรือน<br>ที่ยืมเงินสัมพันธ์กับอาชีพไหม</th>
                                                                <th colspan="5">อาชีพที่ครัวเรือนยืมไปประกอบอาชีพ (ระบุจำนวนครัวเรือน)</th>
                                                                <th colspan="12">จำนวนเงินทุนที่มีปัญหา</th>
                                                                <th colspan="13">จำนวนเงินทุนที่เสียหาย</th>
                                                                <th rowspan="3">หมายเหตุ</th>
                                                            </tr>
                                                            <tr>
                                                                <th>ปรับปรุง</th>
                                                                <th>ปานกลาง</th>
                                                                <th>ดี</th>
                                                                <th rowspan="2">(ครัวเรือน)</th>
                                                                <th rowspan="2">(บาท)</th>
                                                                <th rowspan="2">(1) อุตสาหกรรมในครัวเรือน<br> (ครัวเรือน)</th>
                                                                <th rowspan="2">(2) ค้าขาย<br> (ครัวเรือน)</th>
                                                                <th rowspan="2">(3) งานช่าง<br> (ครัวเรือน)</th>
                                                                <th rowspan="2">(4) เกษตรกรรม<br> (ครัวเรือน)</th>
                                                                <th rowspan="2">(5) อาชีพอื่นๆ<br> (ครัวเรือน)</th>
                                                                <th rowspan="2">(ครัวเรือน)</th>
                                                                <th rowspan="2">(บาท)</th>
                                                                <th colspan="5">สาเหตุที่มีปัญหา</th>
                                                                <th colspan="5">การดำเนินการแก้ไขปัญหา</th>
                                                                <th rowspan="2">(ครัวเรือน)</th>
                                                                <th rowspan="2">(บาท)</th>
                                                                <th colspan="6">สาเหตุที่เสียหาย</th>
                                                                <th colspan="5">การดำเนินการแก้ไขปัญหา</th>
                                                            </tr>
                                                            <tr>
                                                                <th>ระดับ 1</th>
                                                                <th>ระดับ 2</th>
                                                                <th>ระดับ 3</th>
                                                                <th>ธ.ก.ส.</th>
                                                                <th>ออมสิน</th>
                                                                <th>กรุงไทย</th>
                                                                <th>อื่นๆ</th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                                <th>6</th>
                                                                <th>1</th>
                                                                <th>2</th>
                                                                <th>3</th>
                                                                <th>4</th>
                                                                <th>5</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>ส่วนต่าง</td>
                                                                <td>ใช้สูตรรวมช่อง ข+ค+ง+จ</td>
                                                                <td>(ก)</td>
                                                                <td>(ข)</td>
                                                                <td></td>
                                                                <td>(ค)</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>(ง)</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>(จ)</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <?php
                                                            $xiii = 1;
                                                            foreach ($db_->project_report($item['year']) as $item) { ?>
                                                                <tr>
                                                                    <td style="width:2%;"><?= $xiii++ ?></td>
                                                                    <td><?= $item['name_vil'] ?></td>
                                                                    <td><?= ($item['mu_vil'] == '0') ? 'ชุมชน' : $item['mu_vil']; ?></td>
                                                                    <td><?= $item['tm_name_th'] ?></td>
                                                                    <td><?= $item['a_name_th'] ?></td>
                                                                    <td>ยะลา</td>
                                                                    <td><?= $item['name'] ?></td>
                                                                    <td><?= $item['phone'] ?></td>
                                                                    <td><?= ($item['count_all'] < 10 or ($item['count_all'] > 10 and $item['count_lak'] < 7)) ? '1' : '' ?></td>
                                                                    <td><?= ($item['count_all'] >= 10 and $item['count_all'] <= 13 and $item['count_lak'] >= 7) ? '1' : '' ?></td>
                                                                    <td><?= ($item['count_all'] >= 14 and $item['count_all'] <= 18 and $item['count_lak'] >= 9) ? '1' : '' ?></td>
                                                                    <td>-</td>
                                                                    <td><?= $item['cla_11'] ?></td>
                                                                    <td><?= $item['cla_11'] ?></td>
                                                                    <td><?= $item['cla_21'] ?></td>
                                                                    <td><?= $item['cla_12'] ?></td>
                                                                    <td><?= $item['cla_13'] ?></td>
                                                                    <td><?= ($item['cla_1_9'] == 'ธ.ก.ส.') ? '1' : '' ?></td>
                                                                    <td><?= ($item['cla_1_9'] == 'ออมสิน') ? '1' : '' ?></td>
                                                                    <td><?= ($item['cla_1_9'] == 'กรุงไทย') ? '1' : '' ?></td>
                                                                    <td><?= ($item['cla_1_9'] == 'อื่นๆ') ? '1' : '' ?></td>
                                                                    <td><?= $item['cla_2_0'] ?></td>
                                                                    <td><?= $item['cla_2_1'] ?></td>
                                                                    <td><?= $item['cla_2_21'] ?></td>
                                                                    <td><?= $item['cla_2_22'] ?></td>
                                                                    <td><?= $item['cla_2_23'] ?></td>
                                                                    <td><?= $item['cla_2_24'] ?></td>
                                                                    <td><?= $item['cla_2_25'] ?></td>
                                                                    <td><?= $item['cla_2_5'] ?></td>
                                                                    <td><?= $item['cla_14'] ?></td>
                                                                    <td><?= $item['cla_2_311'] ?></td>
                                                                    <td><?= $item['cla_2_312'] ?></td>
                                                                    <td><?= $item['cla_2_313'] ?></td>
                                                                    <td><?= $item['cla_2_314'] ?></td>
                                                                    <td><?= $item['cla_2_315'] ?></td>
                                                                    <td><?= $item['cla_2_321'] ?></td>
                                                                    <td><?= $item['cla_2_322'] ?></td>
                                                                    <td><?= $item['cla_2_323'] ?></td>
                                                                    <td><?= $item['cla_2_324'] ?></td>
                                                                    <td><?= $item['cla_2_325'] ?></td>
                                                                    <td><?= $item['cla_2_6'] ?></td>
                                                                    <td><?= $item['cla_15'] ?></td>
                                                                    <td><?= $item['cla_2_411'] ?></td>
                                                                    <td><?= $item['cla_2_412'] ?></td>
                                                                    <td><?= $item['cla_2_413'] ?></td>
                                                                    <td><?= $item['cla_2_414'] ?></td>
                                                                    <td><?= $item['cla_2_415'] ?></td>
                                                                    <td><?= $item['cla_2_416'] ?></td>
                                                                    <td><?= $item['cla_2_421'] ?></td>
                                                                    <td><?= $item['cla_2_422'] ?></td>
                                                                    <td><?= $item['cla_2_423'] ?></td>
                                                                    <td><?= $item['cla_2_424'] ?></td>
                                                                    <td><?= $item['cla_2_425'] ?></td>
                                                                    <td><?= $item['note'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
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