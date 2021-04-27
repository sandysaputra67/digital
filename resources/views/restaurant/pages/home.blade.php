<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $restaurant->description }}">

    <title>{{ $restaurant->name }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>

<body class="bg-green-200">
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
            <a href="#" data-toggle="modal" data-target="#startOrderModal" class="text-xl hover:no-underline text-white">Klik untuk memulai</a>
        </div>
    </div>

    <div class="modal fade" data-keyboard="false" id="startOrderModal">
        <div class="modal-dialog mt-60">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="mb-2 text-center text-lg">Silahkan masukkan nomor meja terlebih dahulu</p>

                    <div class="form-group m-0 mb-3">
                        <input type="text" name="table" placeholder="Nomor Meja" class="p-2 rounded text-xl w-full text-center border-2 border-green-400 focus:outline-none">
                    </div>

                    <button class="p-2 text-xl text-white w-full rounded bg-green-600 hover:bg-green-700" type="submit">LANJUT</button>

                    <p class="my-3 text-center text-gray-400 text-lg">- atau -</p>

                    <a href="{{ route('restaurant.menu', $restaurant->id) }}" class="p-2 text-xl block text-center text-green-800 hover:text-green-800 hover:no-underline w-full rounded bg-green-200 hover:bg-green-400">LIHAT MENU</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
