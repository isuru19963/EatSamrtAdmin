<?php $__env->startSection('title', __('Login')); ?>

<?php $__env->startSection('content'); ?>
    <div class="mx-3 mx-md-5 mb-5" style="margin-top:95px;">
        <img src="<?php echo e(asset('assets/images/logos/app-logo.png')); ?>" alt="logo" class="app-logo mt-5" width="400">
    </div>
    <div class="card">
        <div class="card-body mx-auto">
            <div class="">
                <h4 class="text-primary mt-2 mb-3"><?php echo e(__('Sign in')); ?></h4>
            </div>
            <div class="text-start">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label"><?php echo e(__('E-Mail Address')); ?></label>
                        <input id="email" type="email" class="form-control" placeholder="<?php echo e(__('Email address')); ?>" name="email" tabindex="1" required
                            autocomplete="email" autofocus>
                        <div class="float-end ">
                            <?php if(Route::has('password.request')): ?>
                                <a class="btn" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="d-block">
                            <label for="password" class="form-label"><?php echo e(__('Password')); ?></label>
                        </div>
                        <input id="password" type="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>" name="password" tabindex="2" required
                            autocomplete="current-password">
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check form-switch">
                            <input type="checkbox" name="remember" class="form-check-input" id="customswitch1">
                            <label class="form-check-label" for="remember"><?php echo e(__('Remember me')); ?></label>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary  btn-block mt-2"
                            tabindex="4"><?php echo e(__('Sign In')); ?></button>
                    </div>
                    <div class="mt-4 text-muted text-center">
                       </a>
                    </div>
                </form>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartApp/resources/views/auth/login.blade.php ENDPATH**/ ?>