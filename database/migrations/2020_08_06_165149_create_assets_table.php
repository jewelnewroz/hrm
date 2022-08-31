<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_type_id')->index();
            $table->bigInteger('user_id')->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price_value', [10,2])->default(0);
            $table->date('purchase_date')->index();
            $table->string('purchase_by')->nullable();
            $table->enum('condition', ['good', 'damage', 'lost'])->default('good')->index();
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
        Schema::dropIfExists('assets');
    }
}
