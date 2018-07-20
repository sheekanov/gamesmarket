<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainMenu = new \App\Menu();
        $mainMenu->name = 'Main';
        $mainMenu->save();

        $adminMenu = new \App\Menu();
        $adminMenu->name = 'Admin';
        $adminMenu->save();
    }
}
