<?php

use Illuminate\Database\Seeder;
use App\Models\QuizAnswers;

class QuizTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 3; $i < 6; $i++) {

            QuizAnswers::create([
                'answer' => 'America',
                'content_id' => $i
            ]);


            QuizAnswers::create([
                'answer' => 'Asia',
                'content_id' => $i
            ]);
            QuizAnswers::create([
                'answer' => 'Europe',
                'content_id' => $i
            ]);

            QuizAnswers::create([
                'answer' => 'Africa',
                'content_id' => $i
            ]);
        }


        for ($i = 8; $i < 11; $i++) {

            QuizAnswers::create([
                'answer' => 'America',
                'content_id' => $i
            ]);


            QuizAnswers::create([
                'answer' => 'Asia',
                'content_id' => $i
            ]);
            QuizAnswers::create([
                'answer' => 'Europe',
                'content_id' => $i
            ]);

            QuizAnswers::create([
                'answer' => 'Africa',
                'content_id' => $i
            ]);
        }



        for ($i = 13; $i < 16; $i++) {

            QuizAnswers::create([
                'answer' => 'America',
                'content_id' => $i
            ]);


            QuizAnswers::create([
                'answer' => 'Asia',
                'content_id' => $i
            ]);
            QuizAnswers::create([
                'answer' => 'Europe',
                'content_id' => $i
            ]);

            QuizAnswers::create([
                'answer' => 'Africa',
                'content_id' => $i
            ]);
        }


        for ($i = 18; $i < 21; $i++) {

            QuizAnswers::create([
                'answer' => 'America',
                'content_id' => $i
            ]);


            QuizAnswers::create([
                'answer' => 'Asia',
                'content_id' => $i
            ]);
            QuizAnswers::create([
                'answer' => 'Europe',
                'content_id' => $i
            ]);

            QuizAnswers::create([
                'answer' => 'Africa',
                'content_id' => $i
            ]);
        }
    }
}
