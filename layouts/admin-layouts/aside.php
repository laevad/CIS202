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
                <li class="nav-item">
                    <a type="button" class="nav-link <?php echo getCurrentPage() == '/admin/profile.php' ? 'active active-btn-color' : '' ?>"  href="<?php echo url_for('admin/profile.php') ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
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
