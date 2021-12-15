<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiceOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('rice_outputs');
        Schema::create('rice_outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('agricultural_output_id')->unsigned();
            $table->foreign('agricultural_output_id')->references('id')->on('agricultural_outputs')->onDelete('cascade');
            $table->date('planted_at');
            $table->date('packaged_at');
            $table->bigInteger('quantity_packaged');
            $table->float('kg_per_packaging');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('rice_outputs');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
