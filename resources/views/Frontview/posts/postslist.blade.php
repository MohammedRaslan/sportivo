@if(Auth::guest() || Auth::user()->user_type == 1)
@include('notfound')
@else
@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
        <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                        Enter The Link To Delete
                </strong>
        </div>
    <div class="panel panel-primary" >
           
       <div class="panel-heading" style="text-align:center;"> <strong>Posts List </strong></div>
        <div class="panel-body" > 
                <ul class="list-group">
                   
                   @foreach ($posts as $post)
                   
                <li class="list-group-item"><a href="/posts/{{ $post->id }}" >{{ $post->body }} </a>
                   
                <!--<input name="id" value="{{ $post->id }}" hidden/>-->
                <button class="btn btn-primary"  type="submit"  style="float:right; position:relative; top:-8px;" ><a style="color:white" href="/posts/{{ $post->id }}/edit">Update</a></button>
                   
                   
                </li>
                
                   @endforeach
                   
                      </ul>
        </div>
    </div>

</div>
@endsection
@endif