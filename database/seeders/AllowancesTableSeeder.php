<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AllowancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Allowance::factory()->count(20)->create(); 
    }
}
