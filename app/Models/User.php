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

    // =======================================================
    // DEFININDO CONSTANTES PARA REFERENCIAR OS DADOS DO BANCO
    public const TABELA_USER = "users";

    //public const CAMPO_DELETED_AT = "deleted_at";
    public const CAMPO_CREATED_AT = "created_at";
    public const CAMPO_UPDATED_AT = "updated_at";

    public const CAMPO_ID = "id";
    public const CAMPO_NOME = "name";
    public const CAMPO_PHONE = "phone";
    public const CAMPO_EMAIL = "email";
    public const CAMPO_PASSWORD = "password";
    public const CAMPO_EMAIL_VERIFICADO = "email_verified_at";
    // =======================================================

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'tipo',
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

    public function agricultor() {
        return $this->hasOne(Agricultor::class);
    }    
}
