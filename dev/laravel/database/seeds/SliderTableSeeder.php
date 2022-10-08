<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Slider::create([
      'title' =>'Slider1',
      'image' =>'uploads/slider/1.jpg',
      'url' =>'',
      ]);
      App\Slider::create([
      'title' =>'Slider2',
      'image' =>'uploads/slider/2.jpg',
      'url' =>'',
      ]);
      App\Slider::create([
      'title' =>'Slider3',
      'image' =>'uploads/slider/3.jpg',
      'url' =>'',
      ]);
    }
}
