<?php

namespace App\Database\seeds;

use Illuminate\Database\Seeder;
use App\Models\Event;

/**
 * Class EventsTableSeeder
 * @package App\Database\seeds
 */
class EventsTableSeeder extends Seeder
{
    /**
     * @var int
     */
    private
        $count = 10;

    /**
     * Run the events seeds.
     *
     * @return void
     */
    public
    function run(): void
    {
        $this->count = (int)$this->command->ask('How many Events do you need?', $this->count);
        $this->command->info("Creating {$this->count} Events.");
        factory(Event::class, $this->count)->create();
        $this->command->info('Events created!');

    }
}
