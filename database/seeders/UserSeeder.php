<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    static $name = [
        'Maicon da Silva',
        'Naicon do Santos',
        'Laicon dos Salvos',
    ] ;

    static $phone = [
        '41123451234',
        '42123451235',
        '43123451236',
    ];

    static $email = [
        'maicon@silva.com',
        'naicon@santos.com',
        'laicon@salvos.com',
    ];

    static $password = [
        'maicon123',
        'naicon123',
        'laicon123',
    ];
    
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        // LAÇO FOR PARA CRIAR OS OBJETOS SEEDERS
        for($i = 0; $i < count(self::$name); $i++)
        {
            $user = User::create([
                User::CAMPO_NOME => mb_strtoupper(self::$name[$i], 'UTF-8'),
                User::CAMPO_PHONE => self::$phone[$i],
                User::CAMPO_EMAIL => self::$email[$i],
                User::CAMPO_PASSWORD => self::$password[$i],
            ]);
            $user->save();
        }
    }
}
