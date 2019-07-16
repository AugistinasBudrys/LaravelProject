<?php

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private
        $count = 10;

    /**
     * Run the conferences seeds.
     *
     * @return void
     */
    public
    function run(): void
    {
        $this->count = (int)$this->command->ask('How many Restaurants do you need?', $this->count);
        $this->command->info("Creating {$this->count} Restaurants.");
        factory(Restaurant::class, $this->count)->create();
        $this->command->info('Restaurants created!');

    }
}
