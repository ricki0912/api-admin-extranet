<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


     protected $table = 'base_users';

    protected $fillable = [
        'uid',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /*
    protected $hidden = [
        'password',
        'remember_token',
    ];*/

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    
    /* protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];*/



    public static function generateToken()
    {
        return Str::random(60);
    }

    public static function authenticate($email, $password)
    {
        $user = self::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            $user->api_token = self::generateToken();
            $user->save();
            return $user->api_token;
        }

        return null;
    }
}
