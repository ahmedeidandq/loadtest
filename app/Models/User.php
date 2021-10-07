<?php

namespace App\Models;

use App\Models\Penalty;
use App\Models\Req;
use App\Models\SignInOut;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function signIns()
    {
        return  $this ->hasMany(SignInOut::class) ;
    }

    public function penalties()
    {
        return  $this ->hasMany(Penalty::class, 'emp_id') ;
    }

    public function requests()
    {
        return  $this ->hasMany(Req::class, 'emp_id') ;
    }
}
