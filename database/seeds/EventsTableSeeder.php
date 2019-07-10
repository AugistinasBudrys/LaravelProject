<?php

use Illuminate\Database\Seeder;
use App\User;
use App\event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::truncate();
        DB::table('event_user')->truncate();
        $test1User=User::where('name','admin')->first();
        $test2User=User::where('name','user')->first();

    $test1 = event::create([
        'date'=>'2019/09/1',
        'name'=>'rugsejo pirma',
        'description'=>'rugsejo pirmos svente'
    ]);
    $test2 = event::create([
        'date'=>'1998/05/30',
        'name'=>'svente',
        'description'=>'kazkas tokio'
    ]);

        $test1->eventusers()->attach($test1User);
        $test2->eventusers()->attach($test2User);
    }
}
