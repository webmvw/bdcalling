<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'bdcalling it ltd',
        	'email' => 'masudrana.bbpi@gmail.com',
        	'password' => bcrypt('mvw1213'),
        	'role_id' => '1',
            'status' => '1',
        ]);
    }
}
