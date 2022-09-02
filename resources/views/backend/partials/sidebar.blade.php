<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{ url('home')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.sliders.index' ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-photo"></i>--}}
{{--                <span class="app-menu__label">Sliders</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.abouts.index' ? 'active' : '' }}" href="{{ route('admin.abouts.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-hand-o-up"></i>--}}
{{--                <span class="app-menu__label">About Content</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.services.index' ? 'active' : '' }}" href="{{ route('admin.services.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-won"></i>--}}
{{--                <span class="app-menu__label">Services</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.packages.index' ? 'active' : '' }}" href="{{ route('admin.packages.index') }}">--}}
{{--                <i class="app-menu__icon fa fa-paperclip"></i>--}}
{{--                <span class="app-menu__label">Packages</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.counters' ? 'active' : '' }}" href="{{ route('admin.counters') }}">--}}
{{--                <i class="app-menu__icon fa fa-cab"></i>--}}
{{--                <span class="app-menu__label">Portfolio</span>--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.contents' ? 'active' : '' }}" href="{{ route('admin.contents') }}">--}}
{{--                <i class="app-menu__icon fa fa-dot-circle-o"></i>--}}
{{--                <span class="app-menu__label">Pages Content</span>--}}
{{--            </a>--}}
{{--        </li>--}}

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
