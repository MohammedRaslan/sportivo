@if(Auth::guest() || Auth::user()->user_type == 1)
@include('notfound')
@else
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1 style="text-align:center; color:cornflowerblue"><b>Edit Post </b></h1>
        <hr style="width:50%">
    <form action="{{ route('posts.update',[$post->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Laravel used method put/patch in update function, so it'll ignore post method above -->
        <input type="hidden" name="_method" value="put">
        <label >Post Image</label>
        <div class="row" style="position:relative; left:100px;">
        <img style="width:400px; height:300px;" src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="Post Img">
        </div>
        <br><br>
        <label >Choose New Photo</label>
        <div class="input-group">
                <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" >
                        <label class="custom-file-label"></label> 
                </div>
            </div>
        <div class="form-group">
                <label>Body</label>
        <textarea type="text" class="form-control" value="{{ $post->body }}" name="body" placeholder="Enter New Content"  required> {{ $post->body }} </textarea>
        </div>
        <div class="form-group">
                <label>Author</label>
        <input type="text" class="form-control" name="author" value="{{ $post->author }}" placeholder="Enter New Author" required> 
        </div>
        
        <button name="submit" type="submit" class="btn btn-primary btn-lg" >Edit Post</button>
    </form>
    </div>
</div>

@endsection
@endif