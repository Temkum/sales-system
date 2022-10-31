<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*  public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    } */

    public function roles()
    {
        # code...
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * check if user has a role
     * @param string $role
     * @return bool
     */

    public function hasAnyRole($role)
    {
        # code...
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * check if user has any given role
     * @param array $role
     * @return bool
     */

    public function hasAnyRoles($role)
    {
        # code...
        return null !== $this->roles()->whereIn('name', $role)->first();
    }
}