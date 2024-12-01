<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    dir="<?php echo e(\App\Facades\UtilityFacades::getsettings('rtl') == '1' ? 'rtl' : ''); ?>">

<head>
    <?php
        $primary_color = \App\Facades\UtilityFacades::getsettings('color');
        if (isset($primary_color)) {
            $color = $primary_color;
        } else {
            $color = 'theme-1';
        }
    ?>
    <!--<title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(Utility::getsettings('app_name')); ?></title>-->
        <title>START | GIPHI Inc.</title>
    

      <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e(asset('vendor/img/favicon.png')); ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/notifier.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/modules/summernote/summernote-bs4.css')); ?>">


    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <?php if(Utility::getsettings('rtl') == '1'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php else: ?>
        <?php if(Utility::getsettings('dark_mode') == 'on'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
        <?php endif; ?>
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/custom.css')); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>

</head>

<body class="<?php echo e($color); ?>">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ Mobile header ] start -->
    <div class="dash-mob-header dash-header">
        <div class="pcm-logo">
            <img src="<?php echo e(asset('vendor/img/tenancy-white.png')); ?>" alt="" class="logo logo-lg" />
        </div>
        <div class="pcm-toolbar">
            <a href="#!" class="dash-head-link" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <!-- <i data-feather="menu"></i> -->
            </a>
            <a href="#!" class="dash-head-link" id="header-collapse">
                <i data-feather="more-vertical"></i>
            </a>
        </div>
    </div>
    <!-- [ Mobile header ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="dash-sidebar light-sidebar transprent-bg">
        <div class="navbar-wrapper">
            <div class="m-header text-center">
                <a href="<?php echo e(route('home')); ?>" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
 <img src="http://localhost/STARTADMIN/assets/images/logos/app-logo.png" alt="" class="logo  w-50" />
                    <?php if(Utility::getsettings('dark_mode') == 'on'): ?>
                    <img src="<?php echo e(Utility::getpath('logo/app-logo.png')); ?>" alt="" class="logo logo-lg w-50" />
                    <?php else: ?>
                    <img src="<?php echo e(Utility::getpath('logo/app-dark-logo.png')); ?>" alt="" class="logo logo-lg w-50" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="navbar-content active dash-trigger">
                <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </nav>
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="dash-container">
    <div class="dash-content" >
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
<div class="modal fade" id="common_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dash.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/notifier.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/modules/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/sweetalert2.all.min.js')); ?>"></script>

<?php echo $__env->make('layouts.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldPushContent('javascript'); ?>

<script src="<?php echo e(asset('assets/js/plugins/bootstrap-switch-button.min.js')); ?>"></script>

<script>
    feather.replace();
    var pctoggle = document.querySelector("#pct-toggler");
    if (pctoggle) {
        pctoggle.addEventListener("click", function() {
            if (
                !document.querySelector(".pct-customizer").classList.contains("active")
            ) {
                document.querySelector(".pct-customizer").classList.add("active");
            } else {
                document.querySelector(".pct-customizer").classList.remove("active");
            }
        });
    }

    var themescolors = document.querySelectorAll(".themes-color > a");
    for (var h = 0; h < themescolors.length; h++) {
        var c = themescolors[h];

        c.addEventListener("click", function(event) {
            var targetElement = event.target;
            if (targetElement.tagName == "SPAN") {
                targetElement = targetElement.parentNode;
            }
            var temp = targetElement.getAttribute("data-value");
            removeClassByPrefix(document.querySelector("body"), "theme-");
            document.querySelector("body").classList.add(temp);
        });
    }


    function removeClassByPrefix(node, prefix) {
        for (let i = 0; i < node.classList.length; i++) {
            let value = node.classList[i];
            if (value.startsWith(prefix)) {
                node.classList.remove(value);
            }
        }
    }
</script>
<?php echo $__env->yieldPushContent('script-lib'); ?>

<!-- <script src="<?php echo e(asset('assets/js/nicEdit.js')); ?>"></script>

<script src="https://cdn.tiny.cloud/1/ufxfne18opjn390023cir42tfu54b3qip3tctuvg0hg5ij0a/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->



<script type="text/javascript">
    (function($,document){
        "use strict";
        // bkLib.onDomLoaded(function() {
        //     $( ".nicEdit" ).each(function( index ) {
        //         $(this).attr("id","nicEditor"+index);
        //         new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        //     });
        // });
        // $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
        //     $('.nicEdit-main').focus();
        // });
        // tinymce.init({
        //     selector: 'textarea.tinymce',
        //     height: 500,
        //     menubar: false,
            
        //     plugins:
        //         'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
        //     toolbar: 'undo redo | blocks fontsize | formatselect | ' +
        //         'bold italic underline link | alignleft aligncenter ' +
        //         'alignright alignjustify | bullist numlist outdent indent | ' +
        //         'removeformat | help',
        //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        // });
    })(jQuery, document);
</script>

<?php echo $__env->yieldPushContent('script'); ?>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/layouts/main.blade.php ENDPATH**/ ?>