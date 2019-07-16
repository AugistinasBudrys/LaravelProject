<?php

namespace App\Database\seeds;

use Illuminate\Database\Seeder;
use App\Models\Role;

/**
 * Class RolesTableSeeder
 * @package App\Database\seeds
 */
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}
