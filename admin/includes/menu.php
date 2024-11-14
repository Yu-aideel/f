<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="index" class="nav-link <?= ($PHP_SELF == 'index.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    หน้าหลัก
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="user" class="nav-link <?= ($PHP_SELF == 'user.php') ? 'active' : ''; ?>">
                <i class="nav-icon fa-solid fa-users"></i>
                <p>
                    ผู้ใช้ระบบ
                </p>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="user_jb" class="nav-link <?= ($PHP_SELF == 'user_jb.php') ? 'active' : ''; ?>">
                <i class="nav-icon fa-solid fa-user-secret"></i>
                <p>
                    ผู้รับผิดชอบโครงการ
                </p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="user_jb_ty" class="nav-link <?= ($PHP_SELF == 'user_jb_ty.php') ? 'active' : ''; ?>">
                <i class="nav-icon fa-solid fa-briefcase"></i>
                <p>
                    หน่วยงานผู้รับผิดชอบ
                </p>
            </a>
        </li> -->

        <li class="nav-item menu-open">
            <a href="" class="nav-link">
                <i class="nav-icon fa-solid fa-users-line"></i>
                <p>
                    จน.พัฒนาชุมชนตำบล
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="user_mb" class="nav-link <?= ($PHP_SELF == 'user_mb.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fa-solid fa-angles-right"></i>
                        <p>
                            จน.พัฒนาชุมชนตำบล
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="vil" class="nav-link <?= ($PHP_SELF == 'vil.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fa-solid fa-angles-right"></i>
                        <p>
                            หมู่บ้าน/ชุมชน
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="position" class="nav-link <?= ($PHP_SELF == 'position.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fa-solid fa-angles-right"></i>
                        <p>
                            ตำแหน่ง
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item menu-open">
            <a href="" class="nav-link">
                <i class="nav-icon fa-solid fa-house-user"></i>
                <p>
                    จัดการข้อมูลพื้นฐาน
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="user_agency" class="nav-link <?= ($PHP_SELF == 'user_agency.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fa-solid fa-angles-right"></i>
                        <p>
                            หน่วยงาน
                        </p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
</div>
<div class="sidebar-custom">
    <a href="../login/logout" class="btn btn-link logout"><i class="fa-solid fa-right-from-bracket"></i></a>
</div>
</aside>