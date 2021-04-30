<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $restaurant->description }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $restaurant->name }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>

<body class="bg-green-200">
    <div id="app">
        <front-page :restaurant="{{ json_encode($restaurant) }}"
            :menu_url="'{{ route('restaurant.menu', $restaurant->id) }}'">
        </front-page>
    </div>

    <script src="{{ asset('assets/js/manifest.js') }}"></script>
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
