<?php if(empty($resVal['success'])): ?>
    <div class="text-center py-4">
        <p class="text-danger"><?php echo e($resVal['message']); ?></p>
    </div>
<?php else: ?>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th style="width: 5%;">S.NO</th>
                <th style="width: 25%;">Task Name</th>
                <th style="width: 40%;">Task Description</th>
                <th style="width: 15%;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $page = $resVal['page'];
                $limit = $resVal['limit'];
                $count = ($page - 1) > 0 ? (($page - 1) * $limit) + 1 : 1;
            ?>
            <?php $__currentLoopData = $resVal['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($count++); ?></td>
                    <td><?php echo e($list->task_name); ?></td>
                    <td><?php echo e($list->task_description); ?></td>
                    <td>
                        <span class="badge bg-warning text-dark"><?php echo e($list->status); ?></span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-info" onclick="viewTask(<?php echo e($list->id); ?>)" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-primary" onclick="editTask(<?php echo e($list->id); ?>)" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteTask(<?php echo e($list->id); ?>)" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3" id="pagination">
        <?php echo e($resVal['list']->render()); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp10\htdocs\taskManagement\resources\views/TaskManager/pagination_data.blade.php ENDPATH**/ ?>