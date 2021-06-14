<ul id="sidebarnav">
    <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?php echo base_url()?>assets/images/user.png" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo strtoupper($this->session->userdata('nama')); ?></span></a>
        <ul aria-expanded="false" class="collapse">
            <li><a href="<?php echo base_url()?>main/logout"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
    </li>
    <li class="nav-small-cap">--- Main</li>
    <li> <a class="waves-effect waves-dark" href="<?php echo base_url()?>main" aria-expanded="false"><i class="ti-home"></i><span class="hide-menu">Dashboard</span></a></li>

    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Manage</span></a>
        <ul aria-expanded="false" class="collapse">
            <li><a href="<?php echo base_url()?>manage/">Daftar Peralatan</a></li>
            <li><a href="<?php echo base_url()?>manage/create">Input Peralatan</a></li>
            <li><a href="<?php echo base_url()?>manage/kategori">Kategori</a></li>
            <li><a href="<?php echo base_url()?>manage/sub_kategori">Sub Kategori</a></li>
        </ul>
    </li>

    <li class="nav-small-cap">--- Report</li>
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Report</span></a>
        <ul aria-expanded="false" class="collapse">
            <li><a href="<?php echo base_url()?>laporan/">Laporan</a></li>
            <!-- <li><a href="<?php echo base_url()?>laporan/recap">Recap</a></li> -->
            <li><a href="javascript:void(0)" class="has-arrow">Recap</a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="<?php echo base_url()?>laporan/laporan_peralatan">Laporan Peralatan</a></li>
                    <li><a href="<?php echo base_url()?>laporan/laporan_kondisi">Laporan Kondisi</a></li>
                    <li><a href="<?php echo base_url()?>laporan/laporan_bulanan">Laporan Bulanan</a></li>
                </ul>
            </li>
        </ul>
    </li>
  
</ul>