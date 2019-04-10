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
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'role' => 'admin',
          'password' => bcrypt('admin123'),
      ]);

      DB::table('users')->insert([
          'name' => 'user',
          'email' => 'user@user.com',
          'role' => 'user',
          'password' => bcrypt('users123'),
      ]);
    }
}
