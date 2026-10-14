<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{DB,Hash};
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (! DB::table('user')->exists()) {
            DB::table('user')->insert([
                'id' => (string) Str::uuid(),
                'username' => strtolower(trim(env('ADMIN_USERNAME', 'admin'))),
                'password_hash' => Hash::make(env('ADMIN_PASSWORD', 'change-me')),
                'role' => 'admin',
            ]);
        }
    }
}
