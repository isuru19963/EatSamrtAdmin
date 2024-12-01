<?php $__env->startSection('title', __('Edit Article')); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Edit Article')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo e(route('blogs.index')); ?>"><?php echo e(__('Articles')); ?></a>
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
                    <h5><?php echo e(__('Edit Article')); ?></h5>
                </div>
                <div class="card-body">
                <form action="<?php echo e(route('article.updatedata',$articles->id)); ?>" id="message-submit-form" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold"><?php echo app('translator')->get('Title'); ?> *</label>
                                    <textarea  name="title" id="title" class="form-control"  rows="2" ><?php echo e($articles->title); ?></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold"><?php echo app('translator')->get('keywords'); ?> *</label>
                                    <textarea  name="keywords" id="title" class="form-control"  rows="2" placeholder="<?php echo app('translator')->get('smoke,cricket,exercise'); ?>"><?php echo e($articles->keywords); ?></textarea>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold"><?php echo app('translator')->get('Description'); ?> *</label>
                                    <textarea  name="description" rows="10" class="form-control tinymce" placeholder="<?php echo app('translator')->get('Your message'); ?>" ><?php echo e($articles->description); ?></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="font-weight-bold"><?php echo app('translator')->get('Reference'); ?> *</label>
                                    <textarea  name="reference" rows="10" class="form-control tinymce" placeholder="<?php echo app('translator')->get('Your message'); ?>" ><?php echo e($articles->short_description); ?></textarea>
                                </div>

                                
                              
                            

                               
                            </div>
                        </div>
                    </div>

                    <div class="card-footer" hidden>
                        <button type="submit" id="form_submit_btn" class="btn btn--primary btn-block"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
                 
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="<?php echo e(route('blogs.index')); ?>" class="btn btn-secondary "><?php echo e(__('Cancel')); ?></a>
                        <button id="message-submit" class="btn btn-primary "><?php echo e(__('Save')); ?> </button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascript'); ?>
<script>

'use strict';
$(document).ready(function () {
    $("#message-submit").click(function (e) {
        e.preventDefault();
        var validFunction = true;
        if (validFunction) {
            $('#form_submit_btn').trigger('click');
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/articles/edit.blade.php ENDPATH**/ ?>