<ul class="nav navbar-nav collapse navbar-collapse">
    <li><a href="{{ URL::route('home') }}" {{ Request::is('/') ? ' class=active' : '' }} >@lang('app.mainMenu.home')</a></li>
    <li><a href="{{ URL::route('resume') }}"  {{ Request::is('resume') ? ' class=active' : '' }}>@lang('app.mainMenu.resume')</a></li>
    <li><a href="{{ URL::route('blog.index') }}" {{ Request::segment(1) == 'blog' ? ' class=active' : '' }}>@lang('app.mainMenu.blog')</a></li>
    <li><a href="{{ URL::route('works.index') }}" {{ Request::segment(1) == 'works' ? ' class=active' : '' }}>@lang('app.mainMenu.work')</a></li>
    <li><a href="{{ URL::route('contact') }}" {{ Request::is('contact') ? ' class=active' : '' }}>@lang('app.mainMenu.contact')</a></li>
</ul>

