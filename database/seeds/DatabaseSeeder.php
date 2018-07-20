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
        //добавление настройки для email в таблицу settings
        $this->call(SettingsTableSeeder::class);

        //добавление меню в таблицу menu
        $this->call(MenusTableSeeder::class);
    }
}
