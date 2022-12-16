<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            0 => array('nip_nis' => '5631', 'nama' => 'ADELIA SHAFA SIVIA DEWI', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            1 => array('nip_nis' => '5633', 'nama' => 'ADIN NUR SYA\'BANI', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            2 => array('nip_nis' => '5642', 'nama' => 'ALIFIA RIFDAH HASANAH', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            3 => array('nip_nis' => '5645', 'nama' => 'ALYA MUTIARA PUTRI', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            4 => array('nip_nis' => '5652', 'nama' => 'ANGGARA FERANDA SHANDY', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            5 => array('nip_nis' => '5657', 'nama' => 'ANGGUN MARSHANDA', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            6 => array('nip_nis' => '5674', 'nama' => 'AZ-ZAHRA MEGANTARA PURNOMO', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            7 => array('nip_nis' => '5687', 'nama' => 'DANISH SAFARAZ GHAISAN ALYUZA', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            8 => array('nip_nis' => '5690', 'nama' => 'DEWI LESTARI RAHAYU', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            9 => array('nip_nis' => '5692', 'nama' => 'DHYPTA ADNANTA PRAMESTI', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            10 => array('nip_nis' => '5693', 'nama' => 'DIEGO CANNAVARO ARDHANA PUTRA', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            11 => array('nip_nis' => '5694', 'nama' => 'DIKA AMELIA RETNO ANJANI', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            12 => array('nip_nis' => '5707', 'nama' => 'FAKHRIYYAH NURUL LATHIFAH', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            13 => array('nip_nis' => '5711', 'nama' => 'FARIS KISWORO', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            14 => array('nip_nis' => '5718', 'nama' => 'FITRI NUR AULIA', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            15 => array('nip_nis' => '5745', 'nama' => 'KHOIRI IRFAN ARLIANTO', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            16 => array('nip_nis' => '5757', 'nama' => 'MEISYA BARQIS', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            17 => array('nip_nis' => '5758', 'nama' => 'MEUTHIA NUR AZIZAH', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            18 => array('nip_nis' => '5779', 'nama' => 'MUHAMMAD HANIF RAHMATULLAH', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            19 => array('nip_nis' => '5780', 'nama' => 'MUHAMMAD HANIF ROFIKI', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            20 => array('nip_nis' => '5784', 'nama' => 'MUHAMMAD RAIKHAN FADILLAH', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            21 => array('nip_nis' => '5792', 'nama' => 'NABILA MUTIARA KASMAWAN', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            22 => array('nip_nis' => '5796', 'nama' => 'NADINE RAJWA NABILA', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            23 => array('nip_nis' => '5800', 'nama' => 'NAJWAH AMALIA ARDETTY RAMADHANY', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            24 => array('nip_nis' => '5809', 'nama' => 'NESSYA RAFANYA RISDIYANTI', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            25 => array('nip_nis' => '5810', 'nama' => 'NIBRAS AHMADRIVA', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            26 => array('nip_nis' => '5811', 'nama' => 'NICO ARYANDI PRASTOWO', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            27 => array('nip_nis' => '5812', 'nama' => 'NIKEN RAHMAWATI', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            28 => array('nip_nis' => '5818', 'nama' => 'NUR NASIKHAH', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            29 => array('nip_nis' => '5820', 'nama' => 'NURAINUN MIFTAQUL JANNAH', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            30 => array('nip_nis' => '5821', 'nama' => 'ORLENDO SONDRA PHALOSA', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            31 => array('nip_nis' => '5841', 'nama' => 'ROZAN AHNAF RURYSIA', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            32 => array('nip_nis' => '5842', 'nama' => 'SA\'AD MADANIY AHMAD', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            33 => array('nip_nis' => '5848', 'nama' => 'SCOOTRI OKTAVIA', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            34 => array('nip_nis' => '5873', 'nama' => 'WASTU ATALLA ZATARI', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            35 => array('nip_nis' => '5877', 'nama' => 'ZASKIA PUTRI AINUR ROHMAH', 'jenis_kelamin' => 'Perempuan', 'password' => 'aaaaaaaa', 'kelas' => 'XE1', 'role' => 'siswa'),
            36 => array('nip_nis' => '198312272010011020', 'nama' => 'Heri Sukrisno S.Kom', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => '', 'role' => 'guru'),
            37 => array('nip_nis' => '999999', 'nama' => 'ADMIN', 'jenis_kelamin' => 'Laki-laki', 'password' => 'aaaaaaaa', 'kelas' => '', 'role' => 'admin'),
        );

        foreach ($data as $item) {
            User::create([
                'nama' => $item['nama'],
                'nip_nis' => $item['nip_nis'],
                'password' => Hash::make($item['password']),
                'role' => $item['role'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'kelas' => $item['kelas'],
            ]);
        }
    }
}
