<?php

namespace App\Database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder
 * @package App\Database\seeds
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Model::unguard();
        $this->command->call('migrate:fresh');
        $this->command->line('Fake data removed');
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->command->info('Users created!');
        $this->call(EventsTableSeeder::class);
        $this->command->info('Events created');
        $this->call(RestaurantsTableSeeder::class);
        $this->command->info('Restaurants created!');
        Model::reguard();
    }
}
