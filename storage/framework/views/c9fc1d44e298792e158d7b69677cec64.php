<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">📝 All Tasks</h2>
    </div>
    <?php if(Session::has('success')): ?>
        <?php echo $__env->make('TaskManager.successpopup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
    <!-- Filter Form -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form id="filterForm" class="row g-3 mb-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search task name">
                </div>
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTaskModal">
            <i class="fas fa-plus me-1"></i> Create New Task
        </button>
    </div>
    <div id="taskTable">
        <?php echo $__env->make('TaskManager.pagination_data', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
    </div>

     <!-- Create Task Modal -->
    <?php echo $__env->make('TaskManager.taskManagerPopup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('#search, #status').on('input change', function () {
        loadTasks();
    });

    function loadTasks() {
        let search = $('#search').val();
        let status = $('#status').val();

        $.ajax({
            url: '<?php echo e(url("task_manager/listAll")); ?>',
            method: 'POST',
            data: {
                search: search,
                status: status,
                need_page: 1
            },
            beforeSend: function () {
                $('#taskTable').html('Loading...');
            },
            success: function (data) {
                $('#taskTable').html(data);
            },
            error: function () {
                $('#taskTable').html('<div class="text-danger">Error loading data.</div>');
            }
        });
    }
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp10\htdocs\taskManagement\resources\views/TaskManager/list.blade.php ENDPATH**/ ?>