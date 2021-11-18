<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin') }}" class="@menuactive('user') nav-link">
            <i class="nav-icon ion ion-bag"></i>
                <p>Главная</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders') }}" class="@menuactive('admin.order*') nav-link">
            <i class="nav-icon ion ion-bag"></i>
                <p>Заказы</p>
            </a>
        </li>
    </ul>
</nav>