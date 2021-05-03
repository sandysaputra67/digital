@extends('restaurant.layouts.master')

@section('content')
<div class="flex flex-col h-screen">
    @include('restaurant.layouts.header')

    <detail-menu :restaurant="{{ json_encode($restaurant) }}" :menu_id="{{$menu}}" :url_back="{{ json_encode(route('restaurant.menu', $restaurant->id)) }}"></detail-menu>
</div>
@endsection
