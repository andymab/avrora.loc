<?php

namespace Database\Seeders;

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
        // запуск seeder созданые через php artisan make:seeder BlogCategoriesTableSeeder 
        // позволяют произвести первичное заполнение данными
        $this->call(UsersTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(MgroupsTableSeeder::class);
        $this->call(CatalogsTableSeeder::class);
     // если созданы фабрики через  php artisan make:factory BlockPost
     // позволяют произвести первичное заполнение данными в определенном количестве
     //   \App\Models\features::factory(1)->create();
     //   \App\Models\mgroups::factory(1)->create();
     //   \App\Models\catalogs::factory(1)->create();
     // \App\Models\User::factory(10)->create();
    }
}
