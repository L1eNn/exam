@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="userName">
            <p><b>Name:</b> {{ $user->name }}</p>
        </div>
        <div class="userEmail">
            <p><b>Email: </b>{{ $user->email }}</p>
        </div>
        <a href="{{ route('posts.create') }}"><button>Добавить пост</button></a>
    </div>

@endsection
