<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Owner']);
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Franchise Owner']);
        Role::create(['name' => 'Franchise Admin']);
        Role::create(['name' => 'KAM Sales']);
        Role::create(['name' => 'KAM Operation']);
        Role::create(['name' => 'User']);
    }
}
