<?php $__env->startSection('title', __('Edit Blog')); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Edit Badge')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('badge.index')); ?>"><?php echo e(__('Badge')); ?></a>
                        </li>
                        <li class="breadcrumb-item"><?php echo e(__('Edit')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Edit Badge')); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo Form::model($badge, ['route' => ['badge.update', $badge->id], 'method' => 'Patch', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('interval_time', __('Interval time'), ['class' => 'col-form-label'])); ?> *

                        <?php echo Form::text('interval_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Interval time', 'required' => 'required']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('photo', __('Photo'), ['class' => 'col-form-label'])); ?> *
                        <input name="photo" type="file" id="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                        <?php echo Form::select('status', ['1' => 'Active', '0' => 'Deactive'], $badge->status, ['class' => 'form-select']); ?>

                    </div>
                
                
                 
                   
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="<?php echo e(route('blogs.index')); ?>" class="btn btn-secondary "><?php echo e(__('Cancel')); ?></a>
                        <button type="submit" class="btn btn-primary "><?php echo e(__('Save')); ?> </button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascript'); ?>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "<?php echo e(route('ckeditor.upload', ['_token' => csrf_token()])); ?>",
            filebrowserUploadMethod: 'form'
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/badge/edit.blade.php ENDPATH**/ ?>