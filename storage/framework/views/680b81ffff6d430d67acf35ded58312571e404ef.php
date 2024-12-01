<?php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
?>
<header class="dash-header transprent-bg">
    <div class="header-wrapper">
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown dash-h-item d-flex d-md-none">
                    <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-search"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dash-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <i data-feather="search"></i>
                                <input type="search" class="form-control border-0 shadow-none"
                                    placeholder="<?php echo e(__('Search here. . .')); ?>" />
                            </div>
                        </form>
                    </div>
                </li>
                <!-- <li class="dropdown dash-h-item drp-language">
                    <a class="dash-head-link custom-headers dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-world nocolor"></i>
                        <span class="drp-text hide-mob"><?php echo e(Str::upper($currantLang)); ?></span>
                        <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                    </a>
                    <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item <?php if($language == $currantLang): ?> text-danger <?php endif; ?>"
                                href="<?php echo e(route('change.language', $language)); ?>"><?php echo e(Str::upper($language)); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li> -->
                <li class="dropdown dash-h-item drp-company">
                    <a class="dash-head-link custom-headers dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <?php if(tenant('id') == null): ?>
                            <!-- <img alt="image"
                                src="<?php echo e(Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png')); ?>"
                                class="user-avtar ms-2"> -->
                        <?php else: ?>
                            <?php if(config('filesystems.default') == 'local'): ?>
                                <!-- <img id="avatar-img" class="user-avtar ms-2"
                                    src="<?php echo e(Auth::user()->avatar? Storage::url(tenant('id') . '/' . Auth::user()->avatar): asset('assets/img/avatar/avatar-1.png')); ?>"
                                    alt="User profile picture"> -->
                            <?php else: ?>
                                <!-- <img id="avatar-img" class="user-avtar ms-2"
                                    src="<?php echo e(Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png')); ?>"
                                    alt="User profile picture"> -->
                            <?php endif; ?>
                        <?php endif; ?>
                        <span>
                            <h6 class="f-w-500 fs-6 d-inline-flex mb-0"><?php echo e(Auth::user()->name); ?></h6>
                        </span>
                        <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                    </a>
                    <div class="dropdown-menu  dash-h-dropdown arrow-none me-0">
                        <a href="<?php echo e(route('profile.index', Auth::user()->id)); ?>" class="dropdown-item">
                            <i class="ti ti-user"></i>
                            <span><?php echo e(__('Profile')); ?></span>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)"
                            onclick="document.getElementById('logout-form').submit()">
                            <i class="ti ti-power"></i>
                            <span> <?php echo e(__('Logout')); ?></span>
                        </a>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form"> <?php echo csrf_field(); ?> </form>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</header>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/layouts/header.blade.php ENDPATH**/ ?>