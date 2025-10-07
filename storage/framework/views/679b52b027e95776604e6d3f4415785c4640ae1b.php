
<?php $__env->startSection('content'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Profil Pengguna
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
                       
                       
                        <div class="row mt-2">
                            <div class="col-12">
                                <table>
                                    <tr>
                                        <td width="150">Nama</td>
                                        <td width="10">:</td>
                                        <td><?php echo e($user->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><?php echo e($user->status); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email/Username</td>
                                        <td>:</td>
                                        <td><?php echo e($user->email); ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3">
                                            <br>
                                            <a href="/profilformnamausername">Ganti Nama dan Username</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                          
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>:</td>
                                        <td>.............</td>
                                    </tr>
                                    <tr>
                                       
                                        <td colspan="3">
                                            <br>
                                            <a href="/formpassword">Ganti Password</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                        
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/profilpengguna/index.blade.php ENDPATH**/ ?>