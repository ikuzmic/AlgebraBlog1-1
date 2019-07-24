<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name'];
    
    // $cat->posts
    // dohvati sve postove koji spadaju u tu kategoriju
    public function posts(){
       return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
