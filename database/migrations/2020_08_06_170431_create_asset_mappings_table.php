<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_mappings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('asset_id')->index();
            $table->bigInteger('assigned_to')->index();
            $table->bigInteger('assigned_by')->index();
            $table->enum('status', ['active', 'retuned', 'handovered', 'damaged'])->default('active')->index();
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
        Schema::dropIfExists('asset_mappings');
    }
}
