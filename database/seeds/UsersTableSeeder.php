<?php

namespace App\Database\seeds;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

/**
 * Class UsersTableSeeder
 * @package App\Database\seeds
 */
class UsersTableSeeder extends Seeder
{
    /**
     * @var int
     */
        private
        $count = 10;

        /**
         * Run the user seeds.
         *
         * @return void
         */
        public
        function run(): void
        {
            $adminRole =Role::where('name','admin')->first();

            //TODO: redo
            $admin = User::create([
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>bcrypt('admin')
            ]);
            $admin->roles()->attach($adminRole);


            $this->count = (int)$this->command->ask('How many Users do you need?', $this->count);
            $this->command->info("Creating {$this->count} Users.");
            factory(User::class, $this->count)->create();
            $this->command->info('Users created!');

        }
}