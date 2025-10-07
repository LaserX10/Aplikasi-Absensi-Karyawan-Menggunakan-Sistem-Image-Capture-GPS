<form action="/kelas/<?php echo e($kelas->id); ?>/update" method="POST" id="frmKelas" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <input type="text" readonly value="<?php echo e($kelas->tahunajaran); ?>" id="nik" class="form-control" placeholder="Tahun Ajaran" name="tahunajaran">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <input type="text" id="kelas" value="<?php echo e($kelas->kelas); ?>" class="form-control" name="kelas" placeholder="Kelas">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="input-icon mb-3">
                <input type="text" id="lokal" value="<?php echo e($kelas->lokal); ?>" class="form-control" name="lokal" 
                placeholder="Lokal">
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
  </form><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/kelas/edit.blade.php ENDPATH**/ ?>