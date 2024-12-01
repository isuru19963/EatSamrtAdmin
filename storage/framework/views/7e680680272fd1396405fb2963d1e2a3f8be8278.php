<?php $__env->startSection('title', __('Users')); ?>
<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h4 class="m-b-10"><?php echo e(__('Session 1 Data')); ?></h4>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Session 1 Data')); ?>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row card" style="overflow:scroll;background-color:#ffffff;">
   
    <div class="">
        <div class="">
            <div class="card-body">
                <table class=" ">
                    <div class="">
                     <?php echo e($dataTable->table(['class'=>"table table-bordered yajra-datatable",'style'=>"overflow:scroll,background-color:#00FFFF;"])); ?>

                    
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <?php echo $__env->make('layouts.includes.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('javascript'); ?>
    <?php echo $__env->make('layouts.includes.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo e($dataTable->scripts()); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/Session1/index.blade.php ENDPATH**/ ?>