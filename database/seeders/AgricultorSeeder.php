<?php

namespace Database\Seeders;

use App\Models\Agricultor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgricultorSeeder extends Seeder
{
    // static $name = [
    //     User::all,
    // ];

    static $user_id = [
        '1',
    ];

    static $cpf = [
        '13753936936',
    ];

    static $phone = [
        '41123451234',
    ];

    static $email = [
        'seu@joao.com',
    ];

    static $password = [
        'joao123',
    ];

    static $cep = [
        '12345678',
    ];

    static $cidade = [
        'Paranaguá',
    ];

    static $nome_propriedade = [
        'Rancho Feliz',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // LAÇO FOR PARA CRIAR OS OBJETOS SEEDERS
        for($i = 0; $i < count(self::$phone); $i++)
        {
            $agricultor = Agricultor::create([
                Agricultor::CAMPO_USER_ID => self::$user_id[$i],
                // Agricultor::CAMPO_NOME => mb_strtoupper(self::$name[$i], 'UTF-8'),
                //Agricultor::CAMPO_NOME => User::all()->name()->id(1),
                Agricultor::CAMPO_CPF => self::$cpf[$i],
                Agricultor::CAMPO_PHONE => self::$phone[$i],
                Agricultor::CAMPO_EMAIL => self::$email[$i],
                Agricultor::CAMPO_PASSWORD => self::$password[$i],
                Agricultor::CAMPO_CEP => self::$cep[$i],
                Agricultor::CAMPO_CIDADE => mb_strtoupper(self::$cidade[$i], 'UTF-8'),
                Agricultor::CAMPO_NOME_PROPRIEDADE => mb_strtoupper(self::$nome_propriedade[$i], 'UTF-8'),
            ]);

            $agricultor->save();
        }
    }
}
