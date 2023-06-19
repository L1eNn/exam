@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="postCreateForm">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Title">
                <textarea name="content" placeholder="Content"></textarea>
                <input type="file" name="images">
                <button type="submit">Добавить пост</button>
            </form>
        </div>
    </div>

@endsection
