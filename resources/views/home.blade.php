@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    @foreach ($events as $event)
        <div class="card">
            <div class="card-header">
                <a href="{{route('event.show', $event->id)}}"><h3 class="card-title">{{ $event->title }}</h3></a>
                
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <span class="badge badge-primary">Label</span>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            {{-- <div class="card-body">
                {{ $event->text }}
            </div> --}}
            <!-- /.card-body -->
            <div class="card-footer">
                {{ $event->created_at }}
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    @endforeach




@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
