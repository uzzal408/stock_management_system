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


        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
