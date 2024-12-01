<?php $__env->startSection('title', __('Create Blog')); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Foods Category')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('blogs.index')); ?>"><?php echo e(__('Foods Category')); ?></a>
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
                    <h5><?php echo e(__('Create Foods Category')); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo Form::open(['route' => 'fooditemscategory.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('name', __('Catgoery name'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Interval Time in word', 'required' => 'required']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('description', __('Category Description'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Interval time in seconds', 'required' => 'required']); ?>

                    </div>
                   
                    <div class="form-group">
                        <?php echo e(Form::label('photo', __('Photo'), ['class' => 'form-label'])); ?> *
                        <input name="photo" type="file" id="photo" class="form-control">
                    </div>
                 
                    <!-- <div class="form-group">
                        <?php echo e(Form::label('slug', __('Slug'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::text('slug', null, ['class' => 'form-control ', 'placeholder' => 'Enter slug', 'required' => 'required']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('short_description', __('Short Description'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::textarea('short_description', null, ['class' => 'form-control ', 'placeholder' => 'Enter short description', 'required' => 'required']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::textarea('description', null, ['class' => 'form-control ', 'placeholder' => 'Enter description', 'required' => 'required']); ?>

                    </div> -->
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="<?php echo e(route('fooditemscategory.index')); ?>" class="btn btn-secondary "><?php echo e(__('Cancel')); ?></a>
                        <button type="submit" class="btn btn-primary "><?php echo e(__('Save')); ?> </button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascript'); ?>
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "<?php echo e(route('ckeditor.upload', ['_token' => csrf_token()])); ?>",
            filebrowserUploadMethod: 'form'
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/foods_category/create.blade.php ENDPATH**/ ?>