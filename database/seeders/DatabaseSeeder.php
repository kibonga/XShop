<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductModel;
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
        if($this->command->confirm('Do you want to refresh DB?', true)) {
            $this->command->call('migrate:refresh');
            $this->command->info('Database refreshed successfully');
        }
        // \App\Models\User::factory(10)->create();
        $this->call([
            NavSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            ProductModelSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
            OrderLineSeeder::class,
        ]);

    }
}
