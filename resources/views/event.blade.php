@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $event->title }}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $event->title }}</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="badge badge-primary">Label</span>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {{ $event->text }}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Создатель {{ $event->user->name }} {{ $event->created_at }}
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->



    <ul class="list-group mb-3">
        <li class="list-group-item active" aria-current="true">Участники:</li>
        @foreach ($event->users as $user)
            <li class="list-group-item">{{ $user->name }}</li>
        @endforeach
    </ul>


    @if ($event->user->id !== auth()->user()->id)
        <?php $alpha = 0; ?>

        @foreach ($event->users as $user)
            @if ($user->id == auth()->user()->id)
                <form action="{{ route('event.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="act" value="minus">
                    <input type="submit" class="btn btn-secondary" value="отказаться" />
                </form>
                <?php $alpha = 1; ?>
            @endif
        @endforeach

        @if ($alpha == 0)
            <form action="{{ route('event.update', $event->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="act" value="plus">
                <input type="submit" class="btn btn-secondary" value="принять участие" />
            </form>
        @endif
    @elseif($event->user->id == auth()->user()->id)
        @foreach ($event->users as $user)
            @if ($user->id == auth()->user()->id)
                <form action="{{ route('event.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="act" value="minus">
                    <input type="submit" class="btn btn-secondary" value="отказаться" />
                </form>
                <?php $alpha = 1; ?>
            @endif
        @endforeach
    @endif





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
