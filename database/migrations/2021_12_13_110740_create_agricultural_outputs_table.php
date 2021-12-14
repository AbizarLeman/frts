<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgriculturalOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('agricultural_outputs');
        Schema::create('agricultural_outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('output_type');
            $table->float('output_in_kg');
            $table->string('district');
            $table->string('mukim');
            $table->string('village');
            $table->string('agricultural_development_area');
            $table->boolean('isVerified')->default(0);
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
        Schema::dropIfExists('agricultural_outputs');
    }
}
