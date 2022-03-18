<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "pelamar";
    public $timestamps = false;

    protected $fillable = [
        'nama', 'email','telp','alamat','tempat_lahir', 'tgl_lahir', 'foto', 'cv','password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class, 'pelamar_id', 'id');
    }

    public function lamaran()
    {
        return $this->hasOne(Lamaran::class, 'pelamar_id', 'id');
    }
}
