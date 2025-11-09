<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@mubs.ac.ug',
            'password' => Hash::make('password123'),
            'registration_number' => 'ADM001',
            'phone' => '+256700000001',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Counselors
        $counselors = [
            ['name' => 'Dr. Sarah Nakato', 'email' => 'sarah.nakato@mubs.ac.ug', 'registration_number' => 'CNS001', 'phone' => '+256700000002'],
            ['name' => 'Mr. James Okello', 'email' => 'james.okello@mubs.ac.ug', 'registration_number' => 'CNS002', 'phone' => '+256700000003'],
            ['name' => 'Ms. Grace Achieng', 'email' => 'grace.achieng@mubs.ac.ug', 'registration_number' => 'CNS003', 'phone' => '+256700000004'],
        ];

        foreach ($counselors as $counselor) {
            User::create(array_merge($counselor, [
                'password' => Hash::make('password123'),
                'role' => 'counselor',
                'email_verified_at' => now(),
            ]));
        }

        // Students (Project Team)
        $students = [
            ['name' => 'Kyomuhangi Betty', 'email' => 'betty.kyomuhangi@mubs.ac.ug', 'registration_number' => '23/U/10574/EVE', 'phone' => '+256762932061'],
            ['name' => 'Nakazibwe Jacqueline', 'email' => 'jacqueline.nakazibwe@mubs.ac.ug', 'registration_number' => '23/U/13646/EVE', 'phone' => '+256762418037'],
            ['name' => 'Kayom Janet', 'email' => 'janet.kayom@mubs.ac.ug', 'registration_number' => '23/U/09506/EVE', 'phone' => '+256778367626'],
            ['name' => 'Kamya Martin', 'email' => 'martin.kamya@mubs.ac.ug', 'registration_number' => '23/U/0506', 'phone' => '+256707738070'],
            ['name' => 'Mukubya Julius', 'email' => 'julius.mukubya@mubs.ac.ug', 'registration_number' => '23/U/11887/PS', 'phone' => '+256786396304'],
        ];

        foreach ($students as $student) {
            User::create(array_merge($student, [
                'password' => Hash::make('password123'),
                'role' => 'student',
                'email_verified_at' => now(),
            ]));
        }

        // Generate additional sample students using factory
        User::factory()->count(20)->student()->create();
    }
}