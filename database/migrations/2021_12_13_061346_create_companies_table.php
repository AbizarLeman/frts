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
        Schema::enableForeignKeyConstraints();
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
            $table->string('miscellaneous_string')->default('');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('companies');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
