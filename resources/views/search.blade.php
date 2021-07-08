
$page_title = 'Search Products - WillieScant';

	<!-- Header (Topbar) -->
	@if(Auth::check() && $viewing_as == 'supplier') {
		header('location:./supplier/index2.blade.php');
	@elseif (Auth::check() && $viewing_as == 'customer') {
        @include('menu.customer_nav')
	@else
		@include('menu.logged_out_nav')
    @endif
	<!-- End Header (Topbar) -->

	<main class="u-main pl-0" role="main">
		<div class="u-content">
			<div class="u-body">
				<div class="row m-auto">
					<div class="col-md-1 col-xl-1"></div>
					<div class="col-md-10 col-xl-10 products">
						<div class="products-header row mt-3">
							<h3 class="col-md-6" style="vertical-align: bottom;">14 Products found</h3>
							<div class="form-group col-md-6 mb-0">
								<div class="input-group mb-0">
									<input type="text" class="form-control" placeholder="Search for products"
										aria-label="Search Products" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn btn-outline-primary" type="button">
											<i class="fa fa-search"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
						<hr class="mb-4 mt-3">
						<div class="products-body">
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href=/view_product">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
							<div class="product-card">
								<img src="https://fakeimg.pl/250x100/">
								<div class="product-info">
									<div class="product-name">Lorem Ipsum</div>
									<div class="product-price">KSh 1500</div>
								</div>
								<div class="add-to-cart">
									<a href="/view_product.php">
										<button class="btn btn-sm btn-block btn-primary">ADD TO CART</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<footer class="u-footer text-center text-muted text-muted">
				<p class="h5 mb-0 ml-auto">
					&copy; <?php echo date("Y");?> <a class="link-muted" href="https://williescant.co.ke"
						target="_blank">WilieScant
						Company</a>. All
					Rights Reserved.
				</p>
			</footer>
			<!-- End Footer -->
		</div>
	</main>

	<!-- Global Vendor -->
	<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="./assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
	<script src="./assets/vendor/popper.js/dist/umd/popper.min.js"></script>
	<script src="./assets/vendor/bootstrap/bootstrap.min.js"></script>

	<!-- Plugins -->
	<script src="./assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>

	<!-- Initialization  -->
	<script src="./assets/js/sidebar-nav.js"></script>
	<script src="./assets/js/main.js"></script>
	<script src="./assets/js/dashboard-page-scripts.js"></script>

