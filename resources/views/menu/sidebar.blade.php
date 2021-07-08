<!-- Sidebar -->
<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner">
        <header class="u-sidebar-header">
            <a class="u-sidebar-logo" href="index.html">
                <img class="" src="{{asset('storage/images/main/LOGO.png')}}" width="50px" height="55px" alt="WillieScant">
            </a>
        </header>

        <nav class="u-sidebar-nav">
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Inventory/Store -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @if($curr_page=='store')active @else '' @endif" href="supplier/index">
                        <i class="fas fa-warehouse u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Store</span>
                    </a>
                </li>
                <!-- Inventory/Store -->

                <!-- Shop -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @if($curr_page=='shop')active @else '' @endif" href="{{route('supplier-shop')}}">
                        <i class="fas fa-store-alt u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Shop</span>
                    </a>
                </li>
                <!-- Shop -->

                <!-- Purchases -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @if($curr_page=='orders')active @else '' @endif" href="">
                        <i class="fas fa-shopping-cart u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Orders</span>
                    </a>
                </li>
                <!-- End Purchases -->

                <!-- Purchases -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @if($curr_page=='purchases')active @else '' @endif" href="{{route('purchase')}}">
                        <i class="far fa-money-bill-alt u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Purchases</span>
                    </a>
                </li>
                <!-- End Purchases -->

                <!-- Purchases -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @if($curr_page=='sales')active @else '' @endif" href="/supplier/sales">
                        <i class="far fa-credit-card u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Sales</span>
                    </a>
                </li>
                <!-- End Purchases -->

                <!-- Purchases -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link @if($curr_page=='kra')active @else '' @endif" href="{{route('kra')}}">
                        <i class="fas fa-calculator u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">KRA</span>
                    </a>
                </li>
                <!-- End Purchases -->
            </ul>
        </nav>
    </div>
</aside>
<!-- End Sidebar -->
