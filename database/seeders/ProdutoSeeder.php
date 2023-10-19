<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    static $nome = [
        'Tomate',
        'Alface',
        'Ovos caipira',
    ];

    static $descricao = [
        'Tomatinhos frescos',
        'Pé de alface mt gostosinho',
        'A galinha caipira botou ovos',
    ];

    static $codigo = [
        '001',
        '002',
        '003',
    ];

    static $disponibilidade = [
        '1',
        '1',
        '1',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < count(self::$nome); $i++) {
            $produto = Produto::create([
                Produto::CAMPO_NOME => mb_strtoupper(self::$nome[$i], 'UTF-8'),
                Produto::CAMPO_DESCRICAO => mb_strtoupper(self::$descricao[$i], 'UTF-8'),
                Produto::CAMPO_CODIGO => self::$codigo[$i],
                Produto::CAMPO_DISPONIBILIDADE => self::$disponibilidade[$i],
            ]);
            $produto->save();
        }
    }
}
