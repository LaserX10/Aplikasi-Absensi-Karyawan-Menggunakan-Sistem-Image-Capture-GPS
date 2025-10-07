
<?php $__env->startSection('content'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Jadwal
          </h2>
        </div>

      </div>
    </div>
  </div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            <?php if(Session::get('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('success')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(Session::get('warning')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e(Session::get('warning')); ?>

                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                           
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/yayasanjadwal" method="GET">
                                    <input type="hidden" name="idkelas" value="<?php echo e($idkelas); ?>">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" name="hari" id="hari" class="form-control" 
                                                placeholder="Cari" value="<?php echo e(Request('hari')); ?>">
                                            </div>
                                        </div>
                                       
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  
                                                    viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  
                                                    stroke-linecap="round"  stroke-linejoin="round"  
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                        <path d="M21 21l-6 -6" />
                                                    </svg>
                                                    Cari
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari</th>
                                            <th>Jam Awal</th>
                                            <th>Jam Akhir</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Guru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($d->hari); ?></td>
                                            <td><?php echo e($d->jamawal); ?></td>
                                            <td><?php echo e($d->jamakhir); ?></td>
                                            <td><?php echo e($d->matapelajaran); ?></td>
                                            <td><?php echo e($d->nama_lengkap); ?></td>
                                           
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($jadwal->links('vendor.pagination.bootstrap-5')); ?>

                            </div>
                        </div>
                    </div>
                        
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/jadwal/yayasanindex.blade.php ENDPATH**/ ?>