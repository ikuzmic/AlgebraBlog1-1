<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
   public function posts(){
       return $this->hasMany(Post::class);
   }

   public function getRouteKeyName()
    {
        return 'name';
    }
}
