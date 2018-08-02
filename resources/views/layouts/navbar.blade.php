<nav class="navbar navbar-inverse navbar-static-top">
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
                <li class="{{ Request::path() == 'shop' ? 'active' : '' }}"><a href="/shop">Shop</a></li>
                <li class="{{ Request::path() == 'checkout' ? 'active' : '' }}"><a href="/checkout">Checkout <span class="badge">{{ (Session::has('cart') && Session::get('cart')->totalQty != 0)? Session::get('cart')->totalQty : ''}}</span></a></a></li>
                <li class="{{ (Request::path() == 'adminView' || Request::path() == 'login') ? 'active' : '' }}"><a href="/admin">Admin</a></li>
        </ul>
    </div>
</nav>