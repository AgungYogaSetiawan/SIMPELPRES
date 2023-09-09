<?php
if($stat == 'pegawai' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'pegawai') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemeriksaan_kehamilan='Y'");
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemeriksaan_kehamilan='Y' AND b.kelurahan='$kel'");
                                                    }
                                                    $exe = mysqli_fetch_array($query);
                                                    echo $exe[0];






if($stat == 'pegawai' && isset($_POST['cari'])){
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kelurahan' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'pegawai') {
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE c.pemeriksaan_kehamilan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB)");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm' && isset($_POST['cari'])) {
                                                        $tahun = trim($_POST['tahun']);
                                                        $kelurahan = trim($_POST['kelurahan']);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y' AND b.tahun='$tahun'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND b.tahun='$tahun'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    } else if($stat == 'kpm'){
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel' AND c.pemeriksaan_kehamilan='Y'");
                                                        $exe = mysqli_fetch_array($query);
                                                        $query = mysqli_query($konek, "SELECT COUNT(c.pemeriksaan_kehamilan) FROM ((tb_formulir3b a INNER JOIN tb_baduta b ON a.id_baduta=b.id_baduta) INNER JOIN tb_formulir2b c ON a.id_formulir_duaB=c.id_formulir_duaB) WHERE b.kelurahan='$kel'");
                                                        $exe_jml = mysqli_fetch_array($query);
                                                    }
                                                    
                                                    // $exe = mysqli_fetch_array($query);
                                                    set_error_handler(function () {
                                                        throw new Exception('Ach!');
                                                    });

                                                    try {
                                                        echo round(100 / ($exe_jml[0] / $exe[0]))."%";
                                                    } catch( Exception $e ){
                                                        echo "0%".PHP_EOL;
                                                        $hasil = 0;
                                                    }

                                                    restore_error_handler();