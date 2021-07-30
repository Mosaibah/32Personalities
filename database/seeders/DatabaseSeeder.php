<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Allowance;
use app\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Abdulrahman',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);
        Allowance::factory()->count(10)->create();
        Employee::factory()->count(20)->create()->each(function($employee){
            $employee->allowances()->sync(Allowance::all()->random(rand(1,5)));
        });
    }
}
