<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriculturalOutputReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('agricultural_output_reports');
        Schema::create('agricultural_output_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('district');
            $table->string('mukim');
            $table->string('village');
            $table->string('agricultural_development_area');
            $table->bigInteger('agricultural_output_id')->unsigned();
            $table->foreign('agricultural_output_id')->references('id')->on('agricultural_outputs');
            $table->bigInteger('report_id')->unsigned();
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
        Schema::dropIfExists('agricultural_output_reports');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
