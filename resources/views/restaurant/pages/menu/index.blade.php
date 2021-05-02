@extends('restaurant.layouts.master')

@section('content')
    <menu-page :restaurant="{{ json_encode($restaurant) }}"></menu-page>
@endsection