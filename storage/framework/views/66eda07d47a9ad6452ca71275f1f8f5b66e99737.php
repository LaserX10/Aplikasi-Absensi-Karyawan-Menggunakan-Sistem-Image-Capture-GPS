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

        body.A4.landscape .sheet {
            width: 297mm !important;
            height: auto !important;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
    
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%">
        <tr>
            <td style="width: 30px">
                <img src="<?php echo e(url('assets/img/logo_smk.png')); ?>" width="70" height="70" alt="">
            </td>
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
    <table class="tabeldatakaryawan">
        <tr>
            <td rowspan="6">
              
                 <img src="data:image/png;base64, <?php echo e($karyawan->foto); ?>" width="150px" height="150px">
            </td>
        </tr>
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
    <?php if($karyawan->kode_dept == 'G'): ?>
        <table class="tabelpresensi">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Foto</th>
                <th>Status</th>
            </tr>
            <?php $__currentLoopData = $presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($d->status == "h"): ?>
                
            <?php
            $path_in = Storage::url('uploads/absensi/' .$d->foto_in);
            $path_out = Storage::url('uploads/absensi/' .$d->foto_out);
            $jamterlambat = hitungjamkerja('08:00:00', $d->jam_in);

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
                <td><img src="<?php echo e($d->foto_in); ?>" alt="" class="foto"></td>
                <td style="text-align: center"><?php echo e($d->status); ?></td>
            </tr>
            <?php else: ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e(date("d-m-Y", strtotime($d->tgl_presensi))); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center"><?php echo e($d->status); ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php else: ?> 
        <table class="tabelpresensi">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Foto</th>
                <th>Jam Pulang</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Keterangan</th>
                
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
                <td><img src="<?php echo e($d->foto_in); ?>" alt="" class="foto"></td>
                <td><?php echo e($d->jam_out != null ? $d->jam_out : 'Belum Absen'); ?></td>
                <td>
                    <?php if($d->jam_out != null): ?>    
                        <img src="<?php echo e($d->foto_out); ?>" alt="" class="foto">
                       
                    <?php else: ?>
                    <img src="<?php echo e(asset('assets/img/camera.jpg')); ?>" alt="" class="foto">
                    <?php endif; ?>
                </td>
                <td style="text-align: center"><?php echo e($d->status); ?></td>
                <td>
                    <?php if($d->jam_in > '08:00'): ?>
                    Terlambat <?php echo e($jamterlambat); ?>

                    <?php else: ?>
                    Tepat Waktu
                    <?php endif; ?>
                </td>
                
            </tr>
            <?php else: ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e(date("d-m-Y", strtotime($d->tgl_presensi))); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center"><?php echo e($d->status); ?></td>
                <td><?php echo e($d->keterangan); ?></td>
                
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>
   

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

</html><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/cetaklaporan.blade.php ENDPATH**/ ?>