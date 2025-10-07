
<?php $__env->startSection('header'); ?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Data Izin / Sakit / Cuti</div>
    <div class="right"></div>
</div>

<style>
    .historicontent {
        display: flex;
        gap: 1px;
    }

    .datapresensi {
        margin-left: 10px;
    }

    .status {
        position: absolute;
        right: 20px;
    }
</style>

<!-- * App Header -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row" style="margin-top:70px">
    <div class="col">
        <?php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
        ?>
        <?php if(Session::get('success')): ?>
        <div class="alert alert-success">
            <?php echo e($messagesuccess); ?>

        </div>
        <?php endif; ?>
        <?php if(Session::get('error')): ?>
        <div class="alert alert-danger">
            <?php echo e($messageerror); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <form method="GET" action="/presensi/izin">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <select name="bulan" id="bulan" class="form-control selectmaterialize">
                            <option value="">Bulan</option>
                            <?php for($i = 1; $i <= 12; $i++): ?>
                            <option <?php echo e(Request('bulan') == $i ? 'selected' : ''); ?> value="<?php echo e($i); ?>"><?php echo e($namabulan [$i]); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <select name="tahun" id="tahun" class="form-control selectmaterialize">
                            <option value="">Tahun</option>
                            <?php
                            $tahun_awal = 2023;
                            $tahun_sekarang = date("Y");
                            for($t = $tahun_awal; $t <= $tahun_sekarang; $t++) {
                                if (Request('tahun') == $t) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                                echo "<option $selected value='$t'>$t</option>" ;
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary w-100">Cari Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php $__currentLoopData = $dataizin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            if ($d->status == "i") {
                $status = "Izin";
            } else if ($d->status == "s") {
                $status = "Sakit";
            } else if ($d->status == "c") {
                $status = "Cuti";
            } else {
                $status = "Not Found";
            }
        ?>
        <div class="card mt-1 card_izin" kode_izin="<?php echo e($d->kode_izin); ?>" status_approved="<?php echo e($d->status_approved); ?>" 
            data-toggle="modal" data-target="#actionSheetIconed">
            <div class="card-body">
                <div class="historicontent">
                    <div class="iconpresensi">
                        <?php if($d->status == "i"): ?>    
                        <ion-icon name="document-outline" style="font-size: 48px; color:#1e74fd"></ion-icon>
                        <?php elseif($d->status == "s"): ?>
                        <ion-icon name="medkit-outline" style="font-size: 48px; color:red"></ion-icon>
                        <?php elseif($d->status == "c"): ?>
                        <ion-icon name="calendar-outline" style="font-size: 48px; color:orange"></ion-icon>
                        <?php endif; ?>
                    </div>
                    <div class="datapresensi">
                        <h3 style="line-height: 3px"><?php echo e(date("d-m-Y", strtotime($d->tgl_izin_dari))); ?> (<?php echo e($status); ?>)</h3>
                        <small><?php echo e(date("d-m-Y", strtotime($d->tgl_izin_dari))); ?> s/d <?php echo e(date("d-m-Y", strtotime
                        ($d->tgl_izin_sampai))); ?> </small>
                        <p>
                            <?php echo e($d->keterangan); ?>

                            <br>
                            <?php if($d->status == "c"): ?>
                            <span class="badge bg-warning"><?php echo e($d->nama_cuti); ?></span>
                            <?php endif; ?>
                            <?php if(!empty($d->doc_skd)): ?>
                            <span style="color:blue">
                                <a href="/izinsakitnew/showskd?kodeizin=<?php echo e($d->kode_izin); ?>" xtarget="_blank">
                                    <ion-icon name="document-attach-outline"></ion-icon> Lihat SKD
                                </a>
                            </span>
                            <?php endif; ?>
                        </p>
                    </div>
                    
                    <div class="status">
                        <?php if($d->status_approved == 0): ?>    
                        <span class="badge bg-warning">Pending</span>
                        <?php elseif($d->status_approved == "1"): ?>
                        <span class="badge bg-success">Disetujui</span>
                        <?php elseif($d->status_approved == "2"): ?>
                        <span class="badge bg-danger">Ditolak</span>
                        <?php endif; ?>
                        <p style="margin-top:5px; font-weight:bold"><?php echo e(\App\Models\Pengajuanizin::hariizin($d->tgl_izin_dari, $d->tgl_izin_sampai)['jumlahhari']); ?> Hari</p>
                    </div>
                </div>
            </div>
        </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="fab-button animate bottom-right dropdown" style="margin-bottom:70px">
    <a href="#" class="fab bg-primary" data-toggle="dropdown">
        <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
    </a>
    <div class="dropdown-menu">
        <a class="dropdown-item bg-primary" href="/izinabsen">
            <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="image outline">
            </ion-icon>
            <p>Izin Absen</p>
        </a>

        <a class="dropdown-item bg-primary" href="/izinsakit">
            <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="videocam outline">
            </ion-icon>
            <p>Sakit</p>
        </a>

        <a class="dropdown-item bg-primary" href="/izincuti">
            <ion-icon name="document-outline" role="img" class="md hydrated" aria-label="videocam outline">
            </ion-icon>
            <p>Cuti</p>
        </a>
    </div>
</div>

<div class="modal fade action-sheet" id="actionSheetIconed" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aksi</h5>
            </div>
            <div class="modal-body" id="showact">
 
            </div>
        </div>
    </div>
</div>

<div class="modal fade dialogbox" id="deleteConfirm" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apakah anda yakin ingin menghapus data ini ?</h5>
            </div>
            <div class="modal-body">
                Jika iya, Data Pengajuan Izin akan di hapus
            </div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn btn-text-secondary" data-dismiss="modal">Batalkan</a>
                    <a href="" class="btn btn-text-primary" id="hapuspengajuan">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('myscript'); ?>
    <script>
        $(function() {
            $(".card_izin").click(function(e) {
                var kode_izin = $(this).attr("kode_izin");
                var status_approved = $(this).attr("status_approved");
                
                if (status_approved == 1 || status_approved == 2) {
                    Swal.fire({
                        title: 'Oops!',
                        text: 'Data yang telah di tetapkan, Tidak dapat di ubah',
                        icon: 'warning'
                    })
                } else {
                    $("#showact").load('/izin/' + kode_izin + '/showact');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.presensi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/izin.blade.php ENDPATH**/ ?>