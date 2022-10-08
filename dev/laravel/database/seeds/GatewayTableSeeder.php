<?php

use Illuminate\Database\Seeder;

class GatewayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Gateway::create([
      'paypal_active' =>'1',
      'paypal_client_id'=>'ARp5caOdXyUzjhYBooYaikaJ2jVuJOLkb-YrDTplRQkBXPdNTyNvMbVGB4FWOJ6Jbt',
      'paypal_client_secret'=>'EBH1dDmmChz00Cvcwb9VeLpygxV6vX_deW2O7zla7xhj0nhTsThWYd9Zo-AiMtkrs',
      'stripe_active'=>'1',
      'stripe_publishable_key'=>'pk_test_qKe8nGFSUZkLRt0ETMieMh80',
      'stripe_secret_key'=>'sk_test_ySExMEvYiX71wvqDmLAMu1UC',
      'voguepay_active'=>'1',
      'voguepay_merchant_id'=>'demo',
    ]);
    }

}
