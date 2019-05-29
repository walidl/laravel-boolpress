<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title','body','author_id'];


    function categories(){

      return $this->belongsToMany(Category ::class);
    }

    function author(){

      return $this->belongsTo(Author::class);

    }

    function preview(){

    $tagless = Strip_tags($this->body);
    $arr = explode(' ',trim($tagless));

    if(sizeof($arr)> 20){

      $preview = "";
      for ($i=0; $i < 20; $i++) {

        $preview .= " ". $arr[$i];

      }

      return $preview . "...";
    }

    return $tagless;

    }

    function checkCategory($catId){


      // dd($this->categories)

      foreach ($this->categories as $category) {

        if($category->id == $catId){

          return "checked";
        }

      }

      return "";

    }
}
