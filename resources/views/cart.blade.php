@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css.css') }}">
@endpush

@section('main-content')
    <main>
        <div id="sub-main" >
            <h3>購物車</h3>
            <div class="cart">
                i
            </div>
        </div>
    </main>
@endsection
