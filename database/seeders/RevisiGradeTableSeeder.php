<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevisiGradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // INI UNTUK INPUTAN ACAKAN KE 2 & 3
        $total_acakan = [2, 3];
        $all_id_question = DB::table('question')
            ->select('id')
            ->get();

        foreach ($total_acakan as $item) {
            $listKelompok = DB::table('group')
                ->select('nama_group')
                ->where('acakan_ke', '=', $item)
                ->distinct()
                ->get();

            foreach ($listKelompok as $kelompok) {
                $currentPersonGroup = DB::table('group')
                    ->where('acakan_ke', '=', $item)
                    ->where('nama_group', '=', $kelompok->nama_group)
                    ->get();

                for ($i = 0; $i < count($currentPersonGroup); $i++) {
                    for ($j = 0; $j < count($currentPersonGroup); $j++) {
                        foreach($all_id_question as $id_question) {
                            $rand_num = rand(4, 10);

                            DB::table('grade')->insert([
                                'grade' => $rand_num,
                                'penilai' => $currentPersonGroup[$i]->user_id,
                                'dinilai' => $currentPersonGroup[$j]->user_id,
                                'question_id' => $id_question->id,
                                'acakan_ke' => $item
                            ]);
                        }
                    }
                }
            }
        }
    }
}
