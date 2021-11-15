<?php

namespace App\Models;

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
        'status',
        'google_id',
        'github_id'
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

    public function roles() {
        return $this -> belongsToMany(Roles::class);
    }

    public function hasRole($name) {
        return $this -> roles() -> where('name' , $name) -> exists();
    }
    public function hasRoles($names) {
        foreach($names as $name) {
            if(!($this -> roles() -> where('name',$name)  -> exists())) return false;
        }
        return true;
    }
    public function hasOrRoles($names){
         return $this -> roles() -> whereIn('name' , $names) -> exists();
    }
}