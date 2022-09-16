@extends('app')

@section('content')
    @foreach($todos as $todo)
        <div>
            <p>{{ $todo->title }}</p>
            <p>{{ $todo->body }}</p>
            <p>{{ $todo->user->name }}</p>
        </div>
    @endforeach
@endsection
