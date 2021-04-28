@extends('restaurant.layouts.master')

@section('header')
@include('restaurant.layouts.header')
@endsection

@section('content')
<p class="text-center font-medium text-xl p-8 text-gray-800">Gunakan QR code di bawah ini supaya bisa memesan di meja yang sama menggunakan HP yang berbeda</p>

<img src="{{ asset('assets/images/sample-qr.png') }}" class="m-auto w-64" alt="Sample QR">
@endsection
