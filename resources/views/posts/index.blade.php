
@extends('layouts.master')

@section('title')
    posts list

@endsection


@section('content')
    <div class="container">
        <h1>Posts List</h1>
        <hr>
        @foreach($posts as $post)
        <a href="/posts/{{$post->id}}">
            <div class="jumbotron">
                <h4>{{$post->title}}</h4>
                <p>{{ $post->content }}</p>
            </div>
        </a>
        @endforeach
    </div>

 @endsection