<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    dir="<?php echo e(\App\Facades\UtilityFacades::getsettings('rtl') == '1' ? 'rtl' : ''); ?>">

<head>
    <?php
        $lang = \App\Facades\UtilityFacades::getValByName('default_language');
        $primary_color = \App\Facades\UtilityFacades::getsettings('color');
        if (isset($primary_color)) {
            $color = $primary_color;
        } else {
            $color = 'theme-4';
        }
    ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(Utility::getsettings('app_name')); ?></title>

    <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
 
 <!-- Meta -->


 <!-- Favicon icon -->
 <link rel="icon" href="<?php echo e(asset('vendor/img/favicon.png')); ?>" type="image/x-icon" />

 <!-- font css -->
 <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

 <!-- vendor css -->
 <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/notifier.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
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
 <!-- [ auth-signup ] start -->
 <div class="auth-wrapper auth-v1">
  <div class="bg-auth-side bg-primary"></div>
  <div class="auth-content">

   <div class="row align-items-center justify-content-center text-start">
    <div class="col-xl-6 text-center">

     <?php echo $__env->yieldContent('content'); ?>
     </div>
    </div>
</div>
     <div class="auth-footer" >
         <div class="container-fluid">
              <div class="text-center" >
                    
                   
                                          &nbsp
              
                     
            </div>
             <div class="text-center" >
                    
                   
                                           © <?php echo e(date('Y')); ?> , The Centre for Addiction and Mental Health.  All rights reserved. 
              
                     
            </div>
               <div class="text-center" >
                    
                   
                                          &nbsp
              
                     
            </div>
            
             <div class="row d-flex align-items-center" >
                    <div class="col-6">
                        <?php if(Utility::getsettings('dark_mode') == 'on'): ?>
                        <img src="<?php echo e(asset('assets/images/logos/app-logo.png')); ?>" alt="" class="text-center" style="width: 18%"/>
                        <?php else: ?>
                        <img src="<?php echo e(asset('assets/images/logos/app-logo.png')); ?>" alt="" class="text-center" style="width: 18%" />
    <?php endif; ?>
                    </div>
                    
                    
            </div>
  </div>
  </div>
 </div>
</div>
 <!-- [ auth-signup ] end -->

 <!-- Required Js -->
 



 <script src="<?php echo e(asset('assets/js/vendor-all.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
 <script src="<?php echo e(asset('vendor/modules/jquery.min.js')); ?>"></script>
 <script src="<?php echo e(asset('vendor/modules/popper.js')); ?>"></script>
 <script src="<?php echo e(asset('vendor/modules/tooltip.js')); ?>"></script>
 <script src="<?php echo e(asset('vendor/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
 <script src="<?php echo e(asset('vendor/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
 <script src="<?php echo e(asset('vendor/modules/moment.min.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
 <script src="<?php echo e(asset('assets/js/plugins/notifier.js')); ?>"></script>



    <?php echo $__env->make('layouts.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('javascript'); ?>
 <script>
     feather.replace();
 </script>

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

     // var custsidebrand = document.querySelector("#cust-sidebrand");
     // custsidebrand.addEventListener('click', function () {
     //     if (custsidebrand.checked) {
     //         document.querySelector(".m-header").classList.add("bg-dark");
     //         document.querySelector(".theme-color.brand-color").classList.remove("d-none");
     //     } else {
     //         removeClassByPrefix(document.querySelector(".m-header"), 'bg-');
     //         // document.querySelector(".m-header > .b-brand > .logo-lg").setAttribute('src', '../assets/images/logo-dark.svg');
     //         document.querySelector(".theme-color.brand-color").classList.add("d-none");
     //     }
     // });

     // var brandcolor = document.querySelectorAll(".brand-color > a");
     // for (var t = 0; t < brandcolor.length; t++) {
     //     var c = brandcolor[t];
     //     c.addEventListener('click', function (event) {
     //         var targetElement = event.target;
     //         if (targetElement.tagName == "SPAN") {
     //             targetElement = targetElement.parentNode;
     //         }
     //         var temp = targetElement.getAttribute('data-value');
     //         if (temp == "bg-default") {
     //             removeClassByPrefix(document.querySelector(".m-header"), 'bg-');
     //         } else {
     //             removeClassByPrefix(document.querySelector(".m-header"), 'bg-');
     //             document.querySelector(".m-header > .b-brand > .logo-lg").setAttribute('src', '../assets/images/logo.svg');
     //             document.querySelector(".m-header").classList.add(temp);
     //         }
     //     });
     // }

     // var headercolor = document.querySelectorAll(".header-color > a");
     // for (var h = 0; h < headercolor.length; h++) {
     //     var c = headercolor[h];

     //     c.addEventListener('click', function (event) {
     //         var targetElement = event.target;
     //         if (targetElement.tagName == "SPAN") {
     //             targetElement = targetElement.parentNode;
     //         }
     //         var temp = targetElement.getAttribute('data-value');
     //         if (temp == "bg-default") {
     //             removeClassByPrefix(document.querySelector(".dash-header:not(.dash-mob-header)"), 'bg-');
     //         } else {
     //             removeClassByPrefix(document.querySelector(".dash-header:not(.dash-mob-header)"), 'bg-');
     //             document.querySelector(".dash-header:not(.dash-mob-header)").classList.add(temp);
     //         }
     //     });
     // }

     // var custside = document.querySelector("#cust-sidebar");
     // custside.addEventListener('click', function () {
     //     if (custside.checked) {
     //         document.querySelector(".dash-sidebar").classList.add("light-sidebar");
     //     } else {
     //         document.querySelector(".dash-sidebar").classList.remove("light-sidebar");
     //     }
     // });

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
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/layouts/app.blade.php ENDPATH**/ ?>