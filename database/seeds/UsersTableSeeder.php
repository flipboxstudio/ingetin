<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@flipbox.co.id',
            'role' => 'admin',
            'password' => Hash::make('admin'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

		DB::table('users')->insert([
            'name' => 'Aqid',
            'email' => 'aqid@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('aqid'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

		DB::table('users')->insert([
            'name' => 'Alfa',
            'email' => 'alfa@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('alfa'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

		DB::table('users')->insert([
            'name' => 'Deden',
            'email' => 'deden@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('deden'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Eriza',
            'email' => 'eriza@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('eriza'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ace',
            'email' => 'ace@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('ace'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Faizal',
            'email' => 'faizal@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('faizal'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'Kers',
            'email' => 'kers@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('kers'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

		DB::table('users')->insert([
            'name' => 'Bhakti',
            'email' => 'bakti@flipbox.co.id',
            'role' => 'user',
            'password' => Hash::make('bakti'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
