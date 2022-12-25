<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionnaire = DB::table('questionnaire')->get();

        $data = [
            ['question' => 'Siswa membantu mengelola perbedaan pendapat dan masalah yang mungkin terjadi dalam kerja kelompok', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa membantu anggota kelompok lainnya untuk terlibat dan terlibat dalam kerja kelompok', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa menjaga kebersihan kelompoknya', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa menegur anggota kelompok lainnya apabila tidak megikuti tugas kerja kelompok dengan sungguh sungguh', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa mengelola perasaan saat terjadi konflik dalam kerja kelompok ', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa mengakui dan menghargai kontribusi anggota kelompok lainnya dalam tugas kelompok', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa membantu membuat kerja kelompok lebih efektif dan efisien', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa membantu menjaga komunikasi yang efektif dalam kelompok ', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa membantu mengelola waktu dan menyelesaikan tugas dengan tepat waktu dalam kerja kelompok', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa membantu mempromosikan atmosfer yang positif dan menyenangkan dalam kerja kelompok', 'questionnaire_id' => $questionnaire[0]->id],
            ['question' => 'Siswa bersedia berkumpul dengan kelompok sesuai dengan pembagian', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa tepat waktu berkumpul di kelompok', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa menaati aturan kelompok', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa mengikuti pembagian tugas kelompok', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa mengerjakan tugas yang diberikan oleh guru', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa mengontrol emosi saat terjadi konflik dalam kelompok dengan baik', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa menyelesaikan konflik dalam kelompok dengan baik', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa mengelola tugas yang diberikan oleh temannya dengan baik', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa secara efektif menunjukkan disiplin diri dengan baik', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa memberikan saran agar lebih disiplin dalam mengerjakan tugas dari kelompok', 'questionnaire_id' => $questionnaire[1]->id],
            ['question' => 'Siswa tidak menyontek dalam mengerjakan tugas kelompok', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa merasa terdorong untuk jujur dalam kerja kelompok', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa membantu menjaga integritas dan kejujuran dalam kerja kelompok', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa membantu mengelola perbedaan pendapat dan masalah yang mungkin terjadi dalam kerja kelompok dengan cara yang jujur dan terbuka', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa membantu menjaga agar tidak ada pembohongan atau penipuan dalam kerja kelompok', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa membantu mempromosikan atmosfer yang jujur dan terbuka dalam kerja kelompok', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa mengakui dan menghargai kontribusi anggota kelompok lainnya dalam proyek kelompok dengan cara yang jujur', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa membantu mengelola waktu dan menyelesaikan tugas dengan tepat waktu dalam kerja kelompok dengan cara yang jujur', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa membantu menjaga komunikasi yang efektif dan jujur dalam kelompok', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa membantu memperkuat kerja kelompok Anda dengan cara yang jujur', 'questionnaire_id' => $questionnaire[2]->id],
            ['question' => 'Siswa dapat mempresentasikan hasil pekerjaan kelompok', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa membantu tim saya mencapai tujuan bersama', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa merasa percaya diri dalam bekerja dalam kelompok', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa memanfaatkan kekuatan dan kelemahan saya dalam kelompok', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa mengelola perbedaan pendapat dalam kelompok dengan baik', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa mengembangkan kemampuan komunikasi saya dalam kelompok', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa meningkatkan kemampuan kerjasama saya dalam kelompok', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa mengelola stres dan tekanan dalam kelompok', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa terus belajar dan tumbuh bersama anggota kelompok', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa menggunakan pengalaman anggota dalam kelompok untuk mengembangkan kepercayaan diri siswa di masa depan', 'questionnaire_id' => $questionnaire[3]->id],
            ['question' => 'Siswa mengerjakan tugas dengan kerjasama dalam kelompok', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa memastikan bahwa saya memenuhi tanggung jawab saya dalam kelompok', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa membantu tim saya mencapai tujuan bersama', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa membantu mengelola waktu dan sumber daya kelompok dengan efektif', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa memastikan bahwa saya tidak membebani anggota tim lain dengan tanggung jawab yang tidak seimbang', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa memastikan bahwa saya tidak membiarkan tugas-tugas kelompok saya tertunda atau terabaikan', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa memastikan bahwa saya selalu berkomunikasi dengan anggota tim lain dengan efektif', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa memastikan bahwa saya selalu siap untuk berkontribusi pada diskusi dan keputusan kelompok', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa  memastikan bahwa saya selalu memperhatikan etika dan norma yang berlaku dalam kelompok', 'questionnaire_id' => $questionnaire[4]->id],
            ['question' => 'Siswa memastikan bahwa saya selalu bertanggung jawab atas tindakan saya dalam kelompok', 'questionnaire_id' => $questionnaire[4]->id],
        ];

        foreach ($data as $item) {
            Question::create([
                'question' => $item['question'],
                'questionnaire_id' => $item['questionnaire_id']
            ]);
        }
    }
}
