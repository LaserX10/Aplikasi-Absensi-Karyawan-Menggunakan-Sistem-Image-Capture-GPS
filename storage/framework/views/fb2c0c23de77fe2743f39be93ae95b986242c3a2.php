<form action="/settingjam/<?php echo e($jam->id); ?>/update" method="POST" id="frmKelas" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
   
    <div class="row">
        <label>Hari</label>
        <div class="col-12">
            <div class="input-icon mb-3">
                <select name="hari" class="form-control" id="frm_hari">
                    <option value="">Pilih Hari...</option>
                    <?php $__currentLoopData = $hari; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh => $vh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kh); ?>" <?php echo e($jam->hari == $kh ? 'selected' : ''); ?>><?php echo e($vh); ?></option>    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
        </div>
    </div>
    <div class="row">
        <label>Jam Mulai - Jam Selesai (contoh 09:30-10:30)</label>
        <?php
        $datajam = explode('-',$jam->jamawalakhir);
        ?>
        <div class="col-6">
            <div class="input-icon mb-3">  
                <input type="text" id="frm_jamawal" value="<?php echo e($datajam[0]); ?>" class="form-control" name="jamawal" placeholder="Jam Awal">
              </div>
        </div>
        <div class="col-6">
            <div class="input-icon mb-3">  
                <input type="text" id="frm_jamakhir" value="<?php echo e($datajam[1]); ?>" class="form-control" name="jamakhir" placeholder="Jam Akhir">
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="alert alert-info">Pada bagian keterangan bisa di isi seperti 
                (Istirahat, Upacara, atau kegiatan lainnya). 
                Apabila keterangan tersebut bertipe jam, 
                maka kosongkan saja dikarenakan sistem akan mengisi 
                data keterangan secara otomasi pada saat proses penyimpanan data</p>
            <label>Keterangan</label>
            <div class="input-icon mb-3">  
                <input type="text" id="frm_keterangan" value="<?php echo e($jam->keterangan); ?>" class="form-control" name="keterangan" placeholder="Keterangan">
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
<?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/jam/edit.blade.php ENDPATH**/ ?>