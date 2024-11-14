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
            <a href="profile" class="nav-link <?= ($PHP_SELF == 'profile.php') ? 'active' : ''; ?>">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>
                    ข้อมูลส่วนตัว
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="project" class="nav-link <?= ($PHP_SELF == 'project.php') ? 'active' : ''; ?>">
                <i class="nav-icon fa-solid fa-file-lines"></i>
                <p>
                    หมู่บ้านของโครงการ
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="vd" class="nav-link <?= ($PHP_SELF == 'vd.php') ? 'active' : ''; ?>">
                <i class="nav-icon fa-solid fa-file-shield"></i>
                <p>
                    ข้อมูลตัวชี้วัด
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="report" class="nav-link <?= ($PHP_SELF == 'report.php') ? 'active' : ''; ?>">
                <i class="nav-icon fa-solid fa-chart-simple"></i>
                <p>
                    แบบรายงาน
                </p>
            </a>
        </li>
    </ul>
</nav>
</div>
<div class="sidebar-custom">
    <a href="../login/logout" class="btn btn-link logout"><i class="fa-solid fa-right-from-bracket"></i></a>
</div>
</aside>