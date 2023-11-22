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

    static $image = [
        '65b203dc703c950acc22d62aea7dd07e.png',
        '2109a0a7bb33c819da34354703739c8a.png',
        'f377b1d14a444edc7a89dc877c0d8044.png',
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
                Produto::CAMPO_IMAGE => self::$image[$i],
            ]);
            $produto->save();
        }
    }
}
