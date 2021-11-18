<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin') }}" class="@menuactive('admin') nav-link">
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
        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="@menuactive('categories*') nav-link">
            <i class="nav-icon ion ion-bag"></i>
                <p>Категории</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="@menuactive('products*') nav-link">
            <i class="nav-icon ion ion-bag"></i>
                <p>Продукты</p>
            </a>
        </li>
    </ul>
</nav>