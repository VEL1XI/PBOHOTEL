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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'phone',
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


    /**
     * The attributes that should be appended to array and JSON forms.
     *
     * @var array
     */
    protected $appends = [
        'initials',
    ];


    public function customer(){
        return $this->hasOne(Customer::class,'user_id', 'id');
    }

    /**
     * Get the initials (e.g., "N" from "Noel")
     *
     * @return string
     */
    public function getInitialsAttribute()
    {
        $string = trim(preg_replace('/\s+/', ' ', $this->name));
        $words = explode(' ', $string);

        if (count($words) < 2) {
            return strtoupper($words[0][0]);
        }

        $firstInitial = strtoupper($words[0][0]);
        $lastInitial = strtoupper(end($words)[0]);

        return $firstInitial . $lastInitial;
    }

}
