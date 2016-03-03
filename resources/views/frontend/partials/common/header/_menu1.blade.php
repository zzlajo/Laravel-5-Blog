<div class="shop-menu pull-right">
    <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                {{Auth::check() ? Auth::user()->name : 'Account' }}
            </a>
            @if(Auth::check())
            <ul class="dropdown-menu">
                <li class="users-list">
                    <a href="{{ URL::route('user.profile') }}">Profile</a>
                </li>
                <li class="users-listist">
                    <a href="{{ URL::route('user.blogs', Auth::user()->name) }}">My blogs</a>
                </li>
            </ul>
            @endif
        </li>
        <li><a href="{{Auth::check() ? url('auth/logout') : url('auth/login')}}"><i class="fa fa-lock"></i>{{Auth::check() ? 'Logout' : 'Login' }}</a></li>
    </ul>
</div>
