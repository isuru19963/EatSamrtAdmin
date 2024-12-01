<div class="btn-group me-2">
    <button class="custom_btn btn btn-primary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"><?php echo e(__('Action')); ?></button>
    <div class="dropdown-menu table-dropdown p-0">
        <?php if($user->active_status != 1): ?>
            <a class="dropdown-item" href="account-status/<?php echo e($user->id); ?>"><i class="ti ti-user-off"></i><?php echo e(__('Deactive')); ?></a>
        <?php else: ?>
            <a class="dropdown-item" href="account-status/<?php echo e($user->id); ?>"><i class="ti ti-user-check"></i><?php echo e(__('Active')); ?></a>
        <?php endif; ?>
        <a class="dropdown-item" href="users/<?php echo e($user->id); ?>/edit">
            <i class="ti ti-edit"></i><?php echo e(__('Edit')); ?>

        </a>
   
        <?php echo Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'id' => 'delete-form-' . $user->id]); ?>

        <a class="dropdown-item  show_confirm text-danger" data-toggle="tooltip" href="#!"  ><i
            class="ti ti-trash text-danger"></i><?php echo e(__('Delete')); ?></a>
            <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/users/action.blade.php ENDPATH**/ ?>