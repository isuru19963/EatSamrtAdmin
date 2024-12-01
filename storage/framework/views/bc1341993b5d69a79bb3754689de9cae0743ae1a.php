<?php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
?>

<ul class="dash-navbar">
    <li class="dash-item dash-hasmenu <?php echo e(request()->is('home*') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('home')); ?>" class="dash-link"><span class="dash-micon"><i
                    class="ti ti-home"></i></span><span class="dash-mtext"><?php echo e(__('User Stats Summary')); ?></span> </a>
    </li>

    <?php if($users->type == 'Super Admin' || $users->type == 'Admin' || $users->type == 'Analyst'): ?>
            

            <li class="dash-item dash-hasmenu <?php echo e(request()->is('admins*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admins.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('System Users')); ?></span> </a>
            </li>
            <li class="dash-item dash-hasmenu ">
                <a href="<?php echo e(route('users.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Customers')); ?></span> </a>
            </li>
            <li class="dash-item dash-hasmenu ">
                <a href="<?php echo e(route('vendors.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Vendors')); ?></span> </a>
            </li>
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('orders*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('allOrders.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Orders')); ?></span> </a>
            </li>

            <li class="dash-item dash-hasmenu <?php echo e(request()->is('foods*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('fooditems.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Food Items')); ?></span> </a>
            </li>

              <li class="dash-item dash-hasmenu <?php echo e(request()->is('category*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('fooditemscategory.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Foods Category')); ?></span> </a>
            </li>
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('exersice*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('allExersices.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('All Exersice')); ?></span> </a>
            </li>

    
            
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('pages*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('blogs.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Privacy and Terms')); ?></span> </a>
            </li>
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('settings*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('settings')); ?>" class="dash-link"><span class="dash-micon"><i
                        class="ti ti-settings"></i></span><span class="dash-mtext"><?php echo e(__('System Settings')); ?></span> </a>
        </li>
       
           


          

           
            
      

          

         
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('achallenge*') ? 'active' : ''); ?>">
                <a href="javascript:void(0)"  onclick="document.getElementById('logout-form').submit()" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Logout')); ?></span> </a>
            </li>
        <?php else: ?>
    
        <?php endif; ?>
 
</ul>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/EatSmartAdmin/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>