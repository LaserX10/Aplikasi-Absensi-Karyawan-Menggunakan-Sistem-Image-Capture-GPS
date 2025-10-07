<form action="/jadwal/<?php echo e($jadwal->id); ?>/update" method="POST" id="frmKelas" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="kelasid" value="<?php echo e($idkelas); ?>">
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <select name="karyawannik" class="form-control" id="frm_karyawannik">
                    <option value="">Pilih Karyawan...</option>
                    <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kr->nik); ?>" <?php echo e($jadwal->karyawannik == $kr->nik ? 'selected' : ''); ?>><?php echo e($kr->nama_lengkap); ?></option>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <select name="hari" class="form-control" id="frm_hariedit">
                    <option value="">Pilih Hari...</option>
                    <?php $__currentLoopData = $hari; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh => $vh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kh); ?>" <?php echo e($jadwal->hari == $kh ? 'selected' : ''); ?>><?php echo e($vh); ?></option>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3" id="loadjamedit">
                
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">  
                <input type="text" id="frm_matapelajaran" value="<?php echo e($jadwal->matapelajaran); ?>" class="form-control" name="matapelajaran" placeholder="Mata Pelajaran">
                </div>
        </div>
    </div>
    
    
    <div class="row mt-2">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary w-100">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  
                    stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                    class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 14l11 -11" />
                        <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                    </svg>
                    Simpan
                </button>
            </div>
        </div>
    </div>
  </form>

  <script>
    $(document).ready(function(){

        $(function(){
            loaddatajam('<?php echo e($jadwal->id); ?>','<?php echo e($jadwal->hari); ?>');
        })

        $('#frm_hariedit').on('change',function(){
            // alert($(this).val())
            loaddatajam('',$(this).val());
        })

        function loaddatajam(viddata,vhari) {
            var vurl = "/loaddata/getjam"
            $.get(vurl,{
                iddata : viddata,
                hari : vhari 
            },function(data){
                $('#loadjamedit').html(data)
            },'html')
        }
    })
  </script><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/jadwal/edit.blade.php ENDPATH**/ ?>