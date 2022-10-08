<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Category::create([
      'parent_id' =>'0',
      'name' =>'General',
      'slug' =>'general',
      'description' =>'Default Root Table',
    ]);
    }
}
