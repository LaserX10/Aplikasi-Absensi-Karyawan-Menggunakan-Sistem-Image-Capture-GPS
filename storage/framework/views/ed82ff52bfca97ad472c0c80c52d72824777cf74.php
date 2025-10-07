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
            page-break-inside: auto;
        }

        .tabelpresensi tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        .tabelpresensi tr th {
            border: 1px solid #000000;
            padding: 8px;
            background-color: #cfcfcf;
            font-size: 10px;
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

        body.A4.landscape .sheet {
            width: 297mm !important;
            height: auto !important;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4 landscape">
    <?php
        if (!function_exists('selisih')) {
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
        }
    ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%">
        <tr>
            
            <td>
                <span id="title">
                    REKAP PRESENSI KARYAWAN <br>
                    PERIODE <?php echo e(strtoupper($namabulan[$bulan])); ?> <?php echo e($tahun); ?> <br>
                    SMK IT IHYA SUNNAH <br>
                </span>
                <span><i>GP99+RJW, Payo Lebar, Kec. Singkut, Kabupaten Sarolangun, Jambi 37482</i></span>
            </td>
        </tr>
    </table>
    <h4>Rekap Presensi Karyawan : </h4>
    <table class="tabelpresensi">
        <tr>
            <th rowspan="2">NIK</th>
            <th rowspan="2">Nama Lengkap</th>
            <th colspan="<?php echo e($jmlhari); ?>">Bulan <?php echo e($namabulan[$bulan]); ?> <?php echo e($tahun); ?></th>
            <th rowspan="2">H</th>
            <th rowspan="2">I</th>
            <th rowspan="2">S</th>
            <th rowspan="2">C</th>
            <th rowspan="2">A</th>
        </tr>
        <tr>
            <?php $__currentLoopData = $rangetanggal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($d != NULL): ?>    
            <th><?php echo e(date("d", strtotime($d))); ?></th>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <?php $__currentLoopData = $rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($r->nik); ?></td>
            <td><?php echo e($r->nama_lengkap); ?></td>
                <?php
                    $jml_hadir = 0;
                    $jml_izin = 0;
                    $jml_sakit = 0;
                    $jml_cuti = 0;
                    $jml_alpa = 0;
                    $color = "";
                    for($i=1; $i<=$jmlhari; $i++) {
                        $tgl = "tgl_" . $i;
                        $datapresensi = explode("|", $r->$tgl);
                        if ($r->$tgl != NULL) {
                            $status = $datapresensi[2];
                        } else {
                            $status = "";
                        }

                        if ($status == "h") {
                            $jml_hadir += 1;
                            $color = "white";
                        }
                        if ($status == "i") {
                            $jml_izin += 1;
                            $color = "orange";
                        }
                        if ($status == "s") {
                            $jml_sakit += 1;
                            $color = "cyan";
                        }
                        if ($status == "c") {
                            $jml_cuti += 1;
                            $color = "pink";
                        }
                        if (empty($status)) {
                            $jml_alpa += 1;
                            $color = "red";
                        } 
                ?>
                <td style="background-color: <?php echo e($color); ?>">
                    <?php echo e($status); ?>

                </td>
                <?php
                    }
                ?>
                <td><?php echo e(!empty($jml_hadir) ? $jml_hadir : ""); ?></td>
                <td><?php echo e(!empty($jml_izin) ? $jml_izin : ""); ?></td>
                <td><?php echo e(!empty($jml_sakit) ? $jml_sakit : ""); ?></td>
                <td><?php echo e(!empty($jml_cuti) ? $jml_cuti : ""); ?></td>
                <td><?php echo e(!empty($jml_alpa) ? $jml_alpa : ""); ?></td>
        
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    </table>
    <br>
    <hr style=" border: 1px solid #706464">
    <h4>Rekap Presensi Guru : </h4>
    <?php $__currentLoopData = $guru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table>
            <tr>
                <td width="200">Nama Guru</td>
                <td width="10">:</td>
                <td><?php echo e($item->nama_lengkap); ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo e($item->nik); ?></td>
            </tr>
        </table>

        <?php
        $presensi = \App\Models\Kelas::rekappresensiguru($item->nik, $bulan, $tahun);
        ?>
        <table class="tabelpresensi">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Status</th>
            </tr>
            <?php $__empty_1 = true; $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php if($d->status == "h"): ?>
                    
                <?php
                $namakelas = '';
                $namamapel = '';
                try {
                    $jadwal = \App\Models\Jadwal::find($d->jadwal_id);
                    $kelas = \App\Models\Kelas::find($jadwal->kelasid);
                    $namakelas = $kelas->kelas.' ('.$kelas->lokal.')';
                    $namamapel = $jadwal->matapelajaran;
                } catch(\Exception $e) {

                }
                ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e(date("d-m-Y", strtotime($d->tgl_presensi))); ?></td>
                    <td><?php echo e($d->jam_in); ?></td>
                    <td><?php echo e($namakelas); ?></td>
                    <td><?php echo e($namamapel); ?></td>
                    <td style="text-align: center"><?php echo e($d->status); ?></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e(date("d-m-Y", strtotime($d->tgl_presensi))); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center"><?php echo e($d->status); ?></td>
                </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
            <tr>
                <td colspan="6">Belum Ada Presensi</td>
            </tr>
            <?php endif; ?>
        </table>
        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <br>
    

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

</html>
<?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/cetakrekapexcel.blade.php ENDPATH**/ ?>