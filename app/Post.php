<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
   // protected $fillable = ['title', 'body', 'user_id', 'slug'];
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');//https://laravel.com/docs/5.8/eloquent-relationships#one-to-many
    }

    // $post->comments
    // dohvati sve komentare za post
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
