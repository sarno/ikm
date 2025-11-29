<?php

namespace Database\Factories;

use App\Models\Responden;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responden>
 */
class RespondenFactory extends Factory
{
    /**
     * The name of the corresponding model.
     *
     * @var string
     */
    protected $model = Responden::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ensure at least one user exists for foreign key
        if (User::count() === 0) {
            User::factory()->create();
        }

        $usiaOptions = ['<17', '18-25', '26-30', '31-40', '>40'];
        $genderOptions = ['laki-laki', 'perempuan'];
        $languageOptions = ['Indonesia', 'عربي'];

        return [
            'tanggal_survey' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'nama' => $this->faker->name,
            'usia' => $this->faker->randomElement($usiaOptions),
            'gender' => $this->faker->randomElement($genderOptions),
            'phone' => $this->faker->phoneNumber,
            'language' => $this->faker->randomElement($languageOptions),
            'total_nilai' => $this->faker->numberBetween(0, 100),
            'user_id' => User::inRandomOrder()->first()->id, // Assign to an existing user
        ];
    }
}
