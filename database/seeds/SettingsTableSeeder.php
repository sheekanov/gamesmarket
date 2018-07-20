<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderEmail = new \App\Setting();
        $orderEmail->name = 'order_email';
        $orderEmail->value = 'sheekanov@gmail.com';
        $orderEmail->save();

    }
}
