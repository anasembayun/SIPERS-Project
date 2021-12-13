<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \DB::table('users')->insert([
            [
                'name' => 'Admin',
                'jk' => 'Laki-laki',
                'alamat' => 'Yogyakarta',
                'email' => 'admin@gmail.com',
                'password' => \Hash::make('admin12345'),
                'is_admin'=>'1',
            ],
        ]);
    }
    
}
