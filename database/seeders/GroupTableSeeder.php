<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('group')->delete();
        
        DB::table('group')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_group' => 'Kelompok 1',
                'user_id' => 33,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama_group' => 'Kelompok 1',
                'user_id' => 13,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nama_group' => 'Kelompok 1',
                'user_id' => 14,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nama_group' => 'Kelompok 1',
                'user_id' => 32,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nama_group' => 'Kelompok 1',
                'user_id' => 23,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nama_group' => 'Kelompok 2',
                'user_id' => 29,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nama_group' => 'Kelompok 2',
                'user_id' => 36,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nama_group' => 'Kelompok 2',
                'user_id' => 20,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nama_group' => 'Kelompok 2',
                'user_id' => 8,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nama_group' => 'Kelompok 2',
                'user_id' => 4,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nama_group' => 'Kelompok 3',
                'user_id' => 28,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'nama_group' => 'Kelompok 3',
                'user_id' => 22,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'nama_group' => 'Kelompok 3',
                'user_id' => 2,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'nama_group' => 'Kelompok 3',
                'user_id' => 31,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'nama_group' => 'Kelompok 3',
                'user_id' => 11,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'nama_group' => 'Kelompok 4',
                'user_id' => 27,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'nama_group' => 'Kelompok 4',
                'user_id' => 9,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'nama_group' => 'Kelompok 4',
                'user_id' => 18,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'nama_group' => 'Kelompok 4',
                'user_id' => 7,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'nama_group' => 'Kelompok 4',
                'user_id' => 24,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'nama_group' => 'Kelompok 5',
                'user_id' => 12,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'nama_group' => 'Kelompok 5',
                'user_id' => 35,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'nama_group' => 'Kelompok 5',
                'user_id' => 5,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'nama_group' => 'Kelompok 5',
                'user_id' => 17,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'nama_group' => 'Kelompok 6',
                'user_id' => 26,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'nama_group' => 'Kelompok 6',
                'user_id' => 21,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'nama_group' => 'Kelompok 6',
                'user_id' => 34,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'nama_group' => 'Kelompok 6',
                'user_id' => 1,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'nama_group' => 'Kelompok 7',
                'user_id' => 30,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'nama_group' => 'Kelompok 7',
                'user_id' => 10,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'nama_group' => 'Kelompok 7',
                'user_id' => 15,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'nama_group' => 'Kelompok 7',
                'user_id' => 6,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'nama_group' => 'Kelompok 8',
                'user_id' => 25,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'nama_group' => 'Kelompok 8',
                'user_id' => 3,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'nama_group' => 'Kelompok 8',
                'user_id' => 16,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'nama_group' => 'Kelompok 8',
                'user_id' => 19,
                'acakan_ke' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}