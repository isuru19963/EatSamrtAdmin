@php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
@endphp

<ul class="dash-navbar">
    <li class="dash-item dash-hasmenu {{ request()->is('home*') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="dash-link"><span class="dash-micon"><i
                    class="ti ti-home"></i></span><span class="dash-mtext">{{ __('User Stats Summary') }}</span> </a>
    </li>

    @if ($users->type == 'Super Admin' || $users->type == 'Admin' || $users->type == 'Analyst')
            

            <li class="dash-item dash-hasmenu {{ request()->is('admins*') ? 'active' : '' }}">
                <a href="{{ route('admins.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('System Users') }}</span> </a>
            </li>
            <li class="dash-item dash-hasmenu ">
                <a href="{{ route('users.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Customers') }}</span> </a>
            </li>
            <li class="dash-item dash-hasmenu ">
                <a href="{{ route('vendors.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Vendors') }}</span> </a>
            </li>
            <li class="dash-item dash-hasmenu {{ request()->is('orders*') ? 'active' : '' }}">
                <a href="{{ route('allOrders.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Orders') }}</span> </a>
            </li>

            <li class="dash-item dash-hasmenu {{ request()->is('foods*') ? 'active' : '' }}">
                <a href="{{ route('fooditems.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Food Items') }}</span> </a>
            </li>

              <li class="dash-item dash-hasmenu {{ request()->is('category*') ? 'active' : '' }}">
                <a href="{{ route('fooditemscategory.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Foods Category') }}</span> </a>
            </li>
            <li class="dash-item dash-hasmenu {{ request()->is('exersice*') ? 'active' : '' }}">
                <a href="{{ route('allExersices.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('All Exersice') }}</span> </a>
            </li>

    
            
            <li class="dash-item dash-hasmenu {{ request()->is('pages*') ? 'active' : '' }}">
                <a href="{{ route('blogs.index') }}" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Privacy and Terms') }}</span> </a>
            </li>
            <li class="dash-item dash-hasmenu {{ request()->is('settings*') ? 'active' : '' }}">
            <a href="{{ route('settings') }}" class="dash-link"><span class="dash-micon"><i
                        class="ti ti-settings"></i></span><span class="dash-mtext">{{ __('System Settings') }}</span> </a>
        </li>
       
           


          

           
            
      

          

         
            <li class="dash-item dash-hasmenu {{ request()->is('achallenge*') ? 'active' : '' }}">
                <a href="javascript:void(0)"  onclick="document.getElementById('logout-form').submit()" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-user"></i></span><span class="dash-mtext">{{ __('Logout') }}</span> </a>
            </li>
        @else
    
        @endif
 
</ul>
