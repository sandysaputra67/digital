@extends('restaurant.layouts.master')

@section('header')
@include('restaurant.layouts.header')
@endsection

@section('content')
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
