<?php

namespace Database\Factories;

use App\Models\OauthClients;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OauthClientsFactory extends Factory
{
    protected $model = OauthClients::class;

    public function definition(): array
    {
        return [
            'user_id'                 => null,
            'name'                    => 'Default Personal Access Client',
            'secret'                  => Str::random(40),
            'provider'                => null,
            'redirect'                => 'http://localhost',
            'personal_access_client'  => 1,
            'password_client'         => 0,
            'revoked'                 => 0,
        ];
    }

    public function personal(): static
    {
        return $this->state(fn () => [
            'personal_access_client' => 1,
            'password_client'        => 0,
        ]);
    }

    public function password(): static
    {
        return $this->state(fn () => [
            'personal_access_client' => 0,
            'password_client'        => 1,
        ]);
    }
}
