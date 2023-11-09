<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agricultor extends Model
{
    use HasFactory;

    public const TABELA_AGRICULTOR = "agricultores";

    //public const CAMPO_DELETED_AT = "deleted_at";
    public const CAMPO_CREATED_AT = "created_at";
    public const CAMPO_UPDATED_AT = "updated_at";

    public const CAMPO_ID = "id";
    public const CAMPO_USER_ID = "user_id";
    public const CAMPO_NOME = "name";
    public const CAMPO_CPF = "cpf";
    public const CAMPO_PHONE = "phone";
    public const CAMPO_EMAIL = "email";
    public const CAMPO_PASSWORD = "password";
    public const CAMPO_CEP = "cep";
    public const CAMPO_CIDADE = "cidade";
    public const CAMPO_NOME_PROPRIEDADE = "nome_propriedade";
    public const CAMPO_EMAIL_VERIFICADO = "email_verified_at";


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'telefone',
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
        'password' => 'hashed',
    ];

    //protected $primaryKey = 'cpf';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
