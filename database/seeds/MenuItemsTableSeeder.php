<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Меню админки
        $adminMenu = \App\Menu::where('name', '=', 'Admin')->first();

        $adminItems = [];
        $adminItems[0] = array(
            'title' => 'Настройки',
            'route_name' => 'admin.settings'
        );
        $adminItems[1] = array(
            'title' => 'Категории',
            'route_name' => 'admin.categories'
        );
        $adminItems[3] = array(
            'title' => 'Продукты',
            'route_name' => 'admin.products'
        );
        $adminItems[4] = array(
            'title' => 'Заказы',
            'route_name' => 'admin.orders'
        );
        $adminItems[5] = array(
            'title' => 'Новости',
            'route_name' => 'admin.news'
        );

        //Меню главное
        $mainMenu = \App\Menu::where('name', '=', 'Main')->first();

        $mainItems = [];
        $mainItems[0] = array(
            'title' => 'Главная',
            'route_name' => 'home'
        );
        $mainItems[1] = array(
            'title' => 'Мои заказы',
            'route_name' => 'myOrders'
        );
        $mainItems[2] = array(
            'title' => 'Новости',
            'route_name' => 'news'
        );
        $mainItems[3] = array(
            'title' => 'О компании',
            'route_name' => 'about'
        );

        foreach ($adminItems as $adminItem) {
            $menuItem = new \App\MenuItem();
            $menuItem->menu_id = $adminMenu->id;
            $menuItem->title = $adminItem['title'];
            $menuItem->route_name = $adminItem['route_name'];
            $menuItem->save();
        }


        foreach ($mainItems as $mainItem) {
            $menuItem = new \App\MenuItem();
            $menuItem->menu_id = $mainMenu->id;
            $menuItem->title = $mainItem['title'];
            $menuItem->route_name = $mainItem['route_name'];
            $menuItem->save();
        }
    }
}
