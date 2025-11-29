<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pertanyaan;
use App\Models\Pelayanan;
use App\Models\SettingWeb;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there's at least one SettingWeb to link Pelayanan to
        $settingWeb = SettingWeb::first();

        if (!$settingWeb) {
            // If no SettingWeb exists, create one for seeding purposes
            $settingWeb = SettingWeb::create([
                "nama_usaha" => "KBRI Damaskus",
                "nama_usaha_ar" => "السفارة الإندونيسية في دمشق",
                "alamat" =>
                    "Mezzeh, Eastern Villas, al-Madina al-Munawara Street, opposite to Omar bin Abdul Aziz Mosque, Block 270/A Building No.26, P.O.BOX 3530, Damascus - SYRIA",
                "footer_struk" => "-",
                "token" => "-",
                "is_perm" => 1,
                "bulan" => 12,
                "url_domain" => "default.com",
            ]);
        }

        // Ensure there's at least one Pelayanan to link to
        $pelayanans = Pelayanan::all();

        if ($pelayanans->isEmpty()) {
            // If no Pelayanan exists, create one for seeding purposes
            $pelayanan = Pelayanan::create([
                "instansi_id" => $settingWeb->id, // Use ID from SettingWeb
                "name" => "Kekonsuleran",
                "name_ar" => "الشؤون القنصلية",
                "description" =>
                    "Pelayanan terkait urusan konsuler seperti paspor, visa, dan bantuan warga negara.",
                "logo" => null,
            ]);

            $pelayanan = Pelayanan::create([
                "instansi_id" => $settingWeb->id, // Use ID from SettingWeb
                "name" => "Perlindungan WNI",
                "name_ar" => "حماية المواطنين الإندونيسيين",
                "description" =>
                    "Pelayanan terkait perlindungan warga negara Indonesia di luar negeri.",
                "logo" => null,
            ]);

            $pelayanans->push($pelayanan);
        }

        // Clear existing questions to avoid duplicates on re-seeding
        Pertanyaan::truncate();

        $pertanyaan_id = [
            "Kemudahan prosedur pelayanan?",
            "Kecepatan pelayanan sesuai peraturan yang berlaku?",
            "Kemampuan petugas dalam memberikan pelayanan?",
            "Kesopanan dan keramahan petugas?",
            "Kemudahan pencarian informasi pelayanan?",
            "Kesesuaian antara alur/rancangan pelayanan dengan yang diberikan sesuai peraturan yang berlaku?",
            "Kecepatan dan ketetapan penanganan saran dan masukan mengenai pelayanan?",
            "Kenyamanan tempat pelayanan?",
            "Kelengkapan fasilitas tempat pelayanan?",
            "Kemudahan menuju Kantor Perwakilan Republik Indonesia?",
        ];

        $pertanyaan_ar = [
            "مدى سهولة إجراءات تقديم الخدمة؟",
            "مدى سرعة تقديم الخدمة وفقاً للأنظمة المعمول بها؟",
            "مدى كفاءة الموظف في تقديم الخدمة؟",
            "مدى لطف ولباقة الموظف في التعامل؟",
            "مدى سهولة الحصول على معلومات الخدمة؟",
            "مدى مطابقة سير/تصميم إجراءات الخدمة مع ما يتم تقديمه وفقاً للأنظمة المعمول بها؟",
            "مدى سرعة ودقة التعامل مع الاقتراحات والملاحظات بشأن الخدمة؟",
            "مدى راحة مكان تقديم الخدمة؟",
            "مدى توفر وتكامل مرافق مكان تقديم الخدمة؟",
            "مدى سهولة الوصول إلى مقر البعثة الدبلوماسية لجمهورية إندونيسيا؟",
        ];

        for ($i = 0; $i < count($pertanyaan_id); $i++) {
            foreach ($pelayanans as $pelayanan) {
                Pertanyaan::create([
                    "pelayanan_id" => $pelayanan->id,
                    "question" => $pertanyaan_id[$i],
                    "question_ar" => $pertanyaan_ar[$i],
                    "image" => null,
                    "order" => $i + 1,
                ]);
            }
        }
    }
}
