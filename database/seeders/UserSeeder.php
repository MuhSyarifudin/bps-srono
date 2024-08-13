<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        $user = [
            [
            'username'=>'MuhSyarifudin',
            'name'=>'Muhamad Syarifudin',
            'email'=>'muhamadsyarifudin708@gmail.com',
            'password'=>Hash::make('123.Brilian'),
            'avatars'=>'user-1.jpg']
        ];

        foreach ($user as $each) {
          User::create($each);  
        };
    }
}
