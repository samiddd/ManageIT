<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_user' => 'Dimas',
            'email' => 'dimas@gmail.com',
            'password' => Hash::make('password'),
            'whatsapp' => '085845591668',
        ],
    );

    DB::table('users')->insert([
        'nama_user' => 'Qulub',
        'email' => 'qulub@gmail.com',
        'password' => Hash::make('password'),
        'whatsapp' => '089687835828',
    ],);

    DB::table('users')->insert([
        'nama_user' => 'Zudha',
        'email' => 'zudha@gmail.com',
        'password' => Hash::make('password'),
        'whatsapp' => '085784260416',
    ],);
    }
}
