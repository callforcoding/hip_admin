<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    
    protected $guarded = [];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $attributes = [
        'password' => false
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getData()
    {
        $role_id = Route::currentRouteName()=="freelancer.index"?3:2;
        return static::where('role',$role_id)->orderBy('created_at','desc')->get();
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

}
