<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseTbaleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'course_name' => 'Secondary'
        ]);


        Course::create([
            'course_name' => 'Primary'
        ]);
    }
}
