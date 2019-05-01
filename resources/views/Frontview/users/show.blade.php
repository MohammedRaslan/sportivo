@if(Auth::guest() || Auth::user()->user_type == 1)
@include('notfound')
@else

@extends('layouts.app')
@section('content')
    

<div class="container">

        <!-- The justified navigation menu is meant for single line per list item.
             Multiple lines will require custom code not provided by Bootstrap. -->
    
  
        <!-- Jumbotron -->
        @if(!isset($user))
        <div class="jumbotron">
          <h1></h1>
            <p class="lead"><b>Welcome Admin </b>,<br>
                 This is Your Control Panel, Here You'll be able to Add,Edit,Delete Posts 
                and You Can Also List Users, Finally You Can Look At Statistics To Make The Right Choice In Future,
                 Wish You Alot Of Luck.</p>
            
          </div>
        @else
       
  
        <div class="jumbotron">
        <h1 style="text-align:center; color:cornflowerblue"><b>User {{$user->name}} Details</b></h1>
        <hr style="width:50%">
    <form  action="{{ route('users.destroy',[ $user->id ]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Laravel used method put/patch in update function, so it'll ignore post method above -->
        <input type="hidden" name="_method" value="delete">
        <div class="form-group" >
                <label>Name :</label>
        <span><b>{{ $user->name }}</b> </span>
        </div>
        <div class="form-group">
                <label>Email :</label>
                <span ><b>{{ $user->email }}</b> </span>
        </div>
        <label >User Type :</label>
        <span > <b>{{ $user->user_type }} </b></span>
        <br>
        <br>
        
        <button class="btn btn-danger btn-lg"  >
               <a style="color:blanchedalmond"
               href="#" 
                  onclick="

            var result = confirm('Are You Sure You Want To Delete This User {{$user->email}} ?');

          if ( result ){
              event.preventDefault();
              document.getElementById('delete-form').submit();
          }
       " 
      >Delete User</a></button>
    </form>
   <br><br>
        </div>
</div>
<form id="delete-form"  action="{{ route('users.destroy',[ $user->id ]) }}"
     style="display:none;" method="POST" >
<input type="hidden" name="_method" value="delete">
{{ csrf_field() }}
</form>
@endif
@endsection
@endif