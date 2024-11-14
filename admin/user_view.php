<button type="button" class="btn btn-default" data-toggle="modal" data-target="#userView<?= $item['id_user']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="รายละเอียด">
    <i class="fa-solid fa-eye"></i>
</button>
<div class="modal fade" id="userView<?= $item['id_user']; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa-solid fa-file-pen"></i> รายละเอียดข้อมูลผู้ใช้ระบบ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="dataTable" class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>หัวข้อ</th>
                            <th>รายละเอียด</th>
                        </tr>
                        <tr>
                            <td>ชื่อ-นามสกุล</td>
                            <td><?= $item['name']; ?></td>
                        </tr>
                        <tr>
                            <td>เบอร์โทรศัพท์</td>
                            <td><?= $item['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>อีเมล</td>
                            <td><?= $item['email']; ?></td>
                        </tr>
                        <tr>
                            <td>ตำแหน่ง</td>
                            <td><?= $item['name_pos']; ?></td>
                        </tr>
                        <?php if ($item['role'] == '1' or $item['role'] == '2') { ?>
                            <tr>
                                <td>หน่วยงาน</td>
                                <td><?= $item['name_agency']; ?></td>
                            </tr>
                        <?php
                        }
                        if ($item['role'] == '3') { ?>
                            <tr>
                                <td>ตำบล</td>
                                <td>
                                    <ol>
                                        <?php
                                        foreach ($db_->user_tam_id_user($item['id_user']) as $key => $for) {
                                            echo '<li>' . $for['tm_name_th'] . '</li>';
                                        }
                                        ?>
                                    </ol>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>Usernmae</td>
                            <td><?= $item['username']; ?></td>
                        </tr>
                        <tr>
                            <td>สถานะ</td>
                            <td><?= $item['name_role']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> ยกเลิก</button>
            </div>
        </div>
    </div>
</div>