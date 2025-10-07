<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4
        }
        
        #title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: bold;
        }

        .tabeldatakaryawan {
            margin-top: 40px;
        }

        .tabeldatakaryawan tr td {
            padding: 5px;
        }

        .tabelpresensi {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .tabelpresensi tr th {
            border: 1px solid #000000;
            padding: 8px;
            background-color: #cfcfcf;
        }

        .tabelpresensi tr td {
            border: 1px solid #000000;
            padding: 5px;
            font-size: 12px;
        }

        .foto {
            width: 40px;
            height: 40px;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
    <?php
        function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . ":" . round($sisamenit2);
        }
    ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%">
        <tr>
            
            <td>
                <span id="title">
                    LAPORAN PRESENSI KARYAWAN <br>
                    PERIODE <?php echo e(strtoupper($namabulan[$bulan])); ?> <?php echo e($tahun); ?> <br>
                    SMK IT IHYA SUNNAH <br>
                </span>
                <span><i>GP99+RJW, Payo Lebar, Kec. Singkut, Kabupaten Sarolangun, Jambi 37482</i></span>
            </td>
        </tr>
    </table>
    <table class="tabeldatakaryawan">
        
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?php echo e($karyawan->nik); ?></td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo e($karyawan->nama_lengkap); ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><?php echo e($karyawan->jabatan); ?></td>
        </tr>
        <tr>
            <td>Departemen</td>
            <td>:</td>
            <td><?php echo e($karyawan->nama_dept); ?></td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td><?php echo e($karyawan->no_hp); ?></td>
        </tr>
    </table>
    <table class="tabelpresensi">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            
            
            
            <th>Status</th>
            
            
        </tr>
        <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($d->status == "h"): ?>
            
        <?php
        $path_in = Storage::url('uploads/absensi/' .$d->foto_in);
        $path_out = Storage::url('uploads/absensi/' .$d->foto_out);
        $jamterlambat = hitungjamkerja('08:00:00', $d->jam_in);
        ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e(date("d-m-Y", strtotime($d->tgl_presensi))); ?></td>
            <td><?php echo e($d->jam_in); ?></td>
          
            
            <td style="text-align: center"><?php echo e($d->status); ?></td>
            
        </tr>
        <?php else: ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e(date("d-m-Y", strtotime($d->tgl_presensi))); ?></td>
            <td></td>
            
            
            <td style="text-align: center"><?php echo e($d->status); ?></td>
            
            
        </tr>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</table>
    

<table width= "100%" style="margin-top:50px">

    <tr>

        <td colspan="3">Sarolangun, <?php echo e(date('d-M-Y')); ?></td>

    </tr>

   

    <tr>

        <td>

            Dibuat oleh :

            <br>

            Kabag TU SMK IT Ihya Assunah

            <br><br><br><br>

            Arip Angsari, S.Pd

        </td>

        <td>

            Diperiksa,

            <br>

            Kepala SMK IT Ihya Assunah

            <br><br><br><br>

            Amri Kornianto, S.Kom

        </td>

        <td>

            Diketahui,

            <br>

            Ketua Yayasan

            <br><br><br><br>

            Asrofi, S.Pd.I

        </td>

    </tr>

</table>
  </section>

</body>

</html><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/cetaklaporanexcel.blade.php ENDPATH**/ ?>