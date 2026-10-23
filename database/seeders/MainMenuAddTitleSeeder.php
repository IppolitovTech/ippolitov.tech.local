<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MainMenu;

class MainMenuAddTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainMenu::where('link', 'head')->update(['title' => 'Open journal system developer']);
        MainMenu::where('link', 'portfolio')->update(['title' => 'Portfolios of web developer']);
        MainMenu::where('link', 'contacts')->update(['title' => 'Contacts vue.js developer']);
    }
}
