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
        'eid',
        'oid', 
        'escid', 
        'subid', 

        'uid',
        'pid', 
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
        return Str::random(128);
    }

    public static function authenticate($uid, $rid,  $password)
    {
        //$user = self::where('email', $email)->first();
        $user = self::where('uid', $uid)->where('rid', $rid)->first();

        if ( $user && md5($password)== $user->password/*$user && Hash::check(md5($password), $user->password)*/) {
//            echo json_encode($user);
            $ua = BUserAuth::create([
                'eid'   =>$user->eid,
                'oid'   =>$user->oid,
                'uid'   =>$user->uid,
                'pid'   =>$user->pid,
                'escid' =>$user->escid,
                'subid' =>$user->subid,
                'token' =>self::generateToken(),
            ]);
            //$user->api_token = self::generateToken();
            //$user->save();
            return $ua->token;
        }

        return null;
    }

    
}
