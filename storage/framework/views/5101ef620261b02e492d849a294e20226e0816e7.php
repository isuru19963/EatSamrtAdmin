<?php
use Carbon\Carbon;
$users = \Auth::user();
$currantLang = $users->currentLanguage();
?>

<?php $__env->startSection('title', __(' User Stats Summary')); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/jqvmap/dist/jqvmap.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__(' User Stats Summary')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="section-header-breadcrumb"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-xl-6 col-12">
           
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-b-20 text-muted"><?php echo e(__('New Users Since Last week')); ?></h5>
                                    <h3 class=""><?php echo e($user); ?></h3>
                                </div>
                                &nbsp
                                <div class="col-auto">
                                    <i class="ti ti-user bg-primary text-white text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
              
            </div>

            <div class="col-xl-6 col-6">
            

                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-20 text-muted"><?php echo e(__('Total Users')); ?></h6>
                                    <h3 class=""><?php echo e($total_user); ?></h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-users bg-primary text-white text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
  
            </div>

        </div>



        <div class="row">
                <div class="col-xl-6 col-6">
                    
                    <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-20 text-muted"><?php echo e(__('Users on Android')); ?></h6>
                                    <h3 class=""><?php echo e($android_users); ?></h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-currency-dollar bg-warning text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="col-xl-6 col-6">
            

            <div class="card comp-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-b-20 text-muted"><?php echo e(__('Users on iOS')); ?></h6>
                                    <h3 class=""><?php echo e($ios_users); ?></h3>
                                </div>
                                <div class="col-auto">
                                    <i class="ti ti-shield-check bg-warning text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
  
            </div>

        </div>



        
    </div>

    <div class="col-auto" hidden>
    <?php echo e($plan); ?>

                                </div>





<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>

   
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/dashboard/home.blade.php ENDPATH**/ ?>