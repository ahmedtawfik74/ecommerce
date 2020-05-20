<header class="app-header mb-5">
    <a class="app-header__logo" href="{{route('products.index')}}">{{ config('app.name') }}</a>
    <ul class="app-nav">
        <li>
            <a class="app-nav__item" href="{{route('products.create')}}"  aria-label="Open Profile Menu">Create Product</a>
        </li>
        <li>
            <a class="app-nav__item" href="{{route('products.index')}}"  aria-label="Open Profile Menu">All Products</a>
        </li>
    </ul>
</header>
