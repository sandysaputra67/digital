@extends('restaurant.layouts.master')

@section('content')
    <div class="flex flex-col bg-theme-primary-lighter">
        @include('restaurant.layouts.header')

        <main class="flex-1 overflow-y-auto">
            <div class="p-2">
                @for ($i = 1; $i < 10; $i++)
                    <single-menu-card-component
                        :menu="{ url: '{{ route('restaurant.menu.show', ['restaurant' => $restaurant->id, 'menu' => 1]) }}' }">
                    </single-menu-card-component>
                @endfor
            </div>
        </main>
    </div>

    <div class="p-2">
        <div class="category-1">
            <p class="text-xl mb-2 px-2 font-medium">Appetizer</p>

            <div class="grid grid-cols-12">
                <div class="col-span-12 px-2 mb-2">
                    @include('restaurant.components.multimenu-card')
                </div>

                <div class="col-span-6 px-2 mb-2">
                    @include('restaurant.components.card')
                </div>

                <div class="col-span-6 px-2 mb-2">
                    @include('restaurant.components.card')
                </div>

                <div class="col-span-12 px-2 mb-2">
                    @include('restaurant.components.card')
                </div>
            </div>
        </div>
    </div>
@endsection
