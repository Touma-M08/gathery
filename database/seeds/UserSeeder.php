<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => "管理者",
            'age' => 2,
            'sex' => 0,
            'email' => "test@test",
            'password' => Hash::make("testuser"),
            'admin' => 1
        ]);
    }
}
