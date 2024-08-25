<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            ['answer_code' => 0, 'answer_name' => 'Tidak'],
            ['answer_code' => 0.2, 'answer_name' => 'Tidak Yakin'],
            ['answer_code' => 0.4, 'answer_name' => 'Sedikit Yakin'],
            ['answer_code' => 0.6, 'answer_name' => 'Cukup Yakin'],
            ['answer_code' => 0.8, 'answer_name' => 'Yakin'],
            ['answer_code' => 1, 'answer_name' => 'Sangat Yakin'],
        ];

        foreach ($answers as $answer) {
            Answer::create($answer);
        }
    }
}
