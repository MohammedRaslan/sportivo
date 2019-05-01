@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1 style="text-align:center; color:cornflowerblue"><b>Edit User {{$user->name}} </b></h1>
        <hr style="width:50%">
    <form action="{{ route('users.update',[$user->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!-- Laravel used method put/patch in update function, so it'll ignore post method above -->
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
                <label>Name</label>
        <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Enter New Name"  required> 
        </div>
        <div class="form-group">
                <label>Email</label>
        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter New Email" required> 
        </div>
        <label >User Type</label>
        <select class="form-control" name="user_type" >
            @if($user->user_type == 1)
        <option value="{{ $user->user_type }}">{{ $user->user_type }}(User)</option>
        <option value="0">0(Admin)</option>
            @else  
            <option value="{{ $user->user_type }}">{{ $user->user_type }} (Admin)</option>
        <option value="1">1 (User)</option>
        @endif
        </select>
        <br>
        <button name="submit" type="submit" class="btn btn-primary btn-lg" >Edit User</button>
    </form>
    </div>
</div>

@endsection