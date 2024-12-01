<?php $__env->startSection('title', __('Edit Motivational Message')); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Edit Motivational Message')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><a href=""><?php echo e(__('Motivational Message')); ?></a>
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
                    <h5><?php echo e(__('Edit Motivational Message')); ?></h5>
                </div>
                <div class="card-body">
                    <?php echo Form::model($badge, ['route' => ['motivational-messages.update', $badge->id], 'method' => 'Patch', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('title', __('Title'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title', 'required' => 'required']); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('body', __('Body'), ['class' => 'form-label'])); ?> *
                        <?php echo Form::text('body', null, ['class' => 'form-control', 'placeholder' => 'Enter Body', 'required' => 'required']); ?>

                    </div>
                     <?php
                        $optionss = ['Monday','Tuesday','Wednesday','Thursday',
                        'Friday','Saturday', 'Sunday'];
                    ?>
                    
                    <div class="form-group">
                        <?php echo e(Form::label('time', __('Sending Day'), ['class' => 'form-label'])); ?> *

                       
                           
                            <select class="form-control" name="day" value="0.00" placeholder="<?php echo app('translator')->get('Click here'); ?>" required>
                                <option disabled selected><?php echo app('translator')->get('Click here'); ?></option>
                                <?php $__currentLoopData = $optionss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('start_time') == $option ? 'selected' : ''); ?> ><?php echo e($option); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
             
                    </div>
                    <?php
                        $options = ['06:00 AM', '06:30 AM', '07:00 AM', '07:30 AM', '08:00 AM', '08:30 AM', '09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '01:00 PM', '01:30 PM', '02:00 PM', '02:30 PM', '03:00 PM', '03:30 PM', '04:00 PM', '04:30 PM', '05:00 PM', '05:30 PM', '06:00 PM', '06:30 PM', '07:00 PM', '07:30 PM', '08:00 PM', '08:30 PM', '09:00 PM', '09:30 PM'];
                    ?>
                    
                    <div class="form-group">
                        <?php echo e(Form::label('time', __('Sending Time'), ['class' => 'form-label'])); ?> *

                       
                           
                            <select class="form-control" name="start_time" value="0.00" placeholder="<?php echo app('translator')->get('Click here'); ?>" required>
                                <option disabled selected><?php echo app('translator')->get('Click here'); ?></option>
                                <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('start_time') == $option ? 'selected' : ''); ?> ><?php echo e($option); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
             
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/motivational_messages/edit.blade.php ENDPATH**/ ?>