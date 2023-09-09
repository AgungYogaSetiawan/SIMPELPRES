<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../dashboard.php">
                <div class="sidebar-brand-icon">
                    <i><img src="../../img/logo_pemko_bjm2.png" style="width: 42px;"></i>
                </div>
                <div class="sidebar-brand-text mx-1">SIMPELPRES</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../../dashboard.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <?php if($_SESSION['status'] == 'administrator'){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="../../data_master/data_akun/data_akun.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manajemen Akun</span></a>
            </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if($_SESSION['status'] !== 'pegawai') {?>
            <div class="sidebar-heading">
                Master
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../data_master/data_kecamatan.php">Data Kecamatan</a>
                        <a class="collapse-item" href="../../data_master/data_kelurahan.php">Data Kelurahan</a>
                        <a class="collapse-item" href="../../data_master/data_hasil/data_hasil.php">Data Hasil</a>
                        <a class="collapse-item" href="../../data_master/data_gizi_anak/data_gizi_anak.php">Data Gizi Anak</a>
                        <a class="collapse-item" href="../../data_master/data_status_kehamilan/data_status_hamil.php">Data Status Kehamilan</a>
                        <a class="collapse-item" href="../../data_master/data_bumil/data_bumil.php">Data Ibu Hamil</a>
                        <a class="collapse-item" href="../../data_master/data_batita/data_batita.php">Data Anak 0-2 Tahun</a>
                        <a class="collapse-item" href="../../data_master/data_balita/data_balita.php">Data Anak >2-6 Tahun</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <div class="sidebar-heading">
                Proses
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsekpm"
                    aria-expanded="true" aria-controls="collapsekpm">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan KPM</span>
                </a>
                <div id="collapsekpm" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../formulir/formulir2A/formulir2A.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Ibu Hamil">Data Laporan 2.A</a>
                        <a class="collapse-item" href="../../formulir/formulir2B/formulir2B.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Anak 0-2 Tahun">Data Laporan 2.B</a>
                        <a class="collapse-item" href="../../formulir/formulir2C/formulir2C.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun">Data Laporan 2.C</a>
                        <a class="collapse-item" href="../../formulir/formulir3A/formulir3A.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Bagi Ibu Hamil">Data Laporan 3.A</a>
                        <a class="collapse-item" href="../../formulir/formulir3B/formulir3B.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Tiga Bulanan Bagi Anak 0-2 Tahun">Data Laporan 3.B</a>
                        <a class="collapse-item" href="../../formulir/formulir4/formulir4.php" data-toggle="tooltip" data-placement="top" title="Data Konvergensi 1000 HPK">Data Laporan 4</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Berkas Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../formulir/formulir_bcpl/formulir_bcpl.php" data-toggle="tooltip" data-placement="top" title="Data Bantuan Capaian Penerima Layanan">Data Laporan BCPL</a>
                        <a class="collapse-item" href="../../formulir/formulir_status_gizi/formulir_status_gizi.php" data-toggle="tooltip" data-placement="top">Data Laporan Status Gizi <br>Anak</a>
                        <a class="collapse-item" href="../../formulir/formulir_prediksi/formulir_prediksi.php" data-toggle="tooltip" data-placement="top">Data Laporan Prediksi <br>Stunting</a>
                        <a class="collapse-item" href="../../formulir/formulir_rekomen/formulir_rekomen.php" data-toggle="tooltip" data-placement="top">Data Laporan Rekomendasi <br>Intervensi</a>
                        <a class="collapse-item" href="../../formulir/formulir_progjer/formulir_progjer.php" data-toggle="tooltip" data-placement="top">Data Laporan Program <br>Kerja Tahunan</a>
                        <a class="collapse-item" href="../../formulir/grafik_gizi/grafik_gizi.php" data-toggle="tooltip" data-placement="top">Grafik Status Gizi Anak</a>
                        <a class="collapse-item" href="../../formulir/grafik_gizi/grafik_prediksi.php" data-toggle="tooltip" data-placement="top">Grafik Status Hasil<br> Prediksi Stunting</a>
                        <a class="collapse-item" href="../../formulir/grafik_gizi/grafik_peringkat.php" data-toggle="tooltip" data-placement="top">Grafik Status Gizi <br> Tertinggi dan Terendah</a>
                    </div>
                </div>
            </li>

            <div class="sidebar-heading">
                Laporan
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Laporan</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2a.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Ibu Hamil">Cetak Laporan 2.A</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2b.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Bulanan Anak 0-2 Tahun">Cetak Laporan 2.B</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan2c.php" data-toggle="tooltip" data-placement="top" title="Data Pemantauan Layanan dan Sasaran Paud Anak >2-6 Tahun">Cetak Laporan 2.C</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan3a.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Hasil Pemantauan Tiga Bulanan Bagi Ibu Hamil">Cetak Laporan 3.A</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan3b.php" data-toggle="tooltip" data-placement="top" title="Data Rekapitulasi Tiga Bulanan Bagi Anak 0-2 Tahun">Cetak Laporan 3.B</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan4.php" data-toggle="tooltip" data-placement="top" title="Data Konvergensi 1000 HPK">Cetak Laporan 4</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_bcpl.php" data-toggle="tooltip" data-placement="top" title="Data Bantuan Capaian Penerima Layanan">Cetak Laporan BCPL</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_stat_gizi.php" data-toggle="tooltip" data-placement="top">Cetak Laporan Status Gizi <br>Anak</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_prediksi.php" data-toggle="tooltip" data-placement="top">Cetak Laporan Prediksi <br>Stunting</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_rekomendasi.php" data-toggle="tooltip" data-placement="top">Cetak Laporan Rekomendasi <br>Intervensi</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_progjer.php" data-toggle="tooltip" data-placement="top">Cetak Laporan Program <br>Kerja Tahunan</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_grafik_status.php" data-toggle="tooltip" data-placement="top">Cetak Laporan Grafik Status <br>Gizi Anak</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_grafik_prediksi.php" data-toggle="tooltip" data-placement="top">Cetak Laporan Grafik Hasil <br>Prediksi Stunting</a>
                        <a class="collapse-item" href="../../cetak_laporan/cetak_laporan_grafik_peringkat.php" data-toggle="tooltip" data-placement="top">Cetak Laporan Grafik<br> Status Gizi Tertinggi<br>dan Terendah</a>
                    </div>
                </div>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->