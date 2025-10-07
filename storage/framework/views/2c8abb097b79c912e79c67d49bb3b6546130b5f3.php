
<?php $__env->startSection('content'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <h2 class="page-title">
            Data Jam
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
                                <a href="#" class="btn btn-primary" id="btnTambahjam">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  
                                    fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  
                                    stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/settingjam" method="GET">
                                   
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="text" name="hari" id="hari" class="form-control" 
                                                placeholder="Hari, Jam, Keterangan" value="<?php echo e(Request('hari')); ?>">
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
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $jam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $datajam = explode('-',$d->jamawalakhir);
                                        ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(ucfirst($d->hari)); ?></td>
                                            <td><?php echo e($datajam[0]); ?></td>
                                            <td><?php echo e($datajam[1]); ?></td>
                                            <td><?php echo e($d->keterangan); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" class="edit btn btn-info btn-sm" idjam="<?php echo e($d->id); ?>">
                                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  
                                                        viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  
                                                        stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </a>
                                                    <form action="/settingjam/<?php echo e($d->id); ?>/delete" method="POST" 
                                                        style="margin-left:5px">
                                                        <?php echo csrf_field(); ?>
                                                        <a class="btn btn-danger btn-sm delete-confirm">
                                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  
                                                            viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  
                                                            stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M4 7l16 0" />
                                                                <path d="M10 11l0 6" />
                                                                <path d="M14 11l0 6" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                        </a>
                                                    </form>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($jam->appends($_GET)->links('vendor.pagination.bootstrap-5')); ?>

                            </div>
                        </div>
                    </div>
                        
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-inputjam" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Jam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/settingjam/store" method="POST" id="frmjam">
            <?php echo csrf_field(); ?>
            <div class="row">
                <label>Hari</label>
                <div class="col-12">
                    <div class="input-icon mb-3">
                        <select name="hari" class="form-control" id="frm_hari">
                            <option value="">Pilih Hari...</option>
                            <?php $__currentLoopData = $hari; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kh => $vh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($kh); ?>"><?php echo e($vh); ?></option>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                </div>
            </div>
            <div class="row">
                <label>Jam Mulai - Jam Selesai (contoh 09:30-10:30)</label>
                <div class="col-6">
                    <div class="input-icon mb-3">  
                        <input type="text" id="frm_jamawal" value="" class="form-control" name="jamawal" placeholder="Jam Awal">
                      </div>
                </div>
                <div class="col-6">
                    <div class="input-icon mb-3">  
                        <input type="text" id="frm_jamakhir" value="" class="form-control" name="jamakhir" placeholder="Jam Akhir">
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
                        <input type="text" id="frm_keterangan" value="" class="form-control" name="keterangan" placeholder="Keterangan">
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
        </div>

      </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-editjam" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Jam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">
   
        </div>

      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('myscript'); ?>
<script>
    $(function() {
        $("#btnTambahjam").click(function() {
            $("#modal-inputjam").modal("show");
        });

        $(".edit").click(function() {
            var idjam = $(this).attr('idjam');
            // alert(idjam)
            $.ajax ({
                type: 'POST',
                url: '/settingjam/edit',
                cache: false,
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id: idjam,
                },
                success:function(respond) {
                    // console.log(respond)
                    $("#loadeditform").html(respond);
                }
            });
            $("#modal-editjam").modal("show");
        });

        $(".delete-confirm").click(function(e) {
            var form = $(this).closest('form');
            e.preventDefault();
            Swal.fire({
                title: "Apakah anda yakin ingin menghapus data ini ?",
                text: "Jika iya, Data akan terhapus secara permanen",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
                }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire({
                    title: "Deleted !",
                    text: "Data berhasil di hapus",
                    icon: "success"
                    });
                }
            });
        });

        $("#frmjam").submit(function() {
            var hari = $("#frm_hari").val();
            var jamawal = $("#frm_jamawal").val();
            var jamakhir = $("#frm_jamakhir").val();

            if (hari == "") {

                Swal.fire({
                    title: 'Warning !',
                    text: 'Hari wajib diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#frm_hari").focus();
                });
                
                return false;
            } else if (jamawal == "") {
                Swal.fire({
                    title: 'Warning !',
                    text: 'Jam Awal wajib diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#frm_jamawal").focus();
                });

                return false;
            } else if (jamakhir == "") {
                Swal.fire({
                    title: 'Warning !',
                    text: 'Jam Akhir wajib diisi',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $("#frm_jamawal").focus();
                });

                return false;
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/jam/index.blade.php ENDPATH**/ ?>