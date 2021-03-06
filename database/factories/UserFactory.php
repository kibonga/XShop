<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
                'name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'phone' => $this->faker->phoneNumber,
                'address' => $this->faker->address,
            ];
        });
    }

    public function suspended() {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Kibonga',
                'last_name' => 'Kimur',
                'email' => 'kibonga@gmail.com',
                'is_admin' => true,
                'phone' => '+381601234567',
                'address' => 'Tosin Bunar bb',
             ];
        });
    }
}
