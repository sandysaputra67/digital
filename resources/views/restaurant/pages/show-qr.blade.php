@extends('restaurant.layouts.master')

@section('header')
    @include('restaurant.layouts.header')
@endsection

@section('content')
    <div class="flex flex-col">
        <header-component>
            <div class="grid grid-cols-12">
                <div class="col-span-9">
                    <header-back-button :url="'{{ url()->previous() }}'" :title="'Keranjang'"></header-back-button>
                </div>

                <div class="col-span-3">
                    <div class="grid grid-cols-2">
                        <header-cart-button :url="'#'"></header-cart-button>
                        <header-scan-qr-button :url="'#'"></header-scan-qr-button>
                    </div>
                </div>
            </div>
        </header-component>

        <main class="flex-1">
            <p class="text-center font-medium text-xl p-8 text-gray-800">Gunakan QR code di bawah ini supaya bisa memesan di
                meja yang sama menggunakan HP yang berbeda</p>

            <img src="{{ asset('assets/images/sample-qr.png') }}" class="m-auto w-64" alt="Sample QR">
        </main>
    </div>
@endsection
