<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $restaurant->description }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $restaurant->name }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>

<body class="bg-green-200">
    <div id="app">
        <div class="absolute h-screen w-screen z-50" data-toggle="modal" data-target="#startOrderModal"></div>

        <main class="text-center">
            <h4 class="inline-block mt-60 border-2 font-medium p-2 border-green-800 text-5xl text-green-800">MENU</h4>
        </main>

        <div class="footer w-full block absolute bottom-0 text-center">
            <div class="resto-name mb-24">
                <h4 class="text-center text-3xl text-green-800 mb-2 font-medium">{{ $restaurant->name }}</h4>
                <hr class="bg-green-800 mx-auto w-28 text-center" />
            </div>

            <div class="start-button absolute bottom-0 left-0 p-8 w-full bg-gradient-to-t">
                <div class=""></div>
                <a href="#" class="text-xl hover:no-underline text-white">Klik untuk memulai</a>
            </div>
        </div>

        <login-modal-component :restaurant_id="{{ $restaurant->id }}"></login-modal-component>
    </div>
    
    <script src="{{ asset('assets/js/manifest.js') }}"></script>
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>