<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
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
            $adminRole =Role::where('name','admin')->first();
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