<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\{Facility, Future, Major, Organizational, User, Welcome};
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan Data ke tabel tb_contact
        DB::table('tb_contact')->insert([
            'instagram' => 'https://instagram.com/smkn1balai',
            'facebook' => 'https://facebook.com/smkn1balai',
            'mail' => 'info@smkn1balai.sch.id',
            'whatsapp' => '+6281234567890',
        ]);

        // tb_major
        $majors = [
            [
                'name' => 'Teknik Komputer dan Jaringan (TKJ)',
                'logo' => null,
                'description' => 'Fokus pada jaringan komputer dan perangkat keras.'
            ],
            [
                'name' => 'Akuntansi dan Keuangan Lembaga (AKL)',
                'logo' => null,
                'description' => 'Fokus pada akuntansi dan pengelolaan keuangan.'
            ],
            [
                'name' => 'Agribisnis Tanaman Perkebunan (ATP)',
                'logo' => null,
                'description' => 'Fokus pada agribisnis dan tanaman perkebunan.'
            ],
            [
                'name' => 'Teknik Bisnis Sepeda Motor (TBSM)',
                'logo' => null,
                'description' => 'Fokus pada teknik dan bisnis sepeda motor.'
            ]
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }


        // tb user
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $role = Role::create(['name' => 'Admin']);
        $user->assignRole($role);


        // tb organizational
        $dataOrganizational = [
            ['name' => 'Yan, SP', 'nip' => null, 'jabatan' => 'Kepala Sekolah'],
            ['name' => 'Kornelis Ruba, SP', 'nip' => null, 'jabatan' => 'Waka Kurikulum'],
            ['name' => 'Simon Sukarman, S.Pd', 'nip' => null, 'jabatan' => 'Waka Kesiswaan, Kaprog TBSM'],
            ['name' => 'Fran Safer, S.Pd, M.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Emelia Neni Kusumawardani, SE', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Yuniarti, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Fatimah Irdayanti, S.Pd', 'nip' => null, 'jabatan' => 'Operator / Guru'],
            ['name' => 'Rosi Rosdiana, S.Pd', 'nip' => null, 'jabatan' => 'Bendahara PBP / Waka Sarpras'],
            ['name' => 'Maulana, S.Pd', 'nip' => null, 'jabatan' => 'Bendahara BOS / Kaprog TKJ'],
            ['name' => 'Nurul Huda, S.P', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Cherry Julianto, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Soesanto Adi Saputro, S.Pd', 'nip' => null, 'jabatan' => 'Guru / Pembina OSIS'],
            ['name' => 'Cristianus, S.P', 'nip' => null, 'jabatan' => 'Kaprog ATP'],
            ['name' => 'Agustin Efriyanti, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Florentina, S.Ag', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Jonny Mangoloi Sormin, S.E', 'nip' => null, 'jabatan' => 'Kaprog BD'],
            ['name' => 'Eva Herawati, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Tiara Hapsari, S.Pd.Gr', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Novi Ratnasari, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Febriyanti Pakpahan, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Elisabeth Erna, SE', 'nip' => null, 'jabatan' => 'Kaprog AKL'],
            ['name' => 'Ruben Gideon, S.Pd', 'nip' => null, 'jabatan' => 'Kaprog DKV'],
            ['name' => 'Restu Karmela, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Sri Wahyuni, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Yulia, S.Pd.I', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Martina Toya, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Marta Lena, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Kuntoro Pratama Nusantara, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Eliana, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Tiara Hapsari M.Pd Gr', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Yusta Erliani, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Kristiani, S.Kom', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Desniati Purba, S.PdK', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Yonatan, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Dionesius Budi, S. TP', 'nip' => null, 'jabatan' => 'Guru / Pembina OSIS'],
            ['name' => 'Imam Lesmana S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Fransiska Desi Susianti, S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Heni Arista', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Hermina Silas', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Juina Ina, A.Md', 'nip' => null, 'jabatan' => 'Guru'],
            ['name' => 'Dehijah Srianti, A.Md', 'nip' => null, 'jabatan' => 'Staf Tata Usaha'],
            ['name' => 'Theodora Novianti, S.E', 'nip' => null, 'jabatan' => 'Staf Tata Usaha'],
            ['name' => 'Maksi Milianus Rampas', 'nip' => null, 'jabatan' => 'Penjaga Sekolah'],
            ['name' => 'Martono , Hendrik , Natalia', 'nip' => null, 'jabatan' => 'Petugas Kebersihan'],
            ['name' => 'Florentina, S.Ag', 'nip' => null, 'jabatan' => 'Pembina Pramuka'],
            ['name' => 'Kuntoro Pratama Nusantara, S.Pd', 'nip' => null, 'jabatan' => 'Pembina Pramuka'],
            ['name' => 'Agustin Efriyanti, S.Pd', 'nip' => null, 'jabatan' => 'Pembina Pramuka'],
            ['name' => 'Herman', 'nip' => null, 'jabatan' => 'Pembina PBB'],
            ['name' => 'Antonia Rupina S.Pd', 'nip' => null, 'jabatan' => 'Guru'],
        ];

        Organizational::insert($dataOrganizational);


        // tb facility
        $dataFacility = [
            [
                'name' => 'Ruang Kelas',
                'description' => null,
                'photo_path' => null
            ],
            ['name' => 'Laboratorium Komputer', 'description' => null, 'photo_path' => null],
            ['name' => 'Laboratorium ATP', 'description' => null, 'photo_path' => null],
            ['name' => 'Laboratorium TBSM', 'description' => null, 'photo_path' => null],
            ['name' => 'Koperasi', 'description' => null, 'photo_path' => null],
            ['name' => 'Ruang Kesehatan', 'description' => null, 'photo_path' => null],
            ['name' => 'Kantin Sekolah', 'description' => null, 'photo_path' => null],
            ['name' => 'Perpustakaan', 'description' => null, 'photo_path' => null],
            ['name' => 'Lapangan Olahraga', 'description' => null, 'photo_path' => null],
            ['name' => 'AULA', 'description' => null, 'photo_path' => null],
        ];

        Facility::insert($dataFacility);


        // tb future
        Future::create([
            'vision' => 'Terwujudnya Tamatan yang Bermoral, Profesional, Mandiri serta mampu bersaing di tingkat Nasional maupun Global.',
            'mission' => 'Meningkatkan kualitas organisasi dan manajemen sekolah dalam menumbuhkan semangat keunggulan sesuai dengan kompetensi keahlian|Meningkatkan kwalitas KBM dalam mencapai kompetensi siswa|Meningkatkan Kualitas kompetensi guru dan Pegawai sesuai dengan perwujudan standar Pelayanan Minimal|Meningkatkan kualitas dan kwantitas sarana dan prasarana pendukung pendidikan sesuai dengan tuntutan IPTEK|Meningkatkan kwalitas SDM siswa sesuai dengan perwujudan IMTAQ dan kemandirian|Meningkatkan mitra kerja dengan DUDI dalam pencapain ketrampilan minimal|Meningkatkan pengelolaan Unit Produksi dalam menunjang Kwalitas SDM|Memberdayakan lingkungan sekolah dalam perwujudan wawasan wiyata Mandala',
            'goals' => 'Menyiapkan peserta didik agar menjadi manusia yang produktif dan berahlak mulia, sehingga mampu bekerja secara mandiri, trampil, professional dalam bidang keahlian sesuai dengan tuntutan zaman dan dapat mengisi lowongan yang ada di DU / DI|Membekali peserta didik agar mampu memilih karir, tekun dan gigih dalam berkompetisi baik untuk pribadi yang trampil maupun untuk memasuki DU / DI|Mempersiapkan peserta didik dengan skill dan profesionalisme dalam bekerja sehingga mampu menjadi insan mandiri dan berwirausaha|Membekali peserta didik dengan Ilmu Pengetahuan dan keterampilan sesuai dengan keahlian untuk memasuki jenjang pendidikan yang lebih tinggi',
        ]);

        // tb welcome
        Welcome::create([
            'headmaster' => 'Yan, S.P',
            'nip' => '197310152002121003',
            'words' => 'Segala puji syukur dan hormat hanya patut dipersembahkan kehadirat Tuhan yang Maha Kuasa. Karena hanya dengan anugerahNya kita boleh masuk dalam tahun ajaran yang baru 2024/2025 di SMK Negeri 1 Balai. Selaku kepala sekolah saya mengucapkan selamat datang dan selamat bergabung dalam keluarga besar SMK Negeri 1 Balai bagi siswa/siswi yang baru. 
            Pendidikan adalah suatu proses yang terus berlangsung seumur hidup. Di lingkungan pendidikan formal dikenal adanya jenjang pendidikan yang terdiri dari TK, SD, SMP, SMA/SMK dan Perguruan Tinggi. Tiap-tiap jenjang pendidikan mempunyai ciri khusus yang membedakannya dengan jenjang pendidikan lainnya. Hal ini menyebabkan kebiasaan belajar yang berkembang dijenjang sebelumnya perlu ditinggalkan dan diganti dengan cara belajar yang baru sesuai dengan mental psikologis anak didik untuk mengantar sesuai jenjang pendidikan baru.
            Dalam mendukung dan menjawab tantangan yang dihadapi, SMK Negeri 1 Balai, berupaya meningkatkan mutu pendidikan guna membentuk anak didik yang berkualitas, berwawasan luas dan berakhlak mulia. Dalam usaha meningkatkan mutu pendidikan, SMK Negeri 1 balai akan melakukan kegiatan pembinaan akademik maupun non akademik. Kegiatan akademik meliputi proses pembelajaran baik dalam kelas maupun di luar kelas.
            Untuk menyambut kehadiran para siswa-siswi baru, diperlukan adanya pengenalan mereka terhadap lingkungan yang baru di SMK Negeri 1 Balai. Rangkaian kegiatan pengenalan ini dirangkum menjadi satu dalam kegiatan Masa Pengenalan Lingkungan Sekolah (MPLS).
            Kegiatan Masa Pengenalan Lingkungan Sekolah (MPLS) ini diisi dengan sosialisasi nilai-nilai sosial, tata tertib di SMK Negeri 1 Balai dan beberapa pengenalan tentang SMK Negeri 1 Balai itu sendiri. Sehingga siswa-siswi baru akan lebih terbiasa di lingkungan SMK Negeri 1 Balai. Kegiatan Masa Pengenalan Lingkungan Sekolah (MPLS) ini seperti kegiatan baris berbaris untuk melatih kekompakan, kedisiplinan dan kreatifitas dalam keseharian para siswa-siswi baru tersebut.
            Akhirnya, saya selaku kepala SMK Negeri 1 Balai mengajak semua komponen yang terlibat, baik sebagai guru, staff, orang tua/wali serta siswa/siswi untuk mendukung pembentukan watak, karakter dan disiplin anak, serta kemandirian. Diharapkan agar nantinya siswa/siswi memiliki jiwa patriot, serta menjunjung tinggi harkat dan martabat bangsa dan Negara Kesatuan Republik Indonesia. Demikian sambutan yang dapat saya sampaikan untuk menjadikan perhatian dan kerja sama kita semua. Akhirnya kiranya Tuhan berkehendak memberkati kita semua dalam pelaksanaan MPLS selama seminggu kedepan. Sekian dan Terimakasih.',
            'photo' => null,
        ]);
    }
}
