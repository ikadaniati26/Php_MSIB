<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">

    <form id="contactForm" method="POST" class="m-5">
    <h2 align="center">FORM INPUT DATA GAJI PEGAWAI</h2>
        <div class="mb-2">
            <label class="form-label" for="namaPegawai">Nama Pegawai</label>
            <input class="form-control" id="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" name="nama" />
            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="agama">Agama</label>
            <select class="form-select" id="agama" aria-label="Agama" name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="manager" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="asisten manager" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="asisten">Asisten Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="kabag" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="staff" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="menikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="manager">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="belum" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="asisten">Belum</label>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="jumlahAnak" >Jumlah Anak</label>
            <input class="form-control" id="jumlahAnak" name="jumlahanak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div> 


        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>


        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg " id="submitButton" type="submit" name="proses">Submit</button>
        </div>
    </form>
    </div>
</div>

<?php
error_reporting(0);
//tangkap request
 $nama = $_POST['nama'];
 $agama = $_POST['agama'];
 $jabatan = $_POST['jabatan'];
 $status = $_POST['status'];
 $jumlahanak = $_POST['jumlahanak'];
 $tombol = $_POST['proses'];


 //tentukan gaji pokok
 switch ($jabatan) {
     case 'manager': $gapok = 20000000; break;
     case 'asisten':$gapok = 15000000; break;
     case 'kabag':$gapok =  10000000; break;
     case 'staff':$gapok = 4000000; break;
     default:$gapok = '';
 }
 //tentukan tunjangan jabatan
    $tunjab = 20/100 * $gapok;

 //tentukan tunjangan keluarga , if multi kondisi

        if($status >= 'menikah' && $jumlahanak <= 2) $tk= 5/100 *$gapok;
        else if($status >= 'menikah' && $jumlahanak <= 5) $tk=10/100 *$gapok;
        else if($status >= 'menikah' && $jumlahanak >= 5) $tk= 15/100 *$gapok;
        else $gapok = "Belum dapat tunjangan keluarga";

//tentukan gaji kotor
    $gajikotor = $gapok + $tunjab + $tk;

//tentukan zakat profesi, ternary ,Jika ia muslim dan gaji kotor minimal 6 juta, ada zakat = 2.5% dari gaji kotor. Selain itu tidak ada zakat
$zp = ('islam' && $gajikotor >= 6000000) ? 2.5/100 * $gajikotor : 0;

//tentukan take home pay
$thp = $gajikotor - $zp;

 //cetak
 if(isset($tombol)){ ?>
<table class="table table-success table-striped">
     <thead>
        <tr>
            <th>Nama Pegawai</th>
            <th>Agama</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Jumlah anak</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan Jabatan</th>
            <th>Tunjangan Keluarga</th>
            <th>Gaji Kotor</th>
            <th>Zakat Profesi</th>
            <th>Take Home Pay</th>
        </tr>
     </thead>
     <tbody>
        <tr>
            <td> <?= $nama ?></td>
            <td> <?=  $agama?></td>
            <td> <?= $jabatan?></td>
            <td> <?= $status ?></td>
            <td> <?= $jumlahanak ?></td>
            <td> <?=  number_format($gapok, 2, ',', '.');?></td>
            <td> <?=  number_format($tunjab, 2, ',', '.');?></td>
            <td> <?=  number_format($tk, 2, ',', '.');?></td>
            <td> <?=  number_format($gajikotor, 2, ',', '.');?></td>
            <td> <?=  number_format($zp, 2, ',', '.');?></td>
            <td> <?=  number_format($thp, 2, ',', '.');?></td>
        </tr>
     </tbody>
</table>

    <?php } ?>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>