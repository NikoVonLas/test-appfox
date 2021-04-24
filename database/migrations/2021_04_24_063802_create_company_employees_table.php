<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyEmployeesTable extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
    public function up() :void
    {
        Schema::create('company_employees', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('company_id');
			$table->string('slug');
			$table->string('position')->nullable();
            $table->timestamps();
			$table->softDeletes();
        });
    }

	/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() :void
    {
        Schema::dropIfExists('company_employees');
    }
}
