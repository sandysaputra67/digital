@extends('restaurant.layouts.master')

@section('content')
    <div class="flex flex-col h-screen menu-page">
        <header-component>
            <div class="grid grid-cols-12">
                <div class="col-span-9">
                    <search-component></search-component>
                </div>

                <div class="col-span-3">
                    <div class="grid grid-cols-2">
                        <header-cart-button :url="'#'"></header-cart-button>
                        <header-scan-qr-button
                            :url="'{{ route('restaurant.show-qr', ['restaurant' => $restaurant->id]) }}'">
                        </header-scan-qr-button>
                    </div>
                </div>
            </div>
        </header-component>

        <main class="flex-1 overflow-y-auto">
            <menu-page :restaurant="{{ json_encode($restaurant) }}"></menu-page>
        </main>
    </div>
@endsection
