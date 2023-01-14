<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.head')
<body>
    <div id="app">
        @include('includes.navbar')
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 bg-white d-none d-md-block sidebar">
                    @include('includes.sidebar')
                </div>
                <div class="col-md-10">
                    <main class="py-4 px-auto">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </div>
</body>
</html>
