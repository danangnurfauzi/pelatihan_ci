<div class="sidebar-nav">
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Menu</a>
    <ul id="dashboard-menu" class="nav nav-list collapse in">
        <li <?php if ($title == 'dashboard') { echo "class='active'";} else { echo'';} ?>><a href="<?php echo site_url('welcome'); ?>">Home</a></li>
        <li <?php if ($title == 'Form User') { echo "class='active'";} else { echo'';} ?>><a href="<?php echo site_url('welcome/form_user'); ?>">Tambah Karyawan</a></li>
        <li <?php if (($title == 'Input Jabatan') || ($title == 'Edit Jabatan')) { echo "class='active'";} else { echo'';} ?>><a href="<?php echo site_url('welcome/input_jabatan'); ?>">Tambah Jabatan</a></li>        
    </ul>
</div>