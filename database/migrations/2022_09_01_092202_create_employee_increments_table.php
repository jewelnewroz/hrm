<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeIncrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_increments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->index();
            $table->float('amount')->default(0);
            $table->enum('type', ['fixed', 'percentage'])->default('percentage');
            $table->enum('increment_base', ['basic', 'gross', 'defined'])->default('basic');
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
        Schema::dropIfExists('employee_increments');
    }
}
