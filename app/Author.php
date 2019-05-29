<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected  $fillable=[

    'name',
    'lastname',
    'username'
  ];

  function posts(){
    
      return $this->hasMany(Post::class);
    }

}
