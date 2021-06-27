<header class="u-header">
    <div class="u-header-left">
        <a class="u-header-logo" href="#">
            <img src="{{asset('storage/images/main/LOGO.png')}}" alt="WillieScant" width="50px" height="55px">
        </a>
    </div>

    <div class="u-header-right">
        <!-- Shop -->
        <a href="#" class="link-muted nav-link">Shop</a>
        <!-- End Shop -->

        <!-- Shopping Cart -->
        <a class="link-muted nav-link" href="#">
            <span class="h3">
                <i class="fas fa-shopping-cart"></i>
            </span>
        </a>
        <!-- End Shopping Cart -->

        <!-- Orders -->
        <a href="#" class="link-muted nav-link">Orders</a>
        <!-- End Orders -->

        <!-- User Profile -->
        <div class="dropdown ml-2 mr-2">
            <a class="link-muted d-flex align-items-center" href="#" role="button" id="dropdownMenuLink"
               aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" >
                <img class="u-avatar--xs img-fluid rounded-circle mr-2"
                     src="{{asset('storage/images/avatars/img1.jpg')}}" alt="User Profile">
                <span class="text-dark d-none d-sm-inline-block">
                    Hello <?php echo $_SESSION['username']?> <small class="fa fa-angle-down text-muted ml-1"></small>
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right border-0 py-0 mt-3" aria-labelledby="dropdownMenuLink"
                 style="width: 260px;">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-4">
                                <a class="d-flex align-items-center link-dark"
                                   href=<?php echo $root_path."/shop/profile.php"?>>
                                    <span class="h3 mb-0"><i class="far fa-user-circle text-muted mr-3"></i></span> View
                                    Profile
                                </a>
                            </li>
                            <?php
                            if($_SESSION['type'] == 'supplier' && $_SESSION['viewing_as'] == 'customer') {
                                echo '
                                    <li class="mb-4">
                                        <a class="d-flex align-items-center link-dark" href='.$root_path."/shop/helpers/switch.php".'
                                            <span class="h3 mb-0"><i class="fa fa-cog text-muted mr-3"></i></span> Switch to supplier
                                        </a>
                                    </li>
                                    ';
                            }
                            ?>
                            <li>
                                <a class="d-flex align-items-center link-dark"  href="<?php echo $root_path."/auth/logout.php" ?>">
                                    <span class="h3 mb-0"><i class="far fa-share-square text-muted mr-3"></i></span>
                                    Log Out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End User Profile -->
    </div>
</header>
