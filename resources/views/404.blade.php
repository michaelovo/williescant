
$page_title = "404 - Not Found";

    <main class="d-flex align-items-center justify-content-center w-100 h-100" role="main">
        <div class="container text-center">
            <div class="u-error">
                <h1 class="u-error__title mb-0">404</h1>

                <div class="u-error__text">
                    <h1 class="mb-2">Page Not Found</h1>
                    <a href="#" onclick="goBack()">Go Back</a>

                    <script>
                        function goBack() {
                            window.history.back();
                        }
                    </script>
                </div>
            </div>
        </div>

        <figure class="u-shape u-shape--top-right u-shape--position-1 d-none d-md-inline-block">
            <img src="{{asset('storage/images/svg/shapes/shape-1.svg')}}" alt="Image description">
        </figure>
        <figure class="u-shape u-shape--centered u-shape--position-2 d-none d-md-inline-block">
            <img src="'{{asset('storage/images/svg/shapes/shape-2.svg')}}" alt="Image description">
        </figure>
        <figure class="u-shape u-shape--centered u-shape--position-3 d-none d-md-inline-block">
            <img src="{{asset('storage/images/svg/shapes/shape-3.svg')}}" alt="Image description">
        </figure>
        <figure class="u-shape u-shape--bottom-left u-shape--position-4 d-none d-md-inline-block">
            <img src="{{asset('/assets/svg/shapes/shape-4.svg')}}" alt="Image description">
        </figure>
    </main>

