<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = [
        'body',
        'img',
        'author',
    ];
    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    
    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    /*public function like(){
        return $this->hasMany('App\Like');
    }*/
    public function like(){
        return $this->belongsTo('App\Like');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
