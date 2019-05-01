@if(Auth::guest() || Auth::user()->user_type == 1)
@include('notfound')
@else
@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1 style="text-align:center; color:cornflowerblue"><b>Add Post </b></h1>
            <hr style="width:50%">
        <form action="{{ route('submitpost') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="body" rows="3" placeholder="Enter Post Describtion" required></textarea>
            </div>
            <div class="form-group">
                    <label>Author</label>
                    <input type="text" class="form-control" name="author" placeholder="Enter Author Name" required> 
            </div>
            <label >Image</label>
            <div class="input-group">
                <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" required>
                        <label class="custom-file-label"></label> 
                </div>
            </div>
            <br>
            <button name="submit" type="submit" class="btn btn-primary btn-lg" >Add Post</button>
        </form>
        </div>
    </div>

    

@endsection
@endif