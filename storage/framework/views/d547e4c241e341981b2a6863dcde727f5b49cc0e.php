<script>
    <?php if(session('failed')): ?>
        notifier.show('Failed!', '<?php echo e(session('failed')); ?>', 'danger',
        '<?php echo e(asset('assets/images/notification/high_priority-48.png')); ?>', 4000);
    <?php endif; ?>

    <?php if(session('errors')): ?>
        notifier.show('Error!', '<?php echo e(session('errors')); ?>', 'danger',
        '<?php echo e(asset('assets/images/notification/high_priority-48.png')); ?>', 4000);
    <?php endif; ?>

    <?php if(session('successful')): ?>
        notifier.show('Successfully!', '<?php echo e(session('successful')); ?>', 'success',
        '<?php echo e(asset('assets/images/notification/ok-48.png')); ?>', 4000);
    <?php endif; ?>

    <?php if(session('success')): ?>
        notifier.show('Success!', '<?php echo e(session('success')); ?>', 'success',
        '<?php echo e(asset('assets/images/notification/ok-48.png')); ?>', 4000);
    <?php endif; ?>
    <?php if(session('warning')): ?>
        notifier.show('Warning!', '<?php echo e(session('warning')); ?>', 'warning',
        '<?php echo e(asset('assets/images/notification/medium_priority-48.png')); ?>', 4000);
    <?php endif; ?>
</script>

<script>
    <?php if(session('status')): ?>
        notifier.show('Great!', '<?php echo e(session('status')); ?>', 'info',
        '<?php echo e(asset('assets/images/notification/survey-48.png')); ?>', 4000);
    <?php endif; ?>
</script>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/layouts/includes/alerts.blade.php ENDPATH**/ ?>