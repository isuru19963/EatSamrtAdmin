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
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Healthcare Users')); ?></span> </a>
            </li>

            <li class="dash-item dash-hasmenu <?php echo e(request()->is('patients*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('patients.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Clients')); ?></span> </a>
                            
            </li>

            <li class="dash-item dash-hasmenu <?php echo e(request()->is('sessions*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('sessions.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('All Sessions Data')); ?></span> </a>
            </li>
         
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('session1*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('session1.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Session 1')); ?></span> </a>
            </li>

            <li class="dash-item dash-hasmenu <?php echo e(request()->is('session2*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('session2.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Session 2')); ?></span> </a>
            </li>

            <li class="dash-item dash-hasmenu <?php echo e(request()->is('session3*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('session3.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Session 3')); ?></span> </a>
            </li>

            <li class="dash-item dash-hasmenu <?php echo e(request()->is('session4*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('session4.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Session 4')); ?></span> </a>
            </li>
           
             
             <!-- <li class="dash-item dash-hasmenu <?php echo e(request()->is('articles*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('article.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Articles for ChatBot')); ?></span> </a>
            </li> -->
              <li class="dash-item dash-hasmenu <?php echo e(request()->is('motivational*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('motivational-messages.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Motivational Messages')); ?></span> </a>
            </li>
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('pages*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('blogs.index')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Privacy and Terms')); ?></span> </a>
            </li>
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('settings*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('settings')); ?>" class="dash-link"><span class="dash-micon"><i
                        class="ti ti-settings"></i></span><span class="dash-mtext"><?php echo e(__('System Settings')); ?></span> </a>
        </li>
          

            <!--<li class="dash-item dash-hasmenu <?php echo e(request()->is('challenge-request*') ? 'active' : ''); ?>">-->
            <!--    <a href="<?php echo e(route('challenge-request.index')); ?>" class="dash-link"><span class="dash-micon"><i-->
            <!--                class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Challenge Requests')); ?></span> </a>-->
            <!--</li>-->

           

           


          

           
            
      

          

         
            <li class="dash-item dash-hasmenu <?php echo e(request()->is('achallenge*') ? 'active' : ''); ?>">
                <a href="javascript:void(0)"  onclick="document.getElementById('logout-form').submit()" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext"><?php echo e(__('Logout')); ?></span> </a>
            </li>
        <?php else: ?>
    
        <?php endif; ?>
 
</ul>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STARTADMIN/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>