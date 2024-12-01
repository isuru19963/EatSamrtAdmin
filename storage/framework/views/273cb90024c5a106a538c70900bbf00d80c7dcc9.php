<section class="footer">
     <div class="auth-footer" >
         <div class="container-fluid">
              <div class="text-center" >
                    
                   
                                          &nbsp
              
                     
            </div>
             <div class="text-center" >
                    
                   
                                           <!--© <?php echo e(date('Y')); ?> , The Centre for Addiction and Mental Health.  All rights reserved. -->
                    © <?php echo e(date('Y')); ?> ,<img src=" https://stopcannabischallenge.ca/storage/avatar/avatar.png" alt="" class="text-center" style="width: 18%"/>
              
                    
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
</section>

<script src="<?php echo e(asset('vendor/modules/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/modules/popper.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/modules/tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/modules/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/notifier.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/wow.min.js')); ?>"></script>
<script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener("scroll", function() {
        let cOst = document.documentElement.scrollTop;
        if (cOst == 0) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
        } else if (cOst > ost) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
            document.querySelector(".navbar").classList.remove("default");
        } else {
            document.querySelector(".navbar").classList.add("default");
            document
                .querySelector(".navbar")
                .classList.remove("top-nav-collapse");
        }
        ost = cOst;
    });
    // End [ Menu hide/show on scroll ]
    var wow = new WOW({
        animateClass: "animate__animated", // animation css class (default is animated)
    });
    wow.init();
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbar-example",
    });
</script>
<?php echo $__env->make('layouts.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/layouts/front_footer.blade.php ENDPATH**/ ?>