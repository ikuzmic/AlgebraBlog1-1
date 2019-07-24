<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    // $role->users
    // dohvati sve usere koji imaju tu rolu
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
