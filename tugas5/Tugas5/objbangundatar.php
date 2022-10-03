
<?php
 error_reporting (0);
 require_once 'Lingkaran.php';
 require_once 'PersegiPanjang.php';
 require_once 'segitiga.php';
 
 $l = new lingkaran();
 $pp = new persegiPanjang();
 $s  = new segitiga();

 $data=[$l, $pp, $s];
 $judul =['No', 'Nama Bidang', 'Keterangan' ,'Luas', 'Keliling'];
 
?>


 <h3 align="center">Bangun datar</h3>
 <table border="1" cellpadding="10" align="center" width="50%">
 <head>
     <tr>
         <?php
         foreach ($judul as $jdl){?>
           <th><?= $jdl; ?></th>
           <?php } ?>
     </tr>
</head>
<body>
    <?php
      $no = 1;
      $ket = [1 => 'Jari-jari = 11', 'panjang = 10 <br> lebar = 5','alas = 10 <br> tinggi = 15 miring = 20' ];

      foreach ($data as $d) {?>

        <tr>
            <td><?= $no ?></td>
            <td><?= $d->namaBidang() ?></td>
            <td><?= $ket[$no] ?></td>
            <td><?= $d->luasBidang() ?></td>
            <td><?= $d->kelilingBidang() ?></td>
        </tr>

        <?php  $no ++; } ?>
      </body>
        <tfoot>
            <?php
             foreach ($keterangan as $k=> $hasil) {?>
             <tr>
                 <td colspan="2"><?= $hasil ?></td>
             </tr>
            <?php } ?>
        </tfoot>

 </table>
 
 
 