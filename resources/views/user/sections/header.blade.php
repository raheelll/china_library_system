<div class="header">
    <div class="container">
        <div class="logo"> <a href="{{ session()->has('page.public_books')? session('page.public_books') : url('/') }}"><img src="{{  asset('/img/logo.png') }}" alt="{{ config('app.site_name') }}" width="130"></a> </div>
        <div class="menu"> <a class="toggleMenu" href="#"><img src="{{  asset('img/nav_icon.png') }}" alt="" /> </a>
            <ul class="nav" id="nav">
                <li class="{{ Request::is( '/') ? 'current' : '' }}"><a href="{{ session()->has('page.public_books')? session('page.public_books') : url('/') }}">Books</a></li>
                <li class="{{ Request::is( 'about-us') ? 'current' : '' }}"><a href="{{ url('about-us') }}">About Us</a></li>

                <li class="{{ Request::is( 'services') ? 'current' : '' }}"><a href="{{ url('services') }}">Services</a></li>
                <li class="{{ Request::is( 'winners') ? 'current' : '' }}"><a href="{{ url('winners') }}">Winners</a></li>
                <li class="{{ Request::is( 'jobs') ? 'current' : '' }}"><a href="{{ url('jobs') }}">Jobs</a></li>
                @if(!empty($logged_in_user))
                    <li class="bgGrey">
                        @if($logged_in_user['role']['slug'] != 'customer')
                            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ url('dashboard') }}">Dashboard</a>
                        @endif
                    </li>
                    <li><a href="{{ url('logout') }}">Logout</a></li>
                @else
                    <li class="{{ Request::is( 'login') || Request::is( 'forgot') ? 'current' : '' }}">
                        <a href="{{ url('login') }}">Login</a>
                    </li>
                @endif
                <div class="clear"></div>
            </ul>
        </div>
        <div class="clearfix"> </div>
        <div class="menu fontWeightBold">
            <span>
            @if(!empty($logged_in_user))
            Welcome {{$logged_in_user['first_name'] .' '. $logged_in_user['last_name']}}!
            @endif
            &nbsp;
            </span>
        </div>
    </div>
</div>