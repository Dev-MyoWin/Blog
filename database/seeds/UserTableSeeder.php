<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kyaw Kyaw',
            'email' => 'kyaw@gmial.com',
            'password' => Hash::make('secret'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
           'name' => 'Hla HLa',
           'email' => 'hla@gmail.com',
           'password' => Hash::make('secret'),
           'role_id' => 1,
           'created_at' => now(),
           'updated_at' => now()
       ]);
       DB::table('users')->insert([
          'name' => 'Aung Aung',
          'email' => 'aung@gmail.com',
          'password' => Hash::make('secret'),
          'role_id' => 1,
          'created_at' => now(),
          'updated_at' => now()
      ]);
      DB::table('users')->insert([
         'name' => 'Unknown',
         'email' => 'unknown@gmail.com',
         'password' => Hash::make('secret'),
         'role_id' => 1,
         'created_at' => now(),
         'updated_at' => now()
     ]);
        DB::table('users')->insert([
           'name' => 'Admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('secret'),
           'role_id' => 2,
           'created_at' => now(),
           'updated_at' => now()
       ]);
    }
}
