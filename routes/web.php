<?php
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Post;
use App\User;
use App\Like;
use App\Comment;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Frontview.index');
});

Route::post('/search', function () {
    $q = Input::get('search');
    if($q != ' '){
        $users = DB::table('users')->select('id','name')->get();
          
        $comments = DB::table('comments')->select('id','body','user_id','commentable_id')->orderBy('id','desc')->get();
           
        $post = DB::table('posts')->select('id','body','img','author','created_at')->where('body', 'LIKE', '%'. $q . '%')->get();

        $posts = DB::table('posts')->select('id','body','img','author','created_at')->orderBy('id','desc')->get(); 
        
        //$post = Post::select('id','body','img','author','created_at')->where('body', 'LIKE', '%'. $q . '%')->get();
        if(count($post) > 0){
            return view('search')->withDetails($post)->withQuery($q)
            ->with('users',$users)->with('comments',$comments)->with('posts',$posts);
        }
    }
    return view('search')->withMessage('Sorry, No Search Result')->with('posts',$posts);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'indexController@index')->name('index');

Route::get('/blog', 'BlogController@index')->name('index');

Route::get('/contact', 'ContactController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('postindex', 'PostsController@postindex')->name('postindex');



Route::get('/admin', 'UsersController@login')->name('index');


//Route::get('single', 'PostsController@sidebar')->name('single');



Route::get('/contact', 'ContactController@index')->name('index');

Route::get('postslist', 'PostsController@postslist')->name('postslist');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController');

Route::resource('likes', 'LikesController');

Route::resource('comments', 'CommentsController');

Route::resource('users', 'UsersController');

Route::post('comment', 'PostsController@comment')->name('comment');


Route::get('edit', 'UsersController@edit')->name('edit');

Route::get('getcomment', 'PostsController@getcomment')->name('getcomment');


Route::get('complains','ContactController@complains')->name('complains');

Route::get('/addpost', 'PostsController@addpost')->name('addpost');

Route::post('/submitpost', 'PostsController@store')->name('submitpost');

Route::post('/submitlike', 'LikesController@store')->name('submitlike');

Route::post('blog', 'PostsController@likepost')->name('like');

Route::post('contact', 'ContactsController@contact')->name('contact');


Route::get('likespage', 'PostsController@likespage')->name('likespage');

Route::get('contactpage', 'ContactController@contactpage')->name('contactpage');
