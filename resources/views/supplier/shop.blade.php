@extends('layouts.app', ['page' => 'Dashboard'])
@section('content')
    @include('menu._supplier-menu')
<main class="u-main" role="main">
    <!-- Sidebar -->
@include('include.sidebar._sidebar')
<!-- End Sidebar -->
    <div class="u-content">
        <div class="u-body">
            <h1 class="h2 font-weight-semibold mb-3">Prepared Products {{sizeof($products)}}</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 products">
                            <div class="products-header row mt-3">
                                <div class="form-group col-md-12 mb-0">
                                    <form action="{{ route('search') }}"
                                          id="search-ready-form" method="POST">
                                        @csrf
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" name="search" id="search" placeholder="Search for a product"
                                                   aria-label="Search Products" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="mb-4 mt-3">
                            <div class="products-body">
                                @foreach($products as $product)
                                    <div class="product-card">
                                        <img src="">
                                        <div class="product-info">
                                            <div class="product-name"><b>Name</b></div>
                                            <div class="product-price">10000</div>
                                            <div class="product-quantity">100</div>
                                            <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet atque commodi cumque, debitis dicta doloribus id impedit inventore iure maiores mollitia natus quae recusandae repellat sapiente sed velit. Temporibus?</div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a data-toggle="modal" href="#" onclick="">
                                                <button class="btn btn-sm btn-block btn-primary">EDIT</button>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    @include('include.modal.edit-product')
@endsection

