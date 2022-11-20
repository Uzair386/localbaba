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
        //$this->call(PagesTableSeeder::class);
        //$this->call(AdminsTableSeeder::class);
        //$this->call(CategoryTableSeeder::class);
        //$this->call(CurrencyTableSeeder::class);
        //$this->call(GatewayTableSeeder::class);
        //$this->call(SettingsTableSeeder::class);
        //$this->call(SliderTableSeeder::class);
        //$this->call(CountryTableSeeder::class);
        $this->call(VariantTableSeeder::class);
        // CRAWLER
        //$this->call(AliexpressTableSeeder::class);
        //$this->call(EbayTableSeeder::class);



    }
}
