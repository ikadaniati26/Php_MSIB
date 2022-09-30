<?php
//array scalar (1 dimensi)
$m1 = ['nim'=>'2013020085','nama'=>'Ika','nilai'=> 90];
$m2 = ['nim'=>'2013020075','nama'=>'Dena','nilai'=> 70];
$m3 = ['nim'=>'2013020083','nama'=>'Zywilgyn','nilai'=> 85];
$m4 = ['nim'=>'2013020089','nama'=>'Samuel','nilai'=> 50];
$m5 = ['nim'=>'2013020313','nama'=>'Leo','nilai'=> 40];
$m6 = ['nim'=>'2013020181','nama'=>'Tan','nilai'=> 75];
$m7 = ['nim'=>'2013020285','nama'=>'Sania','nilai'=> 47];
$m8 = ['nim'=>'2013020123','nama'=>'Anushka','nilai'=> 60];
$m9 = ['nim'=>'2013020171','nama'=>'Rishi','nilai'=> 50];
$m10= ['nim'=>'2013020565','nama'=>'Ranvi','nilai'=> 95];


$ar_judul =['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat']; //judul kolom

//array assosiative (>1 dimensi) adalah array di dalam array
$namamhs = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <h3 class="text-center">Daftar Mahasiswa</h3>
        <table width="50%" cellpadding="10" align="center">
            <thead>
                <tr bgcolor='yellow'>
                     <?php 
                     foreach ($ar_judul as $jdl) {
                     ?>
                      <th><?=$jdl;?></th>
                     <?php }?>
            </thead>
            <tbody bgcolor='orange'>
              <?php
              $no=1;
              $nilai="";
              $nama="";
              
              foreach ($namamhs as $n) {
              // ternary
              $ket = ($n['nilai'] >= 60 ) ? "Lulus" : "Tidak Lulus";

              // <!-- aggregate fuction in array -->
              $jml_data = count($namamhs);
              $jml_nilai = array_column($namamhs,'nilai');
              $total= array_sum($jml_nilai);
              $max = max($jml_nilai);
              $min = min($jml_nilai);
              $rata2 = $total/$jml_data;;
             
              //keterangan
              $keterangan = [
                  'Nilai tertinggi'=> $max,
                  'Nilai terendah' => $min,
                  'Nilai rata-rata'=> $rata2,
                  'Jumlah Siswa'=> $jml_data
              ];

             
            //if multi kondisi
            if($n['nilai'] >= 85 && $n['nilai']<= 100) $grade="A";
            else if($n['nilai']>= 75 && $n['nilai'] < 85) $grade="B";
            else if($n['nilai']>= 60 && $n['nilai'] < 75) $grade="C";
            else if($n['nilai']>= 30 && $n['nilai'] < 60) $grade="D"; 
            else if($n['nilai']>= 0 && $n['nilai'] < 30) $grade="E";
            else $grade = "";

           //predikat dengan switch case
            switch ($grade) {
              case 'A': $predikat = 'Memuaskan'; break;
              case 'B': $predikat = 'Bagus'; break;
              case 'C': $predikat = 'Cukup'; break;
              case 'D': $predikat = 'Kurang'; break;
              case 'E': $predikat = 'Buruk'; break;
              //  default: $predikat = '';
              }

              ?>
               <tr>
                 <td><?=$no;?></td>
                 <td><?=$n['nim'];?></td>
                 <td><?=$n['nama'];?></td>
                 <td><?=$n['nilai'];?></td>
                 <td><?=$ket?></td>
                 <td><?= $grade?></td>
                 <td><?=$predikat?></td>
            </tr>
            <?php $no ++; } ?>
            </tbody>

            <tfoot>
                <?php
                foreach ($keterangan as $ket => $hasil) {
                ?>
                <tr>
                  <th colspan="2"><?= $ket ?></th>
                  <th><?=$hasil?></th>
                </tr>
                <?php } ?>
            </tfoot>
        </table>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>