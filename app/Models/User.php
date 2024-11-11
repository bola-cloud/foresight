<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'mobile_phone',
        'student_code',
        'device_id',
        'year_type',
        'mobile_father',
        'wallet',
        'utype',
        'current_team_id',
        'profile_photo_path'
    ];

    public function question()
    {
        return $this->hasMany(StudentQuestion::class);
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class,'student_lecture');
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class,'student_unit');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class,'user_id');
    }
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
