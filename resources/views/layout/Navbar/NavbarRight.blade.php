<ul class="app-nav">
    <li class="app-search">
        <input class="app-search__input" type="search" placeholder="Search">
        <button class="app-search__button"><i class="fa fa-search"></i></button>
    </li>
    
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
            aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
        <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 1 new notifications.</li>
            <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                                    class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                        <div>
                            <p class="app-notification__message">Lisa sent you a mail</p>
                            <p class="app-notification__meta">2 min ago</p>
                        </div>
                    </a>
                </li>
                </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
        </ul>
    </li>

    <!-- User Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
            aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="{{URL::to('/logoutAdmin.html')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
    </li>
</ul>
