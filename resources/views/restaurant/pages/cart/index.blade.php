@extends('restaurant.layouts.master')

@section('content')
<div class="flex flex-col h-screen bg-white">
    @include('restaurant.layouts.header-back')

    <main class="flex-1 overflow-y-auto">
        <div>
            <div class="px-2">
                @include('restaurant.components.cart-item')

                @include('restaurant.components.cart-item')

                @include('restaurant.components.cart-item')
            </div>
            <div class="bg-gray-400 px-2">
                <div class="grid grid-cols-2 px-2 py-2">
                    <div>
                        <p class="text-white text-xl">Total pesanan baru</p>
                    </div>
                    <div>
                        <p class="font-bold text-2xl text-gray-600 text-right">200.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="px-2">
                @include('restaurant.components.cart-item-secondary')
                
                @include('restaurant.components.cart-item-secondary')
                
                @include('restaurant.components.cart-item-secondary')
            </div>
            <div class="bg-gray-400 px-2">
                <div class="grid grid-cols-2 px-2 py-2">
                    <div>
                        <p class="text-white text-xl"></p>
                    </div>
                    <div>
                        <p class="font-bold text-2xl text-gray-300 text-right">200.000</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-green-200">
        <div class="grid grid-cols-2">
            <div>
                <p class="text-2xl font-medium text-green-600 p-4">Total</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-green-600 p-4 text-right">200.000</p>
            </div>
        </div>
        <div class="grid grid-cols-2 text-center">
            <a href="{{url()->previous()}}" class="bg-green-300 text-2xl font-medium p-4">KEMBALI</a>
            <a class="bg-green-300 text-2xl font-medium p-4">PESAN</a>
        </div>
    </footer>
</div>
@endsection