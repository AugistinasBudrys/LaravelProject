<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTableSeeder extends Seeder
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
        $this->count = (int)$this->command->ask('How many Events do you need?', $this->count);
        $this->command->info("Creating {$this->count} Events.");
        factory(Event::class, $this->count)->create();
        $this->command->info('Events created!');

    }
}
