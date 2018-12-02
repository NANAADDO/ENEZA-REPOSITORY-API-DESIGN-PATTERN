<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;
class SubjecTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            Subject::create([
                'subject_name' => 'English',
                'course_id' => $i
            ]);


            Subject::create([
                'subject_name' => 'Swahili',
                'course_id' => $i
            ]);
            Subject::create([
                'subject_name' => 'Social Studies',
                'course_id' => $i
            ]);
        }
    }
}
