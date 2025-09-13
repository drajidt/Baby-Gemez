<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
 
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory,Notifiable;

    /**
     * Atribut yang dapat diisi (fillable).
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'role',];
    /**
     * Atribut yang harus disembunyikan dalam array JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang harus dikonversi ke tipe data lain.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
