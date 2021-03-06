<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

use App\Post;
use App\Like;
use App\Comment;
use App\User;

use Illuminate\Http\Request;
interface postbuilder {
    public function blog();
    public function comment(Request $request);
    public function getcomment();
    public function likespage();

}

class PostsController extends Controller implements postbuilder
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
         return view('Frontview.index');
    }



    public function postindex(){
        $posts = DB::table('posts')->select('id','body','img','author','created_at')->orderBy('id','desc')->get();        
        return view('Frontview.index',['posts' => $posts]);
    }



    public function postslist()
    {
        $posts = Post::all();
        return view('Frontview.posts.postslist',['posts' => $posts]);
    }



    public function addpost(){
        return view('Frontview.posts.index');
    }
    
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function blog(){

        
        
        $posts = DB::table('posts')->select('id','body','img','author','created_at')->orderBy('id','desc')->get(); 
        
        $comments = new Comment();
        $users =new User();
        
        $users = DB::table('users')->select('id','name')->get();
          
         $comments = DB::table('comments')->select('id','body','user_id','commentable_id')->orderBy('id','desc')->get();
            
     
        return view('Frontview.posts.blog')->with('comments',$comments)->with('posts',$posts)->with('users',$users);
     }

    public function create()
    {
        //
    }



    public function likespage(){
        $posts = DB::table('posts')->select('id','body','img','author','created_at')->orderBy('id','desc')->get(); 
        
        $users = new User();
        $likes = new Like();


            $users = DB::table('users')->select('id','name')->get();
            $likes = DB::table('likes')->select('id','user_id','post_id')->get();
           
        return view('Frontview.posts.likes')->with('posts',$posts)->with('users',$users)->with('likes',$likes);

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
        $post = new Post();

        $post->body = $request->input('body');
        $post->author = $request->input('author');

        if($request->hasfile('image')){
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . " . " . $extension;
            $file->move('uploads/post/',$filename);
            $post->img =$filename;
        }else{
            return $request;
            $post->img = '';
        }
        $post->save();
        // return view('Frontview.posts.index')->with('post',$post);
        return redirect()->route('postslist',['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $post = Post::find($post->id);
   
        return view('Frontview.posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $post = Post::find($post->id);
   
        return view('Frontview.posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $image = $request->input('image');
        if($image == null){
            $image = $post->img;
        }else {
            $image = $request->input('image');
        }

        $postUpdate = Post::where('id',$post->id)
        ->update([
            'body'   => $request->input('body'),
            'author' => $request->input('author'),
            'img'    => $image
        ]);
        if($postUpdate){
            return redirect()->route('postslist',['post' => $post->id])->with('success','Post Updated Successfully');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $findpost = Post::find($post->id);
        if($findpost->delete()){
            return redirect()->route('postslist',['post'=> $post->id])->with('success','Post Deleted Successfully');
        }
        return back()->withInput();
    }


        public function comment(Request $request) {
        $posts = DB::table('posts')->select('id','body','img','author','created_at')->orderBy('id','desc')->get();
        
        
        $comments = new Comment();
        $users    = new User();

        $comments->body = $request->input('commentbody');
        $comments->user_id = Auth::id();
        $comments->commentable_id = $request->input('post_id');
        $comments->save();
        

        foreach($posts as $post){
        $comments = DB::table('comments')->select('body','user_id','commentable_id')->get();

        }
        $users = DB::table('users')->select('id','name')->get();
           
        return view('Frontview.posts.blog')->with('posts', $posts)->with('comments', $comments)->with('users',$users);
    }

    public function getcomment(){
        $posts = DB::table('posts')->select('id','body','img','author','created_at')->orderBy('id','desc')->get();        
        $comments = new Comment();
        foreach($posts as $post)
        {
            $comments = DB::table('comments')->select('body','user_id','commentable_id')->where('commentable_id', $post->id)->get();
        }
       
        return view('Frontview.posts.blog')->with('comments',$comments)->with('posts',$posts);
        
    }


    public function likepost(Request $request){
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update  = false;
        $post    = Post::find($post_id);
    
        if(!$post){
            return null;
        }
        $user = Auth::user();
        $like = $user->like()->where('post_id', $post_id)->first();

        if($like){
            $already_like =$like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        }else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;

        if($update){
            $like->update();
        }else {
            $like->save();
        }
        return null;
    }

}
