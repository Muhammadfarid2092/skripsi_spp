<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $data = [];
        $banyaknyaAcakan = DB::table('group')->select('acakan_ke')->orderBy('acakan_ke')->groupBy('acakan_ke')->get();

        for ($i = 0; $i < count($banyaknyaAcakan); $i++) {
            $banyakGroup = DB::table('group')
                ->select('nama_group')
                ->where('acakan_ke', '=', $banyaknyaAcakan[$i]->acakan_ke)
                ->orderBy('nama_group')
                ->groupBy('nama_group')
                ->get();
            
            $result = [];

            for($j = 0; $j < count($banyakGroup); $j++) {
                $orangPerGroup = DB::table('group')
                    ->join('users', 'group.user_id', '=', 'users.id')
                    ->select('nama_group', 'acakan_ke', 'user_id', 'nama')
                    ->where('acakan_ke', '=', $banyaknyaAcakan[$i]->acakan_ke)
                    ->where('nama_group', '=', $banyakGroup[$j]->nama_group)
                    ->get()
                    ->toArray();

                $result[] = ['nama_group' => $banyakGroup[$j]->nama_group, 'banyak_orang_per_grup' => count($orangPerGroup), 'siswa' => $orangPerGroup];
            }

            $data[] = ['acakan_ke' => $banyaknyaAcakan[$i]->acakan_ke, 'data' => $result];
        }

        return view('dashboard.group.group', compact(['data']));
    }

    public function store()
    {
        $dataSiswaAcakPerKelompok = $this->generate_group();
        $lastAcakanKe = DB::table('group')->orderBy('acakan_ke', 'desc')->first();
        if (is_null($lastAcakanKe)) {
            $lastAcakanKe = 1;
        } else {
            $lastAcakanKe = $lastAcakanKe->acakan_ke + 1;
        }

        foreach ($dataSiswaAcakPerKelompok as $kelompok) {
            foreach ($kelompok['siswa'] as $siswa) {
                DB::table('group')->insert([
                    'nama_group' => $kelompok['nama_group'],
                    'user_id' => $siswa->id,
                    'acakan_ke' => $lastAcakanKe
                ]);
            }
        }

        return redirect()
            ->route('group.index')
            ->with([
                'success' => 'Group berhasil dibuat'
            ]);
    }

    public function destroy($acakan_ke)
    {
        $group = DB::table('group')->where('acakan_ke', '=', $acakan_ke)->delete();

        if ($group) {
            return redirect()
                ->route('group.index')
                ->with([
                    'success' => 'Group berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('group.index')
                ->with([
                    'error' => 'Group gagal dihapus'
                ]);
        }
    }

    protected function generate_group()
    {
        $NAME_GROUP_TEMPLATE = 'Kelompok ';
        $result = [];

        $allSiswa = DB::table('users')->where('role', '=', 'siswa')->get();
        $arrayAllSiswa = $allSiswa->toArray();

        // Acak Daftar Siswa
        shuffle($arrayAllSiswa);

        // ceil() -> berfungsi ada berapa banyak grup (pembulatan ke atas)
        // 5 adalah maksimal orang per grup
        $howManyGroup = ceil(count($allSiswa) / 5);

        // menghitung persebaran per grup agar rata
        $minimumPersonPerGroup = floor(count($allSiswa) / $howManyGroup);

        // Mengisi grup berdasarkan ideal perataan orang
        $fairGroup = array_chunk($arrayAllSiswa, $minimumPersonPerGroup);
        for ($i = 0; $i < $howManyGroup; $i++) {
            $result[] = ['nama_group' => $NAME_GROUP_TEMPLATE . ($i + 1), 'siswa' => $fairGroup[$i]];
        }

        // Cek apakah masih ada sisa siswa yang belum dapat kelompok
        if ($howManyGroup != count($fairGroup)) {
            for ($i = 0; $i < count(end($fairGroup)); $i++) {
                $result[$i]['siswa'][] = end($fairGroup)[$i];
            }
        }

        return $result;
    }
}
