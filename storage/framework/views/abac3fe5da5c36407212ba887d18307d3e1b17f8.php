<div class="btn-group mb-2 me-2">
    <button class="custom_btn btn  btn-primary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"><?php echo e(__('Action')); ?></button>
    <div class="dropdown-menu dropdown-menu-light" style="">
        <a class="dropdown-item" href="blogs/<?php echo e($post->id); ?>/edit">
            <i class="ti ti-edit"></i> <?php echo e(__('Edit')); ?>

        </a>
        <?php echo Form::open(['method' => 'DELETE', 'route' => ['blogs.destroy', $post->id], 'id' => 'delete-form-' . $post->id]); ?>

        <a class="dropdown-item  show_confirm text-danger" data-toggle="tooltip" href="#!"  ><i
            class="ti ti-trash text-danger"></i><?php echo e(__('Delete')); ?></a>
            <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/posts/action.blade.php ENDPATH**/ ?>