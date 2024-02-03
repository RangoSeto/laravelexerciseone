<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentable(){
        // morphTo('name');
        return $this->morphTo('commentable'); // Note:: if you use imageable_id imageable_type ! set here imageable
    }

}
