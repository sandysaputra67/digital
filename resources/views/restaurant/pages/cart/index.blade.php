@extends('restaurant.layouts.master')

@section('content')
<cart-page :restaurant="{{ json_encode($restaurant) }}"></cart-page>
@endsection