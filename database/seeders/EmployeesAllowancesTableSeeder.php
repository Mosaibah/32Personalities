<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeesAllowancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::factory()->count(20)->create(); 
    }
}
