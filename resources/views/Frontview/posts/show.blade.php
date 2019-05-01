@extends('layouts.app')
@section('content')
    

<div class="container">

        <!-- The justified navigation menu is meant for single line per list item.
             Multiple lines will require custom code not provided by Bootstrap. -->
    
  
        <!-- Jumbotron -->
  
       
  
        <div class="jumbotron">
        <h1 style="text-align:center; color:cornflowerblue"><b>Post By : {{$post->author}}</b></h1>
        <hr style="width:50%">
    <form  action="{{ route('posts.destroy',[ $post->id ]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Laravel used method put/patch in update function, so it'll ignore post method above -->
        <input type="hidden" name="_method" value="delete">
        <div class="form-group" >
                <label>Body :</label>
        <span><b>{{ $post->body }}</b> </span>
        </div>
        <div class="form-group">
                <label>Author :</label>
                <span ><b>{{ $post->author }}</b> </span>
        </div>
        <label >Post Image :</label>
        <div class="row"> <img style="width:600px; height:400px;" src="{{ asset('uploads') }}/post/{{ $post->img }}" alt="image"> </div>
        <br>
        <br>
        
        <button class="btn btn-danger btn-lg"  >
               <a style="color:blanchedalmond"
               href="" 
                  onclick="

            var result = confirm('Are You Sure You Want To Delete This Post {{$post->body}} ?');

          if ( result ){
              event.preventDefault();
              document.getElementById('delete-form').submit();
          }
       " 
      >Delete Post</a></button>
    </form>
   <br><br>
        </div>
</div>
<form id="delete-form"  action="{{ route('posts.destroy',[ $post->id ]) }}"
     style="display:none;" method="POST" >
<input type="hidden" name="_method" value="delete">
{{ csrf_field() }}
</form>

      @endsection