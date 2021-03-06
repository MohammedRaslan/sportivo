<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Http\Request;
use App\Factoryinterface;

class UsersController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $users = User::all();
        // $users  = DB::table('users')->select('id','name','email','user_type')->orderBy('id','desc')->get();
        return view('Frontview.users.index',['users' => $users] );
    }

    public function login(){
        return view('Frontview.users.show');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        // $user = User::where('id',$user->id)->first();
        $user = User::find($user->id);
   
        return view('Frontview.users.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = User::find($user->id);

        return view('Frontview.users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $userUpdate = User::where('id',$user->id)
        ->update([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'user_type' => $request->input('user_type')
        ]);
        if($userUpdate){
            return redirect()->route('users.index',['user' => $user->id])->with('success','Users Updated Successfuly');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
     
        $finduser = User::find($user->id);
        if($finduser->delete()){
            return redirect()->route('users.index',['user' => $user->id])->with('success','Users Deleted Successfuly');
        }
        return back()->withInput()->with('error','User Could not be Deleted');
    }
}
