@extends('layouts.app', ['page' => 'Home'])

@section('content')
    @include('menu._menu')
    <main class="u-main pl-0" role="main">
        <div class="u-content">
            <div class="u-body">
                <div class="row m-auto">
                    <div class="col-md-2 col-sm-1" id="hey">

                    </div>
                    <div class="col-sm-10 col-md-8 m-auto">
                        <div class="op" style="margin-top:2vh;"></div>
                        <h1 class="text-center lg">Online Supermarket</h1>
                        <form class="mx-auto" role="form" action="#" enctype="multipart/form-data" method="POST">
                            <div class="text-center lg mt-3" id=>
                                <img src="{{asset('storage/images/main/LOGO.png')}}" height="224px" width="150px">
                            </div>
                            <br>
                            <div class="row mx-auto w-100" id="hey2">
                                <div class="col-md-2 col-sm-1"></div>
                                <div class="col-md-8 col-sm-10 mx-auto">
                                    <div class="input-group mb-3 text-center">
                                        <input type="text" class="form-control" id="search" name="product" placeholder="Search by your product name, brand or description" id="search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary" id="search-btn" name="search">Search <i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-2 col-sm-1"></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2" id="md3">

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
