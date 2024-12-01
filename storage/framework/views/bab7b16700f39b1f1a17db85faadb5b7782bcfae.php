<?php $__env->startSection('title', __('Create user')); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Create Users')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Users')); ?></a>
                        </li>
                        <li class="breadcrumb-item"><?php echo e(__('Create')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Create Users')); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo Form::open(['route' => 'users.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']); ?>

                    <div class="form-group ">
                        <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>


                        <?php echo Form::text('name', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Name')]); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?>


                        <?php echo Form::text('email', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Email Address')]); ?>

                    </div>

                    <div class="form-group">
                        <?php echo e(Form::label('role_id', __('User Type'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::select('role_id', $roles, null, ['class' => 'form-select']); ?>

                    </div>
                    <div class="form-group ">
                        <?php echo e(Form::label('password', __('Password'), ['class' => 'form-label'])); ?>


                        <?php echo Form::password('password', ['class' => 'form-control', ' required', 'placeholder' => __('Enter Password')]); ?>

                    </div>
                    <div class="form-group ">
                        <?php echo e(Form::label('confirm-password', __('Confirm Password'), ['class' => 'form-label'])); ?>


                        <?php echo e(Form::password('confirm-password', ['class' => 'form-control',' required','placeholder' => __('Enter Confirm Password')])); ?>

                    </div>
                    <?php if(tenant('id') != null): ?>
                        <div class="form-group">
                            <?php echo e(Form::label('roles', __('Role'), ['class' => 'form-label'])); ?>

                            <?php echo Form::select('roles', $roles, null, ['class' => 'form-control']); ?>

                        </div>
                    <?php endif; ?>
              
                <div class="card-footer">
                    <div class="float-end">
                        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary "><?php echo e(__('Cancel')); ?></a>
                        <button type="submit" class="btn btn-primary "><?php echo e(__('Save')); ?></button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/users/create.blade.php ENDPATH**/ ?>