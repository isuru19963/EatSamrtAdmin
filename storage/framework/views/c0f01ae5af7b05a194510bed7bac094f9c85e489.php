<div class="btn-group me-2">
    <button class="custom_btn btn  btn-primary  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"><?php echo e(__('Action')); ?></button>
    <div class="dropdown-menu table-dropdown p-0">
        <a class="dropdown-item"  href="<?php echo e(route('category.edit', $category->id)); ?>" >
            <i class="ti ti-edit"></i><?php echo e(__(' Edit')); ?>

        </a>
        <?php echo Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id], 'id' => 'delete-form-' . $category->id]); ?>

        <a class="dropdown-item  show_confirm text-danger" data-toggle="tooltip" href="#!"  ><i
            class="ti ti-trash text-danger"></i><?php echo e(__('Delete')); ?></a>
            <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/category/action.blade.php ENDPATH**/ ?>