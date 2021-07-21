<aside id="sidebar" class="u-sidebar">
    <div class="u-sidebar-inner">
        <header class="u-sidebar-header">
            <a class="u-sidebar-logo" href="index.html">
                <img class="" src="{{asset('storage/images/main/LOGO.png')}}" width="50px" height="55px" alt="WillieScant">
            </a>
        </header>

        <nav class="u-sidebar-nav">
            <ul class="u-sidebar-nav-menu u-sidebar-nav-menu--top-level">
                <!-- Shop  -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link" href="#!"data-target="#shop">
                        <i class="far fa-gem u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Shop</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="shop" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <!-- Display -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="{{route('supplier-shop')}}">
                                <i class="fas fa-store-alt u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Display</span>
                            </a>
                        </li>
                        <!-- Display -->

                        <!-- Store -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="{{route('supplier-home')}} ">
                                <i class="fas fa-warehouse u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Store</span>
                            </a>
                        </li>
                        <!-- Store -->
                    </ul>
                </li>
                <!-- End-Shop  -->

                <!-- Staff  -->
                <li class="u-sidebar-nav-menu__item
                ">
                    <a class="u-sidebar-nav-menu__link" href="#!"
                       data-target="#staff">
                        <i class="fas fa-users u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Staff</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="staff" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <!-- Accountants -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="{{ route('get-accountants')}}">
                                <i class="fas fa-user-circle u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Accountants</span>
                            </a>
                        </li>
                        <!-- Accountants -->

                        <!-- Cashiers -->
                        <!--
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="/supplier/staff/cashiers ">
                                <i class="fas fa-user-alt u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Cashiers</span>
                            </a>
                        </li>
                        -->
                        <!-- Cashiers -->
                    </ul>
                </li>
                <!-- End-Staff  -->

                <!-- Books Of Accounts  -->
                <li class="u-sidebar-nav-menu__item
                    ">
                    <a class="u-sidebar-nav-menu__link" href="#!"
                       data-target="#books_of_accounts">
                        <i class="fas fa-book u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Books Of Accounts</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="books_of_accounts" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <!-- Invoices -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="/supplier/invoice.php">
                                <i class="fas fa-file-invoice u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Invoice</span>
                            </a>
                        </li>
                        <!-- End Invoices -->

                        <!-- Delivery Notes -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="/supplier/delivery_note.php">
                                <i class="fas fa-truck u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Delivery Note</span>
                            </a>
                        </li>
                        <!-- End Delivery Notes -->
                    </ul>
                </li>
                <!-- Books Of Accounts -->

                <!-- Orders -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link " href="/supplier/orders.php">
                        <i class="fas fa-shopping-cart u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Orders</span>
                    </a>
                </li>
                <!-- End Orders -->

                <!-- Receipts  -->
                <li class="u-sidebar-nav-menu__item
                ">
                    <a class="u-sidebar-nav-menu__link" href="#!"
                       data-target="#receipts">
                        <i class="far fa-file-alt u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Receipts</span>
                        <i class="fa fa-angle-right u-sidebar-nav-menu__item-arrow"></i>
                        <span class="u-sidebar-nav-menu__indicator"></span>
                    </a>
                    <ul id="receipts" class="u-sidebar-nav-menu u-sidebar-nav-menu--second-level" style="display: none;">
                        <!-- Purchases -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="{{ route('get-purchase') }}">
                                <i class="far fa-money-bill-alt u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Purchases</span>
                            </a>
                        </li>
                        <!-- End Purchases -->

                        <!-- Sales -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="/supplier/sales.php">
                                <i class="far fa-credit-card u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Sales</span>
                            </a>
                        </li>
                        <!-- End Sales -->

                        <!-- Exports -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="{{route('get-export')}}">
                                <i class="fas fa-calculator u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Exports</span>
                            </a>
                        </li>
                        <!-- End Exports -->

                        <!-- Transfers -->
                        <li class="u-sidebar-nav-menu__item ml-md-3">
                            <a class="u-sidebar-nav-menu__link " href="/supplier/matching.php">
                                <i class="fas fa-exchange-alt u-sidebar-nav-menu__item-icon"></i>
                                <span class="u-sidebar-nav-menu__item-title">Matching</span>
                            </a>
                        </li>
                        <!-- End Transfers -->
                    </ul>
                </li>
                <!-- End-Receipts  -->

                <!-- Product Requests -->
                <li class="u-sidebar-nav-menu__item">
                    <a class="u-sidebar-nav-menu__link " href="/supplier/requests.php">
                        <i class="fas fa-list u-sidebar-nav-menu__item-icon"></i>
                        <span class="u-sidebar-nav-menu__item-title">Requests</span>
                    </a>
                </li>
                <!-- End Product Requests -->
            </ul>
        </nav>
    </div>
</aside>
