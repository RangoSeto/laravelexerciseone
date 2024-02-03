<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primarykey = 'id';
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function article(){
        // Method1 
        // return $this->hasOne('App\Models\Article');

        // Method 2
        return $this->hasOne(Article::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function roles(){

        // return $this->belongsToMany(Role::class); //obey by naming conversion

        // =For Custom Table name
        // BelongsToMany(primarytable,secondarytable,secondarytable_fk,primarytable_fk)
        // BelongsToMany(related,dummytable,foreignPivotKey,relativePivotKey)

        return $this->belongsToMany(Role::class,'userroles','user_id','role_id');
    }

    // = belongsToMany with withPivot()
    public function rolecreatedate(){
        // return $this->belongsToMany(Role::class)->withPivot('created_at'); //error Base table or viewtable not found

        return $this->belongsToMany(Role::class,'userroles','user_id','role_id')->withPivot('created_at');
    }

    public function photos(){
        // morphMany(relatedtable,name);
        return $this->morphMany(Photo::class,'imageable');
    }

    public function comments(){
        // morphMany(relatedtable,name);
        return $this->morphMany(Article::class,'commentable');
    }


    public function phone(){
        return $this->hasOne(Phone::class);
    }


    public function countries(){
        return $this->hasMany(Country::class);
    }

}
