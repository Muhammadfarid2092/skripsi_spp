<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevisiGroupTableSeeder extends Seeder
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
            36 => 
            array (
                'id' => 37,
                'nama_group' => 'Kelompok 1',
                'user_id' => 30,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'nama_group' => 'Kelompok 1',
                'user_id' => 33,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'nama_group' => 'Kelompok 1',
                'user_id' => 32,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'nama_group' => 'Kelompok 1',
                'user_id' => 26,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'nama_group' => 'Kelompok 1',
                'user_id' => 23,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'nama_group' => 'Kelompok 2',
                'user_id' => 22,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'nama_group' => 'Kelompok 2',
                'user_id' => 31,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'nama_group' => 'Kelompok 2',
                'user_id' => 12,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'nama_group' => 'Kelompok 2',
                'user_id' => 21,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'nama_group' => 'Kelompok 2',
                'user_id' => 16,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'nama_group' => 'Kelompok 3',
                'user_id' => 11,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'nama_group' => 'Kelompok 3',
                'user_id' => 7,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'nama_group' => 'Kelompok 3',
                'user_id' => 24,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'nama_group' => 'Kelompok 3',
                'user_id' => 17,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'nama_group' => 'Kelompok 3',
                'user_id' => 19,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'nama_group' => 'Kelompok 4',
                'user_id' => 5,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'nama_group' => 'Kelompok 4',
                'user_id' => 29,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'nama_group' => 'Kelompok 4',
                'user_id' => 3,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'nama_group' => 'Kelompok 4',
                'user_id' => 1,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'nama_group' => 'Kelompok 4',
                'user_id' => 13,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'nama_group' => 'Kelompok 5',
                'user_id' => 34,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'nama_group' => 'Kelompok 5',
                'user_id' => 8,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'nama_group' => 'Kelompok 5',
                'user_id' => 4,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'nama_group' => 'Kelompok 5',
                'user_id' => 28,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'nama_group' => 'Kelompok 6',
                'user_id' => 9,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'nama_group' => 'Kelompok 6',
                'user_id' => 15,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'nama_group' => 'Kelompok 6',
                'user_id' => 2,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'nama_group' => 'Kelompok 6',
                'user_id' => 14,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'nama_group' => 'Kelompok 7',
                'user_id' => 20,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'nama_group' => 'Kelompok 7',
                'user_id' => 27,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'nama_group' => 'Kelompok 7',
                'user_id' => 18,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'nama_group' => 'Kelompok 7',
                'user_id' => 25,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'nama_group' => 'Kelompok 8',
                'user_id' => 35,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'nama_group' => 'Kelompok 8',
                'user_id' => 36,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'nama_group' => 'Kelompok 8',
                'user_id' => 6,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'nama_group' => 'Kelompok 8',
                'user_id' => 10,
                'acakan_ke' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'nama_group' => 'Kelompok 1',
                'user_id' => 25,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'nama_group' => 'Kelompok 1',
                'user_id' => 35,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'nama_group' => 'Kelompok 1',
                'user_id' => 31,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'nama_group' => 'Kelompok 1',
                'user_id' => 26,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'nama_group' => 'Kelompok 1',
                'user_id' => 11,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'nama_group' => 'Kelompok 2',
                'user_id' => 19,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'nama_group' => 'Kelompok 2',
                'user_id' => 8,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'nama_group' => 'Kelompok 2',
                'user_id' => 27,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'nama_group' => 'Kelompok 2',
                'user_id' => 15,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'nama_group' => 'Kelompok 2',
                'user_id' => 23,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'nama_group' => 'Kelompok 3',
                'user_id' => 12,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'nama_group' => 'Kelompok 3',
                'user_id' => 36,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'nama_group' => 'Kelompok 3',
                'user_id' => 13,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'nama_group' => 'Kelompok 3',
                'user_id' => 3,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'nama_group' => 'Kelompok 3',
                'user_id' => 2,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'nama_group' => 'Kelompok 4',
                'user_id' => 29,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'nama_group' => 'Kelompok 4',
                'user_id' => 22,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'nama_group' => 'Kelompok 4',
                'user_id' => 24,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'nama_group' => 'Kelompok 4',
                'user_id' => 30,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'nama_group' => 'Kelompok 4',
                'user_id' => 6,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'nama_group' => 'Kelompok 5',
                'user_id' => 20,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'nama_group' => 'Kelompok 5',
                'user_id' => 33,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'nama_group' => 'Kelompok 5',
                'user_id' => 4,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'nama_group' => 'Kelompok 5',
                'user_id' => 18,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'nama_group' => 'Kelompok 6',
                'user_id' => 14,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'nama_group' => 'Kelompok 6',
                'user_id' => 5,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'nama_group' => 'Kelompok 6',
                'user_id' => 28,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'nama_group' => 'Kelompok 6',
                'user_id' => 9,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'nama_group' => 'Kelompok 7',
                'user_id' => 1,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'nama_group' => 'Kelompok 7',
                'user_id' => 17,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'nama_group' => 'Kelompok 7',
                'user_id' => 10,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'nama_group' => 'Kelompok 7',
                'user_id' => 21,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'nama_group' => 'Kelompok 8',
                'user_id' => 34,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'nama_group' => 'Kelompok 8',
                'user_id' => 7,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'nama_group' => 'Kelompok 8',
                'user_id' => 16,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'nama_group' => 'Kelompok 8',
                'user_id' => 32,
                'acakan_ke' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}