<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{ url('home')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-photo"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                <i class="app-menu__icon fa fa-product-hunt"></i>
                <span class="app-menu__label">Products</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.suppliers.index' ? 'active' : '' }}" href="{{ route('admin.suppliers.index') }}">
                <i class="app-menu__icon fa fa-user-circle"></i>
                <span class="app-menu__label">Suppliers</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.customers.index' ? 'active' : '' }}" href="{{ route('admin.customers.index') }}">
                <i class="app-menu__icon fa fa-user-times"></i>
                <span class="app-menu__label">Customers</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.reports.stock' ? 'active' : '' }}" href="{{ route('admin.reports.stock') }}">
                <i class="app-menu__icon fa fa-stack-exchange"></i>
                <span class="app-menu__label">Stocks</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.purchase.index' ? 'active' : '' }}" href="{{ route('admin.purchase.index') }}">
                <i class="app-menu__icon fa fa-product-hunt"></i>
                <span class="app-menu__label">Purchase</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.sell.index' ? 'active' : '' }}" href="{{ route('admin.sell.index') }}">
                <i class="app-menu__icon fa fa-battery-full"></i>
                <span class="app-menu__label">Stock Out</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.return.index' ? 'active' : '' }}" href="{{ route('admin.return.index') }}">
                <i class="app-menu__icon fa fa-backward"></i>
                <span class="app-menu__label">Return</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
