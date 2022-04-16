<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Sanctum\PersonalAccessToken;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Create default user');
        $student = Student::create(
            [
                'card_number' => 'random',
                'formation' => 'random',
                'level' => 'random',
            ]
        );
        $student->user()->create([
            'first_name' => 'john',
            'last_name' => 'doe',
            'email' => 'user1@app.com',
            'birth_date' => now()->subYears(20),
            'password' => '$2y$10$E0MWmI0qSV0mnoQSP0KF/.XTphqyK1Nt1rAStajyKeAXLF55w6IJu', //password
        ]);

        $student = Student::create(
            [
                'card_number' => 'random',
                'formation' => 'random',
                'level' => 'random',
            ]
        );
        $student->user()->create([
            'first_name' => 'joe',
            'last_name' => 'doe',
            'email' => 'user2@app.com',
            'birth_date' => now()->subYears(20),
            'password' => '$2y$10$E0MWmI0qSV0mnoQSP0KF/.XTphqyK1Nt1rAStajyKeAXLF55w6IJu', //password
        ]);

        $conversation = Conversation::create([
            'serial' => '123456',
            'first_user_id' => 1,
            'second_user_id' => 2
        ]);

        $this->command->info('Default user was inserted Successfully');
    }
}
//1|MIcLhopvqfMQlA2cVwk1UlEcwaRrJH9xNt2vP12e / 3e8345bc30dca8ae25679f948f98eccefd99bef29075b99db224020501864485
