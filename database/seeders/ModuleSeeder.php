<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Sanctum\PersonalAccessToken;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Create default user');

        for ($i = 1; $i <= 10; $i++) {
            \App\Models\Module::factory(1)->hasAttached(
                User::inRandomOrder()->first()
            )->create();
        }


        $this->command->info('Default user was inserted Successfully');
    }
}
//1|MIcLhopvqfMQlA2cVwk1UlEcwaRrJH9xNt2vP12e / 3e8345bc30dca8ae25679f948f98eccefd99bef29075b99db224020501864485
