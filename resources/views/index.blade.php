@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($posts as $post)
            <div class="post">
                <div class="postCreatorInfo">
                    <div class="userName"><p>{{ $post->user->name }}</p></div>
                    <div class="date"><p>{{ $post->created_at }}</p></div>
                </div>
                <div class="postContent">
                    <div class="title"><h1>{{ $post->title }}</h1></div>
                    <div class="content"><p>{{ $post->content }}</p></div>
                    <div class="images">
                        <img src="{{ URL('images/'.$post->images) }}" alt="">
                    </div>
                </div>
                <div class="postInfo">
                    <div class="views">
                        <img src="" alt="">
                        <p>{{ $post->views }}</p>
                    </div>
                    <div class="likes">
                        <img src="" alt="">
                        <p>{{ $post->likes }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
