<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo url_for('admin/')?>" class="brand-link">
        <img src="<?php echo url_for('assets/img/logo.png')?>"  alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .9">
        <span class="brand-text font-weight-light">Administrator</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo url_for('admin/')?>" class="nav-link <?php echo getCurrentPage() == '/admin/index.php' ? 'active active-btn-color' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a type="button" class="nav-link "  href="#">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Faculty</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo url_for('admin/profile.php') ?>" class="nav-link <?php echo getCurrentPage() == '/admin/profile.php' ? 'active active-btn-color' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="text-white">Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo url_for('admin/add-faculty.php') ?>" class="nav-link <?php echo getCurrentPage() == '/admin/add-faculty.php' ? 'active active-btn-color' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="text-white">Add Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a type="button" class="nav-link"  href="<?php echo url_for('logout.php')?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
