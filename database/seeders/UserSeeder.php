<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            ['name'=>'ahmed','email'=>'ahmed1@yahoo.com','password'=> '12345'],
            ['name'=>'said','email'=>'said1@yahoo.com','password'=> '12345'],
            ['name'=>'samir','email'=>'samir1@yahoo.com','password'=> '12345'],
            ['name'=>'noor','email'=>'noor1@yahoo.com','password'=> '12345'],
            ['name'=>'adel','email'=>'adel1@yahoo.com','password'=> '12345'],
            ['name'=>'ali','email'=>'ali1@yahoo.com','password'=> '12345'],
            ['name'=>'doc','email'=>'doc1@yahoo.com','password'=> '12345'],
            ['name'=>'eng','email'=>'eng1@yahoo.com','password'=> '12345'],
            ['name'=>'mohamed','email'=>'mohamed1@yahoo.com','password'=> '12345'],
        ];
        User::insert($users);
    }
}
