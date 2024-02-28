@extends('layout/layout')

@section('page-title', "404")

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
@endpush

@section('main-content')
    <main>
        <h2>(´⊙ω⊙`)</h2>
        <br>
        <h3>404 找不到網頁</h3>
    </main>
@endsection