<?php

namespace App\Database\seeds;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

/**
 * Class RestaurantsTableSeeder
 * @package App\Database\seeds
 */
class RestaurantsTableSeeder extends Seeder
{
    /**
     * @var int
     */
    private
        $count = 10;

    /**
     * Run the restaurants seeds.
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
