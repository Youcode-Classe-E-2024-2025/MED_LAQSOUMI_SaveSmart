<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        Profile::factory()->count(10)->create();
    }
}