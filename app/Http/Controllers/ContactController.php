<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

use Illuminate\Http\Request;

use App\Contact;
use App\Sidebar;
use App\Post;

class ContactController extends Controller
{
    //
    public function index(){
         $posts = new Post();
        $posts = DB::table('posts')->select('id','body','img','author','created_at')->orderBy('id','desc')->get(); 
        $singleton = Sidebar::getInstance();
        $singleton = $posts;
        return view('Frontview.contact')->with('singleton',$singleton);
    }
}
