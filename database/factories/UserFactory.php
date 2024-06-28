<?php

namespace Database\Factories;

use App\Models\Participant;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'image' => $this->faker->imageUrl(640, 480, 'people', true),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {

            // Sisipkan izin ke pengguna yang baru dibuat
            $role = Role::inRandomOrder()->first();
            $user->roles()->attach($role);

            // Jika peran adalah 'teacher', tambahkan entri Teacher juga
            if ($role->name === 'teacher') {
                Teacher::factory()->create([
                    'user_id' => $user->id,
                ]);
            }else if ($role->name === 'participant') {
                Participant::factory()->create([
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
