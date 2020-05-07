@extends('layouts.master')

@section('title')
    Create New Post
@endsection

@section('content')
<div class="container">
    <h1>Create New post</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="/posts" method="POST" class="form-group container jumbotron">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" required class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" rows='15' required class="form-control"></textarea>
        </div>


        <button class="btn btn-info" type="submit">Create</button>
    </form>
</div>
@endsection