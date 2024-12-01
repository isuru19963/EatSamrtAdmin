<?php $__env->startSection('title', __('Email verify')); ?>

<?php $__env->startSection('content'); ?>
  <div class="mx-3 mx-md-5 mb-5" style="margin-top:95px;">
        <img src="<?php echo e(asset('assets/images/logos/app-logo.png')); ?>" alt="logo" class="app-logo mt-5" width="400">
    </div>
    <div class="card">
        <div class="card-body mx-auto">
            <div class="">
                <h4 class="text-primary mt-2 mb-3"><?php echo e(__('Forgot Password')); ?></h4>
                <p class="text-muted text-center"><?php echo e(__('We will send a link to reset your password')); ?></p>
            </div>
            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-3">
                    <label class="form-label" for="email"><?php echo e(__('Email')); ?></label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                        autocomplete="email" autofocus>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Forgot Password')); ?></button>
                    <a href="<?php echo e(url('/home')); ?>" class="btn btn-secondary"><?php echo e(__('Back')); ?></a>
                </div>
            </form>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/zgxmd707/newadmin.giphi.ca/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>