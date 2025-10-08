<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
            'gender',
            'merital_status',
            'profile',
            'dob',
            'type',
            'amount_per_minute',
            'place_of_birth',
            'state',
            'uncrypted_password',
            'city',
            'time',
            'experiance',
            'rating',
            'language',
            'bio',
            'wallet',
            'phone_number',
            'password',
            'role'
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
        'password' => 'hashed',
    ];
    // messages sent by the user
public function messagesSent()
{
    return $this->hasMany(Message::class, 'sender_id');
}

// messages received by the user
public function messagesReceived()
{
    return $this->hasMany(Message::class, 'receiver_id');
}

}
