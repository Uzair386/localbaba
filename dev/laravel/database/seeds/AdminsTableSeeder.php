<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Admin::create([
      'name' =>'root',
      'display_name' =>'Root',
      'email' =>'root@localbaba.pk',
      'password' =>bcrypt('password')
    ]);
    }
}
