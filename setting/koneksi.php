<?php
$konek = mysqli_connect("localhost", "root", "", "simpelkpm_db");

// histori bumil
$log = mysqli_query($konek, "CREATE TRIGGER after_bumil_update AFTER UPDATE ON tb_bumil FOR EACH ROW BEGIN INSERT INTO tb_log_bumil SET id_bumil=OLD.id_bumil, bulan_baru=new.bulan, bulan_lama=old.bulan, usia_baru=new.usia_kehamilan, usia_lama=old.usia_kehamilan, waktu_perubahan=NOW(); END");

// histori baduta
$log_baduta = mysqli_query($konek, "CREATE TRIGGER after_baduta_update AFTER UPDATE ON tb_baduta FOR EACH ROW BEGIN INSERT INTO tb_log_baduta SET id_baduta=OLD.id_baduta, bulan_baru=new.bulan, bulan_lama=old.bulan, usia_baru=new.umur, usia_lama=old.umur, waktu_perubahan=NOW(); END");

// histori balita
$log_balita = mysqli_query($konek, "CREATE TRIGGER after_balita_update AFTER UPDATE ON tb_balita FOR EACH ROW BEGIN INSERT INTO tb_log_balita SET id_balita=OLD.id_balita, bulan_baru=new.bulan, bulan_lama=old.bulan, usia_baru=new.usia_anak, usia_lama=old.usia_anak, waktu_perubahan=NOW(); END");

// histori 2a
$log_2a = mysqli_query($konek, "CREATE TRIGGER after_2a_update AFTER UPDATE ON tb_formulir2a FOR EACH ROW BEGIN INSERT INTO tb_log_2a SET id_formulir_duaA=OLD.id_formulir_duaA, id_bumil=OLD.id_bumil, 
pemeriksaan_kehamilan_lama=old.pemeriksaan_kehamilan, dapat_pilfe_lama=OLD.dapat_pilfe, 
pemeriksaan_nifas_lama=old.pemeriksaan_nifas, konseling_gizi_lama=OLD.konseling_gizi,
kunjungan_rumah_lama=OLD.kunjungan_rumah, kepem_air_bersih_lama=OLD.kepem_air_bersih, kepem_jamban_lama=OLD.kepem_jamban, jamkes_lama=OLD.jamkes, waktu_perubahan=NOW();
END");

// histori 2b
$log_2b = mysqli_query($konek, "CREATE TRIGGER after_2b_update AFTER UPDATE ON tb_formulir2b FOR EACH ROW 
BEGIN INSERT INTO tb_log_2b SET id_formulir_duaB=OLD.id_formulir_duaB, id_baduta=OLD.id_baduta, 
pemberian_imunisasi_dasar_lama=old.pemberian_imunisasi_dasar,berat_badan_lama=OLD.berat_badan, 
tinggi_badan_lama=old.tinggi_badan,k1L_lama=old.k1L,k2P_lama=old.k2P,kunjungan_rumah_lama=old.kunjungan_rumah,kepem_air_bersih_lama=old.kepem_air_bersih,kepem_jamban_lama=old.kepem_jamban,
akta_lahir_lama=old.akta_lahir,jamkes_lama=old.jamkes,pengasuhan_paud_lama=old.pengasuhan_paud,
waktu_perubahan=NOW();
END");

// histori 2c
$log_2c = mysqli_query($konek, "CREATE TRIGGER after_2c_update AFTER UPDATE ON tb_formulir2cFOR EACH ROW 
BEGIN INSERT INTO tb_log_2c SET id_formulir_duaC=OLD.id_formulir_duaC, id_balita=OLD.id_balita, 
januari_lama=old.januari,februari_lama=OLD.februari, maret_lama=old.maret,april_lama=old.april,mei_lama=old.mei,juni_lama=old.juni,juli_lama=old.juli,agustus_lama=old.agustus,september_lama=old.september,
oktober_lama=old.oktober,november_lama=old.november,desember_lama=old.desember,waktu_perubahan=NOW();
END");

// DELIMITER $$
// CREATE TRIGGER after_balita_update 
// 	AFTER UPDATE ON tb_balita 
//     FOR EACH ROW 
// BEGIN 
// INSERT INTO tb_log_balita 
// 	SET id_balita=OLD.id_balita, 
//     bulan_baru=new.bulan, 
//     bulan_lama=old.bulan,
//     usia_baru=new.usia_anak, 
//     usia_lama=old.usia_anak, 
//     waktu_perubahan=NOW();
// END$$
// DELIMITER ;

if (!$konek) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
?>