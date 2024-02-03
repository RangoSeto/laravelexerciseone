<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Gender extends Model
{

    protected $table = "genders";
    protected $primarykey = "id";

    use HasFactory;

    public function articles(){

        // HasManyThrough(related,through)
        // return $this->hasManyThrough(Article::class,User::class);

        // = HasManyThrough(related,through,firstkey,secondkey)
        return $this->hasManyThrough(Article::class,User::class,'gender_id','user_id');
    }
}

// 27MT 