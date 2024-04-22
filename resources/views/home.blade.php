@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Все События</h1>
@stop

@section('content')

    @foreach ($events as $event)
        <div class="card">
            <div class="card-header">
                <a href="{{ route('event.show', $event->id) }}">
                    <h3 class="card-title">{{ $event->title }}</h3>
                </a>
                <div class="card-tools">
                    <span class="badge badge-primary">Label</span>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $event->created_at }}
            </div>
        </div>
        <!-- /.card -->
    @endforeach

    <p class="fs-4 mt-4">Мои события</p>

    <ul class="list-group">
        @foreach ($myEvents as $event)
            <li class="list-group-item"><a href="{{ route('event.show', $event->id) }}">{{ $event->title }}</a></li>
        @endforeach
    </ul>


@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@stop

@section('js')

@stop
