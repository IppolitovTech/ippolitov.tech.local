<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\MainMenu;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainMenu::updateOrCreate(
            [
                'name_page' => 'Head',
                'link' => '/'
            ],
        );

        MainMenu::updateOrCreate(
            [
                'name_page' => 'Portfolio',
                'link' => 'portfolio'
            ],
        );

        MainMenu::updateOrCreate(
            [
                'name_page' => 'Contacts',
                'link' => 'contacts'
            ]
        );
    }
}
