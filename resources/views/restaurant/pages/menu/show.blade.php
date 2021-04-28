@extends('restaurant.layouts.master')

@section('content')
<div class="flex flex-col h-screen">
    @include('restaurant.layouts.header')

    <main class="flex-1 overflow-y-auto">
        <img src="http://via.placeholder.com/640x360" alt="Menu Image" />

        <div class="px-4">
            <div class="grid grid-cols-12 py-2">
                <div class="col-span-8 grid grid-cols-12 py-2">
                    <div class="col-span-3">
                        <div class="rounded-full w-8 h-8 border-2 border-gray-500">
                            <p class="w-full r text-center text-gray-800">1</p>
                        </div>
                    </div>

                    <div class="col-span-9">
                        <span class="inline-block align-middle">
                            <p class="text-2xl text-gray-800">Menu 1</p>
                        </span>
                    </div>
                </div>

                <div class="col-span-4 py-2 text-right">
                    <span class="inline-block align-middle">
                        <p class="text-2xl text-gray-800">20.000</p>
                    </span>
                </div>
            </div>

            <textarea name="notes" placeholder="Catatan" class="w-full font-medium text-gray-800 rounded p-2 border-2 border-gray-400 focus:outline-none" cols="30" rows="4"></textarea>
            <p class="text-justify font-medium text-gray-600">Deskripsi menu disini</p>
        </div>
    </main>

    <footer>
        <div class="grid grid-cols-3 bg-green-200">
            <button class="text-4xl text-gray-800">-</button>
            <div class="p-2">
                <input type="tel" name="number" class="w-full h-full text-2xl font-bold text-center px-4 py-2 border-2 border-gray-600 focus:outline-none">
            </div>
            <button class="text-4xl text-gray-800">+</button>
        </div>

        <div class="grid grid-cols-2">
            <button class="bg-green-300 text-2xl font-medium p-4">BATAL</button>
            <button class="bg-green-300 text-2xl font-medium p-4">TAMBAH</button>
        </div>
    </footer>
</div>
@endsection
