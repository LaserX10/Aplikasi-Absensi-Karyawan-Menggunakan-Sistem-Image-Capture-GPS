<?php $__env->startSection('header'); ?>
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Presensi</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row" style="margin-top:70px">
    <div class="col">
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-12">
              
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col text-center mt-5">
        <div class="mt-5"></div>
        <h3 class="mt-5">Maaf anda tidak dapat melakukan Presensi diluar jam pelajaran</h3>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.presensi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/gagalpresensi.blade.php ENDPATH**/ ?>