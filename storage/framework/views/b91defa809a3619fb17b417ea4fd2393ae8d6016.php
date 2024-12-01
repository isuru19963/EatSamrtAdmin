<?php $__env->startSection('title', __('Create Blog')); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Badge')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('blogs.index')); ?>"><?php echo e(__('Foods')); ?></a>
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
                    <h5><?php echo e(__('Create Food')); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo Form::open(['route' => 'fooditems.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter food name', 'required' => 'required']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter food description', 'required' => 'required']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('photo', __('Image'), ['class' => 'form-label'])); ?> *
                        <input name="photo" type="file" id="photo" class="form-control">
                    </div>
                 
                    <div class="form-group">
                        <?php echo e(Form::label('time', __('Categories'), ['class' => 'form-label'])); ?> *

                       
                           
                            <select class="form-control" name="category" value="0.00" placeholder="<?php echo app('translator')->get('Click here'); ?>" required>
                                <option disabled selected><?php echo app('translator')->get('Click here'); ?></option>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($option1['id']); ?>" <?php echo e(old('category') == $option1['id'] ? 'selected' : ''); ?>}}><?php echo e($option1['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
             
                    </div>

                    <div class="form-group">
                        <?php echo e(Form::label('time', __('Vendors'), ['class' => 'form-label'])); ?> *

                       
                           
                            <select class="form-control" name="vendor_id" value="0.00" placeholder="<?php echo app('translator')->get('Click here'); ?>" required>
                                <option disabled selected><?php echo app('translator')->get('Click here'); ?></option>
                                <?php $__currentLoopData = $badge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($option2['id']); ?>" <?php echo e(old('vendor_id') == $option2['id'] ? 'selected' : ''); ?>><?php echo e($option2['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
             
                    </div>

                    <div class="form-group">
                        <?php echo e(Form::label('price', __('Price'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::text('price', null, ['class' => 'form-control ', 'placeholder' => 'Enter food Price', 'required' => 'required']); ?>

                    </div>

                    <?php
                        $optionss = ['Monday','Tuesday','Wednesday','Thursday',
                        'Friday','Saturday', 'Sunday'];
                    ?>
                    
                   
                   <!--   <div class="form-group">
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
    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "<?php echo e(route('ckeditor.upload', ['_token' => csrf_token()])); ?>",
            filebrowserUploadMethod: 'form'
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/foods/create.blade.php ENDPATH**/ ?>