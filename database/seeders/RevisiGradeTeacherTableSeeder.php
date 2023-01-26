<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevisiGradeTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DB = DB::table('users')->where('role', '=', 'siswa')->get();
        $result = [];

        foreach($DB as $item) {
            $result[] = ['grade' => 10, 'siswa' => $item->id];
        }

        // for untuk acakan
        for ($i = 1; $i <= 3; $i++) {
            foreach($result as $item) {
                DB::table('grade_teacher')->insert([
                    'grade' => $item['grade'],
                    'siswa' => $item['siswa'],
                    'acakan_ke' => $i
                ]);
            }
        }
    }
}
