<header class="u-header">
    <div class="u-header-left">
        <a class="u-header-logo"href="/index">
        <img src="{{asset('storage/images/main/LOGO.png')}}" alt="WillieScant" width="50px" height="55px">
        </a>
    </div>

    <div class="u-header-right">

        <a href="{{route('login')}}" class="link-muted nav-link @if($curr_page =='login') active @else '' @endif">Login</a>
        <a href="{{route('register')}}" class="link-muted nav-link @if($curr_page =='register') active @else '' @endif">Sign up</a>

        <!-- User Profile -->
        <div class="dropdown ml-2">
            <a class="link-muted d-flex align-items-center" href="#!" role="button" id="dropdownMenuLink"
                aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                <img class="mr-2" width='25px' height='25px' src="{{asset('storage/images/main/services.png')}}" alt="User Profile">
            </a>

            <div class='dropdown-menu dropdown-menu-right border-0 py-0 mt-4' aria-labelledby="dropdownMenuLink"
                style="width: 260px;">
                <h4 class='text-center pt-2'> Our Services</h4>
                <hr>
                <div class='d-flex'>
                    <a class='dropdown-item service' href="#"><img src="{{asset('storage/images/main/LOGO.png')}}" width='35' height='45'></a>
                <a class='dropdown-item service' href='https://housingsmart.co.ke/homepage'>
                    <img src="{{asset('storage/images/main/housing.jpg')}}" width='35' height='45'></a>
                </div>

                <div class='d-flex'>
                    <a class='dropdown-item service' href='#'>Health</a>
                    <a class='dropdown-item service' href='#'>Food</a>
                </div>

                <div class='d-flex'>
                    <a class='dropdown-item service' href='#'>Clothing</a>
                    <a class='dropdown-item service' href='#'>Security</a>
                </div>

                <div class='d-flex'>
                    <a class='dropdown-item service' href='#'>Education</a>
                    <a class='dropdown-item service' href='#'>Transport</a>
                </div>

                <div class='d-flex'>
                    <a class='dropdown-item service' href='#'>Innovation</a>
                    <a class='dropdown-item service' href='#'>Health</a>
                </div>
            </div>
        </div>
        <!-- End User Profile -->
    </div>
</header>
