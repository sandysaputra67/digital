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
            <div class="p-2">
                <p class="text-xl px-2 font-medium">Appetizer</p>

                <div class="grid grid-cols-2">
                    <div class="col-span-2">
                        @for ($i = 1; $i <= 1; $i++)
                            @php
                                $menu = [
                                    'url' => route('restaurant.menu.show', ['restaurant' => $restaurant->id, 'menu' => 1]),
                                    'image' => asset('assets/images/thumbnail-640x360.png'),
                                    'menus' => [['number' => 1, 'name' => 'Menu 1', 'price' => '20k'], ['number' => 2, 'name' => 'Menu 2', 'price' => '30k']],
                                ];
                            @endphp

                            <group-menu-card-component :menu="{{ json_encode($menu) }}"></group-menu-card-component>
                        @endfor
                    </div>

                    @for ($i = 0; $i < 5; $i++)
                        @php
                            $menu = [
                                'url' => route('restaurant.menu.show', ['restaurant' => $restaurant->id, 'menu' => 1]),
                                'name' => 'Menu 1',
                                'price' => '20k',
                                'image' => asset('assets/images/thumbnail-640x360.png'),
                            ];
                        @endphp

                        <div class="col-span-1">
                            <single-menu-card-component :menu="{{ json_encode($menu) }}"></single-menu-card-component>
                        </div>
                    @endfor

                    @for ($i = 0; $i < 5; $i++)
                        @php
                            $menu = [
                                'url' => route('restaurant.menu.show', ['restaurant' => $restaurant->id, 'menu' => 1]),
                                'name' => 'Menu 1',
                                'price' => '20k',
                                'image' => null,
                            ];
                        @endphp

                        <div class="col-span-2">
                            <single-menu-card-component :menu="{{ json_encode($menu) }}"></single-menu-card-component>
                        </div>
                    @endfor
                </div>

            </div>
        </main>
    </div>
@endsection
