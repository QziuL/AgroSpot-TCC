<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    public const TABELA_PRODUTO = "produtos";

    public const CAMPO_DELETED_AT = "deleted_at";
    public const CAMPO_CREATED_AT = "created_at";
    public const CAMPO_UPDATED_AT = "updated_at";

    public const CAMPO_ID = "id";
    public const CAMPO_NOME = "nome";
    public const CAMPO_DESCRICAO = "descricao";
    public const CAMPO_CODIGO = "codigo";
    public const CAMPO_DISPONIBILIDADE = "disponibilidade";
}
