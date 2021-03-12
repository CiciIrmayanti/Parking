<div class="navbar-container main-menu-content navbar-shadow" data-menu="menu-container">
    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="active nav-item">
            <a><i class="feather icon-home"></i><span data-i18n="Dashboard">Beranda</span></a>

        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                <i class="feather icon-package"></i><span data-i18n="Apps">Master Data</span></a>
            <ul class="dropdown-menu">
                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Master_data/lokasi'); ?>" data-toggle="dropdown" data-i18n="Email">
                        <i class="feather icon-map-pin"></i>Lokasi</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Master_data/perangkat'); ?>" data-toggle="dropdown" data-i18n="Chat">
                        <i class="feather icon-message-square"></i>Perangkat</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Master_data/jenis_kendaraan'); ?>" data-toggle="dropdown" data-i18n="Todo">
                        <i class="feather icon-truck"></i>Jenis Kendaraan</a>
                </li>

                <!-- <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Master_data/akses_kendaraan'); ?>" data-toggle="dropdown" data-i18n="Calender">
                        <i class="feather icon-truck"></i>Akses Kendaraan</a>
                </li> -->

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Master_data/produk_parkir'); ?>" data-toggle="dropdown" data-i18n="Calender">
                        <i class="feather icon-calendar"></i>Produk Parkir</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Master_data/tarif_parkir'); ?>" data-toggle="dropdown" data-i18n="Calender">
                        <i class="feather icon-calendar"></i>Tarif Parkir</a>
                </li>

            </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                <i class="feather icon-sliders"></i><span data-i18n="UI Elements">Konfigurasi</span></a>
            <ul class="dropdown-menu">

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Konfigurasi/parameter'); ?>" data-toggle="dropdown" data-i18n="Colors">
                        <i class="feather icon-droplet"></i>Parameter</a>
                </li>

                 <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Konfigurasi/hak_akses'); ?>" data-toggle="dropdown" data-i18n="Colors">
                        <i class="feather icon-droplet"></i>Hak Akses</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Konfigurasi/info_nopol'); ?>" data-toggle="dropdown" data-i18n="Colors">
                        <i class="feather icon-credit-card"></i>Info Nomor Polisi</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Konfigurasi/jam_shift'); ?>" data-toggle="dropdown" data-i18n="Colors">
                        <i class="feather icon-clock"></i>Jam Shift</a>
                </li>

            </ul>
        </li>

        <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                <i class="feather icon-users"></i><span data-i18n="Forms &amp; Tables">Member Area</span></a>
            <ul class="dropdown-menu">


                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Member/arsip_member'); ?>" data-toggle="dropdown" data-i18n="Chat">
                        <i class="feather icon-user"></i>Arsip Member</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Voucher/voucher'); ?>" data-toggle="dropdown" data-i18n="Todo">
                        <i class="feather icon-percent"></i>Voucher</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Member/guest_periode'); ?>" data-toggle="dropdown" data-i18n="Calender">
                        <i class="feather icon-user"></i>Guest Periode</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Member/kartu_parkir'); ?>" data-toggle="dropdown" data-i18n="Calender">
                        <i class="feather icon-credit-card"></i>Kartu Parkir</a>
                </li>

            </ul>
        </li>

        <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                <i class="feather icon-file"></i><span data-i18n="Pages">Transaksi</span></a>
            <ul class="dropdown-menu">

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Transaksi/manual_pk'); ?>" data-toggle="dropdown" data-i18n="Profile">
                        <i class="feather icon-user"></i>Manual PK</a>
                </li>

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('Transaksi/manual_murni'); ?>" data-toggle="dropdown" data-i18n="FAQ">
                        <i class="feather icon-help-circle"></i>Manual Murni</a>
                </li>

            </ul>
        </li>

          <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                <i class="feather icon-sliders"></i><span data-i18n="UI Elements">Laporan</span></a>
            <ul class="dropdown-menu">

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('laporan/laporan_keuangan'); ?>" data-toggle="dropdown" data-i18n="Colors">
                        <i class="feather icon-droplet"></i>Laporan Keuangan</a>
                </li>

            </ul>
        </li>

        <li class="dropdown nav-item" data-menu="dropdown">
            <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                <i class="feather icon-more-horizontal"></i><span data-i18n="Others">Others</span></a>
            <ul class="dropdown-menu">
                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('history/in_area'); ?>" data-toggle="dropdown" data-i18n="FAQ">
                        <i class="feather icon-help-circle"></i>In Area</a>
                </li>
                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('history/informasi_parkir'); ?>" data-toggle="dropdown" data-i18n="FAQ">
                        <i class="feather icon-help-circle"></i>Informasi Parkir</a>
                </li>
              
                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('history/histori_tarif_parkir'); ?>" data-toggle="dropdown" data-i18n="FAQ">
                        <i class="feather icon-help-circle"></i>Histori Tarif Parkir</a>
                </li>
                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('history/history_login'); ?>" data-toggle="dropdown" data-i18n="FAQ">
                        <i class="feather icon-help-circle"></i>Histori Login</a>
                </li>
               

                <li data-menu="">
                    <a class="dropdown-item" href="<?php echo base_url('secure/logout'); ?>" data-toggle="dropdown" data-i18n="Raise Support">
                        <i class="feather icon-life-buoy"></i>Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</div>