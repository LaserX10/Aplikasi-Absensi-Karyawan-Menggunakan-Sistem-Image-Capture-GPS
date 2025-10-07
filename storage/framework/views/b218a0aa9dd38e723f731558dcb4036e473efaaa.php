
<?php $__env->startSection('content'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Karyawan
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
                            <div class="col-12">

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/yayasan/karyawan" method="GET">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" 
                                                placeholder="Nama Karyawan" value="<?php echo e(Request('nama_karyawan')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <select name="kode_dept" id="kode_dept" class="form-select">
                                                    <option value="">Departemen</option>
                                                    <?php $__currentLoopData = $departemen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e(Request('kode_dept')==$d->kode_dept ? 'selected' : ''); ?> 
                                                            value="<?php echo e($d->kode_dept); ?>"><?php echo e($d->nama_dept); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
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
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>No HP</th>
                                            <th>Foto</th>
                                            <th>Departemen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $path = Storage::url('uploads/karyawan/'.$d->foto);
                                        ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration + $karyawan->firstItem()-1); ?></td>
                                            <td><?php echo e($d->nik); ?></td>
                                            <td><?php echo e($d->nama_lengkap); ?></td>
                                            <td><?php echo e($d->jabatan); ?></td>
                                            <td><?php echo e($d->no_hp); ?></td>
                                            <td>
                                               <img class="avatar" src="data:image/png;base64, <?php echo e($d->foto); ?>">
                                                
                                            </td>
                                            <td><?php echo e($d->nama_dept); ?></td>
                                            
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($karyawan->links('vendor.pagination.bootstrap-5')); ?>

                            </div>
                        </div>
                    </div>
                        
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/karyawan/yayasanindex.blade.php ENDPATH**/ ?>