<?php 
require 'Pegawai.php';

// ciptakan object
$ika = new Pegawai('001', 'Ika', 'Manager', 'Islam', 'Menikah');
$ricky = new Pegawai('002', 'Ricky', 'Asmen', 'Islam', 'Lajang');
$rachel = new Pegawai('003', 'Rachel', 'Kabag', 'Kristen', 'Menikah');
$ricka = new Pegawai('004', 'Ricka', 'Kabag', 'Hindu', 'Lajang');
$anggraini = new Pegawai('005', 'Anggraini', 'Staff', 'Islam', 'Lajang');

$ika->cetak();
$ricky->cetak();
$rachel->cetak();
$ricka->cetak();
$anggraini->cetak();
echo '<br />Jumlah Pegawai: '.Pegawai::$total;
?>