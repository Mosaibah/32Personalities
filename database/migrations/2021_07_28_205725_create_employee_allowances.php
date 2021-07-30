<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAllowances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_allowances', function (Blueprint $table) {
            \Illuminate\Support\Facades\DB::statement('SET SESSION sql_require_primary_key=0'); 
            // in DigitalOeacen you must add this line ^^, otherwise you can commet it.

            $table->foreignId('employee_id');
            $table->foreignId('allowance_id');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');

                $table->foreign('allowance_id')
                ->references('id')
                ->on('allowances')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_allowances');
    }
}
