<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('companies');
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('rocbn');
            $table->string('district');
            $table->string('mukim');
            $table->string('village');
            $table->string('street_address');
            $table->boolean('rice')->default(0);
            $table->boolean('broiler')->default(0);
            $table->boolean('vegetable')->default(0);
            $table->boolean('fruit')->default(0);
            $table->boolean('buffalo')->default(0);
            $table->boolean('cattle')->default(0);
            $table->boolean('goat')->default(0);
            $table->boolean('cut_flower')->default(0);
            $table->boolean('egg')->default(0);
            $table->boolean('ornamental_horticulture')->default(0);
            $table->boolean('miscellaneous')->default(0);
            $table->string('miscellaneous_string');
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('isVerified')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('companies');
    }
}
