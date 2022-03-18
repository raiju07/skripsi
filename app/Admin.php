<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = "admin";
    protected $guard = 'admin';
    public $timestamps = false;

    protected $fillable = [
        'nama', 'email', 'password','alamat', 'telp', 'foto', 'jabatan'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token){
    	$this->notify(new AdminResetPasswordNotification($token));
    }
}
