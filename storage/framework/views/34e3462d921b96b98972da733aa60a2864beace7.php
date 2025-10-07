<ul class="action-button-list">
    <li>
        <?php if($dataizin->status == "i"): ?>    
        <a href="/izinabsen/<?php echo e($dataizin->kode_izin); ?>/edit"  class="btn btn-list text-primary">
            <span>
                <ion-icon name="create-outline"></ion-icon>
                Edit
            </span>
        </a>
        <?php elseif($dataizin->status == "s"): ?>
        <a href="/izinsakit/<?php echo e($dataizin->kode_izin); ?>/edit"  class="btn btn-list text-primary">
            <span>
                <ion-icon name="create-outline"></ion-icon>
                Edit
            </span>
        </a>
        <?php elseif($dataizin->status == "c"): ?>
        <a href="/izincuti/<?php echo e($dataizin->kode_izin); ?>/edit"  class="btn btn-list text-primary">
            <span>
                <ion-icon name="create-outline"></ion-icon>
                Edit
            </span>
        </a>
        <?php endif; ?>
    </li>
    <li>
        <a href="#" id="deletebutton" class="btn btn-list text-danger" data-dismiss="modal" data-toggle="modal" 
        data-target="#deleteConfirm">
            <span>
                <ion-icon name="trash-outline"></ion-icon>
                Delete
            </span>
        </a>
    </li>
</ul>

<script>
    $(function() {
        $("#deletebutton").click(function(e) {
            $("#hapuspengajuan").attr('href', '/izin/' + '<?php echo e($dataizin->kode_izin); ?>/delete');
        });
    });
</script><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/presensi/showact.blade.php ENDPATH**/ ?>