<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'blogname',
                'value' => 'Rahmat'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome to PostinAja!'
            ],
            [
                'name' => 'caption',
                'value' => 'Write. Share. Connect.'
            ],
        ]);
    }
}
