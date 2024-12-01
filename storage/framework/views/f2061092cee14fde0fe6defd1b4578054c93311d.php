<?php
$lang = \App\Facades\UtilityFacades::getValByName('default_language');
$primary_color = \App\Facades\UtilityFacades::getsettings('color');
if (isset($primary_color)) {
    $color = $primary_color;
} else {
    $color = 'theme-4';
}
?>

<?php $__env->startSection('title', __('Settings')); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h4 class="m-b-10"><?php echo e(__('Settings')); ?></h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><?php echo e(__('Settings')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1" class="list-group-item list-group-item-action"><?php echo e(__('App Setting')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-2"
                                class="list-group-item list-group-item-action"><?php echo e(__('General Setting')); ?><div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-3"
                                class="list-group-item list-group-item-action"><?php echo e(__('Storage Setting')); ?><div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-4" class="list-group-item list-group-item-action"><?php echo e(__('Email Setting')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <a href="#useradd-5" class="list-group-item list-group-item-action"><?php echo e(__('Chat Setting')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <!-- <?php if(\Auth::user()->type == 'Super Admin'): ?>

                            <a href="#useradd-6" class="list-group-item list-group-item-action"><?php echo e(__('Stripe Setting')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div>
                            </a>
                            <?php endif; ?> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="">
                        <form id="setting-form" action="<?php echo e(route('settings/app-name/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h5> <?php echo e(__('App Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label"><?php echo e(__('App application name')); ?>

                                                </label>
                                                <input type="text" name="app_name" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('app_name')); ?>"
                                                    placeholder="<?php echo e(__('App application name')); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-logo"
                                                    class=" img-responsive my-5 w-50 justify-content-center text-center"
                                                    src="<?php echo e(Utility::getpath('logo/app-logo.png')); ?>" alt="App_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="form-label"><?php echo e(__('Select Logo')); ?></label>
                                                <input type="file" name="app_logo" class="form-control"
                                                    value="Select Logo">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class=" img-responsive my-5 w-50 justify-content-center text-center"
                                                    src="<?php echo e(Utility::getpath('logo/app-dark-logo.png')); ?>"
                                                    alt="App_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Select Dark Logo')); ?></label>
                                                <input type="file" name="app_dark_logo" class="form-control"
                                                    value="Select Dark Logo">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class="img-responsive my-5 justify-content-center text-center"
                                                    src="<?php echo e(Utility::getpath('logo/app-favicon-logo.png')); ?>"
                                                    style="width:10%;" alt="favicon_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Select favicon Logo')); ?></label>
                                                <input type="file" name="favicon_logo" class="form-control"
                                                    value="Select Favicon Logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-end">
                                        <button class="btn btn-primary  ml-2" type="submit"
                                            id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="useradd-2" class="">
                        <form id="setting-form" action="<?php echo e(route('settings/auth-settings/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h5> <?php echo e(__('General Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <strong
                                                        class="d-block"><?php echo e(__('Two Factor Authentication')); ?></strong>
                                                    <?php echo e(!Utility::getsettings('2fa') ? 'Activate' : 'Deactivate'); ?>

                                                    <?php echo e(__('Two Factor Authentication')); ?>

                                                </div>
                                                <div class="col-md-4 form-check form-switch custom-switch-v1">
                                                    <label class="custom-switch mt-2  form-label custom-left float-end">
                                                        <input name="two_factor_auth" class="form-check-input input-primary"
                                                            type="checkbox"
                                                            <?php echo e(Utility::getsettings('2fa') ? 'checked' : 'unchecked'); ?>>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <strong class="d-block"><?php echo e(__('RTL Setting')); ?></strong>
                                                    <?php echo e(Utility::getsettings('rtl') == '0' ? __('Activate') : __('Deactivate')); ?>

                                                    <?php echo e(__('RTL setting for application.')); ?>

                                                </div>
                                                <div class="col-md-4 form-check form-switch custom-switch-v1">
                                                    <label class="custom-switch mt-2 float-right">
                                                        <input type="checkbox" data-onstyle="primary"
                                                            class="form-check-input input-primary" name="rtl_setting"
                                                            id="site_rtl"
                                                            <?php echo e(Utility::getsettings('rtl') == '1' ? 'checked="checked"' : ''); ?>>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex row ">
                                                <div class="col-md-8">
                                                    <strong class="d-block"><?php echo e(__('Dark Layout')); ?></strong>
                                                    <?php echo e(!Utility::getsettings('on') ? __('Deactivate') : __('Activate')); ?>

                                                    <?php echo e(__('Dark mode for application.')); ?>

                                                </div>
                                                <div class="col-md-4 form-check rtl-hide form-switch custom-switch-v1">
                                                    <label
                                                        class="custom-switch form-check-label mt-2 custom-left float-end">
                                                        <input type="checkbox" data-onstyle="primary"
                                                            class="form-check-input input-primary" id="cust-darklayout"
                                                            name="dark_mode"
                                                            <?php if(\App\Facades\UtilityFacades::getsettings('dark_mode') == 'on'): ?> checked <?php endif; ?> />
                                                    </label>
                                                </div>
                                            </div>
                                            <?php if(!extension_loaded('imagick')): ?>
                                                <small>
                                                    <?php echo e(__('Note: for 2FA your server must have Imagick.')); ?>

                                                    <a href="https://www.php.net/manual/en/book.imagick.php"
                                                        target="_new"><?php echo e(__('Imagick Document')); ?></a>
                                                </small>
                                            <?php endif; ?>

                                            <div class="form-group align-items-center" style="display: flex;">
                                                <div class="col-md-8">
                                                    <strong class="d-block"
                                                        style="margin-left: -15px;"><?php echo e(__('Primary color settings')); ?>

                                                    </strong>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="theme-color themes-color float-end">
                                                        <a href="#!"
                                                            class="<?php echo e($color == 'theme-1' ? 'active_color' : ''); ?>"
                                                            data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                        <input type="radio" class="theme_color " name="color"
                                                            value="theme-1" style="display: none;">
                                                        <a href="#!"
                                                            class="<?php echo e($color == 'theme-2' ? 'active_color' : ''); ?>"
                                                            data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                        <input type="radio" class="theme_color" name="color"
                                                            value="theme-2" style="display: none;">
                                                        <a href="#!"
                                                            class="<?php echo e($color == 'theme-3' ? 'active_color' : ''); ?>"
                                                            data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                        <input type="radio" class="theme_color" name="color"
                                                            value="theme-3" style="display: none;">
                                                        <a href="#!"
                                                            class="<?php echo e($color == 'theme-4' ? 'active_color' : ''); ?>"
                                                            data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                        <input type="radio" class="theme_color" name="color"
                                                            value="theme-4" style="display: none;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="form-label"><?php echo e(__('Default Language')); ?></label>
                                        <select class="form-select" data-trigger name="choices-single-default"
                                            id="choices-single-default"
                                            placeholder="<?php echo e(__('This is a search placeholder')); ?>">
                                            <?php $__currentLoopData = \App\Facades\UtilityFacades::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($lang == $language): ?> selected <?php endif; ?>
                                                    value="<?php echo e($language); ?>">
                                                    <?php echo e(Str::upper($language)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_format" class="form-label"><?php echo e(__('Date Format')); ?></label>
                                        <select name="date_format" class="form-select">
                                            <option value="M j, Y"
                                                <?php echo e(Utility::getsettings('date_format') == 'M j, Y' ? 'selected' : ''); ?>>
                                                <?php echo e(__('Jan 1, 2020')); ?></option>
                                            <option value="d-M-y"
                                                <?php echo e(Utility::getsettings('date_format') == 'd-M-y' ? 'selected' : ''); ?>>
                                                <?php echo e(__('01-Jan-20')); ?></option>
                                        </select>
                                    </div>
                                    <!-- <?php if(\Auth::user()->type == 'Super Admin'): ?>
                                        <div class="form-group">
                                            <label for="name"
                                                class="form-label"><?php echo e(__('Approved Domain Request')); ?></label>
                                            <select name="approve_type" class="form-select">
                                                <option value="Manually"
                                                    <?php echo e(Utility::getsettings('approve_type') == 'Manually' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('Manually')); ?></option>
                                                <option value="Auto"
                                                    <?php echo e(Utility::getsettings('approve_type') == 'Auto' ? 'selected' : ''); ?>>
                                                    <?php echo e(__('Auto')); ?></option>
                                            </select>
                                        </div>
                                    <?php endif; ?> -->
                                    <div class="form-group">
                                        <label for="time_format" class="form-label"><?php echo e(__('Time Format')); ?></label>
                                        <select name="time_format" class="form-select">
                                            <option value="g:i A"
                                                <?php echo e(Utility::getsettings('time_format') == 'g:i A' ? 'selected' : ''); ?>>
                                                <?php echo e(__('hh:mm AM/PM')); ?></option>
                                            <option value="H:i:s"
                                                <?php echo e(Utility::getsettings('time_format') == 'H:i:s' ? 'selected' : ''); ?>>
                                                <?php echo e(__('HH:mm:ss')); ?></option>
                                        </select>
                                    </div>
                                    <!-- <?php if(\Auth::user()->type == 'Super Admin'): ?>
                                        <div class="form-group">
                                            <label for="name" class="form-label"><?php echo e(__('Currency Name')); ?></label>
                                            <input type="text" name="currency" class="form-control"
                                                value="<?php echo e(Utility::getsettings('currency')); ?>" required
                                                placeholder="<?php echo e(__('Currency name')); ?>">
                                            <p><?php echo e(__('The name of currency is to be taken frome this document.')); ?>

                                                <a href="https://stripe.com/docs/currencies" class="m-2"
                                                    target="_blank"><?php echo e(__('Document')); ?></a>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="form-labell"><?php echo e(__('Currency Symbol')); ?></label>
                                            <input type="text" name="currency_symbol" class="form-control"
                                                value="<?php echo e(Utility::getsettings('currency_symbol')); ?>" required
                                                placeholder="<?php echo e(__('currency Symbol')); ?>">
                                        </div>
                                    <?php endif; ?> -->
                                </div>
                                <div class="card-footer">
                                    <div class="float-end">
                                        <button class="btn btn-primary " type="submit"
                                            id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div id="useradd-3" class="">
                        <form id="setting-form" action="<?php echo e(route('settings/s3-setting/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h5> <?php echo e(__('Storage Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="status_toggle" class="form-label mr-2"><?php echo e(__('Local')); ?></label>
                                            <label class="form-switch   custom-switch-v1 col-3 mt-2 "
                                                style="margin-bottom: 12px !important;">
                                                <input name="settingtype"
                                                    class="form-check-input input-primary pl-2 m-auto" type="radio"
                                                    data-toggle="switchbutton" data-onstyle="primary" value="local"
                                                    <?php echo e(Utility::getsettings('settingtype') == 'local' ? 'checked' : 'unchecked'); ?>>
                                            </label>
                                            <label for="status_toggle"
                                                class="form-label mr-2"><?php echo e(__('S3 setting')); ?></label>
                                            <label class="form-switch   custom-switch-v1 col-3 mt-2 "
                                                style="margin-bottom: 12px !important;">
                                                <input name="settingtype"
                                                    class="form-check-input input-primary pl-2 m-auto" type="radio"
                                                    data-toggle="switchbutton" data-onstyle="primary" value="s3"
                                                    <?php echo e(Utility::getsettings('settingtype') == 's3' ? 'checked' : 'unchecked'); ?>>
                                            </label>
                                        </div>
                                        <div id="s3"
                                            class="desc <?php echo e(Utility::getsettings('settingtype') == 's3' ? 'block' : 'd-none'); ?>">
                                            <div class=" row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="s3_key"
                                                            class="form-label"><?php echo e(__('S3 Key')); ?></label>
                                                        <input type="text" name="s3_key" class="form-control"
                                                            value="<?php echo e(Utility::getsettings('s3_key')); ?>"
                                                            placeholder="<?php echo e(__('S3 Key')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="s3_secret"
                                                            class="form-label"><?php echo e(__('S3 Secret')); ?></label>
                                                        <input type="text" name="s3_secret" class="form-control"
                                                            value="<?php echo e(Utility::getsettings('s3_secret')); ?>"
                                                            placeholder="<?php echo e(__('S3 Secret')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="s3_region"
                                                            class="form-label"><?php echo e(__('S3 Region')); ?></label>
                                                        <input type="text" name="s3_region" class="form-control"
                                                            value="<?php echo e(Utility::getsettings('s3_region')); ?>"
                                                            placeholder="<?php echo e(__('S3 Region')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="s3_bucket"
                                                            class="form-label"><?php echo e(__('S3 Bucket')); ?></label>
                                                        <input type="text" name="s3_bucket" class="form-control"
                                                            value="<?php echo e(Utility::getsettings('s3_bucket')); ?>"
                                                            placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="s3_url"
                                                            class="form-label"><?php echo e(__('S3 URL')); ?></label>
                                                        <input type="text" name="s3_url" class="form-control"
                                                            value="<?php echo e(Utility::getsettings('s3_url')); ?>"
                                                            placeholder="<?php echo e(__('S3 URL')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="s3_endpoint"
                                                            class="form-label"><?php echo e(__('S3 Endpoint')); ?></label>
                                                        <input type="text" name="s3_endpoint" class="form-control"
                                                            value="<?php echo e(Utility::getsettings('s3_endpoint')); ?>"
                                                            placeholder="<?php echo e(__('S3 Endpoint')); ?>">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-end">
                                        <button class="btn btn-primary " type="submit"
                                            id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="useradd-4" class="">
                        <form id="setting-form" action="<?php echo e(route('settings/email-setting/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h5> <?php echo e(__('Email Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label"><?php echo e(__('Mail Mailer')); ?></label>
                                                <input type="text" name="mail_mailer" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_mailer')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Mailer')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label"><?php echo e(__('Mail Host')); ?></label>
                                                <input type="text" name="mail_host" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_host')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Host')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label"><?php echo e(__('Mail Port')); ?></label>
                                                <input type="text" name="mail_port" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_port')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Port')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Mail Username')); ?></label>
                                                <input type="email" name="mail_username" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_username')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Username')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Mail Password')); ?></label>
                                                <input type="password" name="mail_password" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_password')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Password')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Mail Encryption')); ?></label>
                                                <input type="text" name="mail_encryption" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_encryption')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Encryption')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Mail From Address')); ?></label>
                                                <input type="text" name="mail_from_address" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_from_address')); ?>" required
                                                    placeholder="<?php echo e(__('Mail From Address')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Mail From Name')); ?></label>
                                                <input type="text" name="mail_from_name" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_from_name')); ?>" required
                                                    placeholder="<?php echo e(__('Mail From Name')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-end">
                                        <input type="hidden" name="tenant_id" value="<?php echo e(tenant('id')); ?>">
                                        <a class="btn btn-info send_mail d-inline" href="javascript:void(0);"
                                            id="test-mail" data-action="<?php echo e(route('test.mail')); ?>">
                                            <?php echo e(__('Send Test Mail')); ?></a>
                                        <button class="btn btn-primary " type="submit"
                                            id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="useradd-5" class="">
                        <form id="setting-form" action="<?php echo e(route('settings/pusher-setting/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h5> <?php echo e(__('Chat Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Pusher App ID')); ?></label>
                                                <input type="text" name="pusher_id" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_id')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher App ID')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label"><?php echo e(__('Pusher Key')); ?></label>
                                                <input type="text" name="pusher_key" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_key')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher Key')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Pusher Secret')); ?></label>
                                                <input type="text" name="pusher_secret" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_secret')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher Secret')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Pusher Cluster')); ?></label>
                                                <input type="text" name="pusher_cluster" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_cluster')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher Cluster')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label for="status_toggle"
                                                        class="form-label"><?php echo e(__('Status')); ?></label>
                                                </div>
                                                <div class="col-md-4 form-check form-switch custom-switch-v1">
                                                    <label class="custom-switch mt-2 custom-left float-end">
                                                        <input name="pusher_status" class="form-check-input input-primary"
                                                            type="checkbox"
                                                            <?php echo e(Utility::getsettings('pusher_status') ? 'checked' : 'unchecked'); ?>>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-end">
                                        <button class="btn btn-primary " type="submit"
                                            id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!-- <?php if(\Auth::user()->type == 'Super Admin'): ?>

                    <div id="useradd-6" class="">
                        <form id="setting-form" action="<?php echo e(route('settings/stripe-setting/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h5> <?php echo e(__('Stripe Setting')); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name" class="form-label"><?php echo e(__('Stripe Key')); ?></label>
                                                <input type="text" name="stripe_key" class="form-control"
                                                    value="<?php echo e(env('STRIPE_KEY')); ?>" required
                                                    placeholder="<?php echo e(__('Stripe key')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label"><?php echo e(__('Stripe Secret')); ?></label>
                                                <input type="text" name="stripe_secret" class="form-control"
                                                    value="<?php echo e(env('STRIPE_SECRET')); ?>" required
                                                    placeholder="<?php echo e(__('Stripe Secret')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-end">
                                        <input type="hidden" name="tenant_id" value="<?php echo e(tenant('id')); ?>">
                                        <button class="btn btn-primary " type="submit"
                                            id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <?php endif; ?> -->
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
    <script>
        function check_theme(color_val) {
            $('.theme-color').prop('checked', false);
            $('input[value="' + color_val + '"]').prop('checked', true);
        }

        $(document).on('click', "input[name='settingtype']", function() {
            var test = $(this).val();
            if (test == 's3') {
                $("#s3").fadeIn(500);
                $("#s3").removeClass('d-none');
            } else {
                $("#s3").fadeOut(500);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var genericExamples = document.querySelectorAll('[data-trigger]');
            for (i = 0; i < genericExamples.length; ++i) {
                var element = genericExamples[i];
                new Choices(element, {
                    placeholderValue: 'This is a placeholder set in the config',
                    searchPlaceholderValue: 'This is a search placeholder',
                });
            }
        });
    </script>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
    <script>
        $('body').on('click', '.send_mail', function() {
            var action = $(this).data('action');
            var modal = $('#common_modal');
            $.get(action, function(response) {
                modal.find('.modal-title').html('<?php echo e(__('Test Mail')); ?>');
                console.log(modal.find('.modal-body'));
                modal.find('.modal-body').html(response);
                modal.modal('show');
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/settings/main-setting.blade.php ENDPATH**/ ?>