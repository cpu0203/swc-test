@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ auth()->user()->login }}</h1>
@stop

@section('content')

    <div class="card" style="width: 18rem;">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body">
            <h5 class="card-title">Данные Пользователя</h5>
            <p class="card-text">Профайл пользователя. Основные сведения:</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{auth()->user()->name }} {{auth()->user()->surname }}</li>
            <li class="list-group-item">{{auth()->user()->email }}</li>
            <li class="list-group-item">Дата рождения: {{auth()->user()->birthday_data == null ? "не указана" : auth()->user()->birthday_data}}</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>





@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
