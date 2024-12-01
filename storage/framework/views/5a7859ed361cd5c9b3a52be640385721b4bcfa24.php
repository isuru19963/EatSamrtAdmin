<div class="btn-group me-2">
    <button class="custom_btn btn btn-primary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"><?php echo e(__('Action')); ?></button>
    <div class="dropdown-menu table-dropdown p-0">
        <!-- <?php if($user->active_status != 1): ?>
            <a class="dropdown-item" href="account-status/<?php echo e($user->id); ?>"><i class="ti ti-user-off"></i><?php echo e(__('Deactive')); ?></a>
        <?php else: ?>
            <a class="dropdown-item" href="account-status/<?php echo e($user->id); ?>"><i class="ti ti-user-check"></i><?php echo e(__('Active')); ?></a>
        <?php endif; ?> -->
        <a class="dropdown-item" href="patient-details/<?php echo e($user->patient_id); ?>">
            <i class="ti ti-edit"></i><?php echo e(__('View')); ?>

        </a>
   
      
    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/patients/action.blade.php ENDPATH**/ ?>