<?php if($histori->isEmpty()): ?>
<div class="alert alert-outline-warning">
    <p>Data belum ada</p>
</div>
<?php endif; ?>
<?php $__currentLoopData = $histori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<ul class="listview image-listview">
    <li>
        <div class="item">
            <img xalt="image" class="image" src="<?php echo e($d->foto_in); ?>">
            <div class="in">
                <div>
                    <?php if(Auth::guard('karyawan')->user()->kode_dept == 'G'): ?>
                        <b><?php echo e(date("d-m-Y",strtotime($d->tgl_presensi))); ?></b><br>
                        <?php if($d->jadwal_id != ''): ?>
                            <?php
                            $jadwal = \App\Models\Jadwal::find($d->jadwal_id);
                            ?>
                            (<?php echo e($jadwal->matapelajaran); ?>)
                        <?php else: ?>
                            <?php if($d->status == 's'): ?>
                                    (Sakit)
                            <?php elseif($d->status = 'i'): ?>
                                (Izin)
                            <?php elseif($d->status = 'c'): ?>
                                (Cuti)
                            <?php else: ?> 
                                ""
                            <?php endif; ?>
                        <?php endif; ?>

                        <span class="badge bg-success">
                            <?php echo e($d->jam_in); ?>

                        </span>
                        <span class="badge bg-primary"><?php echo e($d->jam_out); ?></span>
                    <?php else: ?> 
                    
                        
                   
                        <span class="badge <?php echo e($d->jam_in < "08:00" ? "bg-success" : "bg-danger"); ?>">
                            <?php echo e($d->jam_in); ?>

                        </span>
                        <span class="badge bg-primary"><?php echo e($d->jam_out); ?></span>
                    <?php endif; ?>
                    
                    
                </div>
              
            </div>
        </div>
    </li>
</ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/gethistori.blade.php ENDPATH**/ ?>