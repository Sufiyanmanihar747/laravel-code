<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $students = \App\Models\Student::factory(10)->create();
        $teachers = \App\Models\Teacher::factory(10)->create();

        foreach ($students as $student)
        {
            $teacherIds = $teachers->random(2)->pluck('id')->toArray();
            
            foreach ($teacherIds as $teacherId) 
            {
                $uuid = Str::uuid()->toString();
                $student->teachers()->attach($teacherId, ['id' => $uuid]);
            }
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
