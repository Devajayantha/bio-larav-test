<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'English', 'code' => 'en'],
            ['name' => 'Indonesia', 'code' => 'id']
        ];

        foreach ($languages as $language) {
            \App\Models\Language::query()->create($language);
        }
    }
}
