@extends('restaurant.layouts.master')

@section('content')
    <detail-menu-page :restaurant="{{ $restaurant }}" :menu_id="{{ $menu->id }}">
        <template v-slot:header>
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
        </template>
    </detail-menu-page>
@endsection
