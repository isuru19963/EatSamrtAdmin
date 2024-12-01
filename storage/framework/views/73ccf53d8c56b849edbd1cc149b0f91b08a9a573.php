<?php $__env->startSection('title', __('Edit user')); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Edit Users')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Users')); ?></a>
                        </li>
                        <li class="breadcrumb-item"><?php echo e(__('Edit')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Edit Users')); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'Put', 'enctype' => 'multipart/form-data']); ?>

                    <div class="form-group ">
                        <?php echo e(Form::label('name', __('Name'))); ?>

                        <?php echo Form::text('name', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Name')]); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('email', __('Email'))); ?>

                        <div class="input-group">

                            <?php echo Form::text('email', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Email Address')]); ?>

                        </div>
                    </div>
                    <?php if(tenant('id') != null && $user->type != 'Admin'): ?>
                        <div class="form-group">
                            <?php echo e(Form::label('roles', __('Role'))); ?>

                            <?php echo Form::select('roles', $roles, $user->type, ['class' => 'form-control', 'id' => 'role']); ?>

                        </div>
                    <?php endif; ?>
              
                </div>
                <div class="card-footer">
                    <div class="btn-flt float-end">
                        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary "><?php echo e(__('Cancel')); ?></a>
                        <button type="submit" class="btn btn-primary "><?php echo e(__('Save')); ?></button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
    <script>
        $(document).on('change', '#role', function() {
            var roles = $(this).val();
            if (roles == 'Super Admin') {
                $('#domain').hide();
                $('#domain').val('');

            } else {
                $('#domain').show();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/users/edit.blade.php ENDPATH**/ ?>