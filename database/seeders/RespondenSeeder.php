<?php

namespace Database\Seeders;

use App\Models\Jawaban;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Responden; // Import Responden model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
use App\Models\Pertanyaan;
use App\Models\Pelayanan; // Import Pelayanan model

class RespondenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Responden::truncate(); // Clear existing data
        Jawaban::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create("id_ID"); // Use Indonesian locale for faker
        $pertanyaans = Pertanyaan::all();
        $users = User::all();
        $pelayanans = Pelayanan::all(); // Get all Pelayanan records

        // Ensure there are users and pelayanan records
        if ($users->isEmpty()) {
            $this->command->info("Please seed users first.");
            return;
        }
        if ($pelayanans->isEmpty()) {
            $this->command->info("Please seed pelayanans first.");
            return;
        }

        for ($i = 0; $i < 100; $i++) {
            $responden = Responden::create([
                "nama" => $faker->name,
                "usia" => $faker->randomElement([
                    "<17",
                    "18-25",
                    "26-30",
                    "31-40",
                    ">40",
                ]),
                "gender" => $faker->randomElement(["laki-laki", "perempuan"]),
                "phone" => $faker->phoneNumber,
                "language" => $faker->randomElement(["ID", "AR"]),
                "total_nilai" => 0, // Initial value
                "tanggal_survey" => $faker->dateTimeBetween("-1 year", "now"),
                "user_id" => $users->random()->id,
                "pelayanan_id" => $pelayanans->random()->id, // Assign random pelayanan_id
            ]);

            $total_nilai = 0;
            // Fetch questions only for the assigned pelayanan_id
            $pertanyaans = Pertanyaan::where(
                "pelayanan_id",
                $responden->pelayanan_id,
            )->get();

            foreach ($pertanyaans as $pertanyaan) {
                $score = $faker->numberBetween(1, 4);
                Jawaban::create([
                    "responden_id" => $responden->id,
                    "pertanyaan_id" => $pertanyaan->id,
                    "score" => $score,
                ]);
                $total_nilai += $score;
            }

            $responden->update(["total_nilai" => $total_nilai]);
        }
    }
}
