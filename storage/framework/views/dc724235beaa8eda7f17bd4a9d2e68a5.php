<?php if(Session::has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>✅ Success!</strong> <?php echo e(Session::get('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp10\htdocs\taskManagement\resources\views/TaskManager/successpopup.blade.php ENDPATH**/ ?>