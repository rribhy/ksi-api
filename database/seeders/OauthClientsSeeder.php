<?php

namespace Database\Seeders;

use App\Models\OauthClients;
use Illuminate\Database\Seeder;

class OauthClientsSeeder extends Seeder
{
    public function run(): void
    {
        OauthClients::query()->updateOrCreate(
            ['id' => 1],
            [
                'user_id'                => null,
                'name'                   => 'Default Personal Access Client',
                'secret'                 => 'Uzv3lR2gvLUCa2KrT03ObyeTPQatPAMk19ggR6Rq',
                'provider'               => null,
                'redirect'               => 'http://localhost',
                'personal_access_client' => 1,
                'password_client'        => 0,
                'revoked'                => 0,
                'created_at'             => '2025-08-25 07:57:55',
                'updated_at'             => '2025-08-25 07:57:55',
            ]
        );
    }
}
