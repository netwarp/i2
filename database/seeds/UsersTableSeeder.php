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
    	DB::table('users')->truncate();

        DB::table('users')->insert([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => '$2y$10$SLEKtArymI1gCjrTtDj78Ot2asL/Z/IHCS6dWhMN/4XLRXrw7Kthu'
        ]);
    }
}
