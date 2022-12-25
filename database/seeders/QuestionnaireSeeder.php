<?php

namespace Database\Seeders;

use App\Models\Questionnaire;
use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'peduli',
            'disiplin',
            'jujur',
            'percaya diri',
            'tanggung jawab',
        ];

        foreach ($data as $item) {
            Questionnaire::create([
                'questionnaire' => $item,
            ]);
        }
    }
}
