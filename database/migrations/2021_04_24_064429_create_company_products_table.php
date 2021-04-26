<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() :void
    {
        Schema::create('company_products', function (Blueprint $table) {
            $table->id();
			$table->foreignId('company_id')
				->constrained()
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->string('slug');
			$table->string('name');
			$table->unsignedDouble('price', 12, 2)->default(0);
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
        Schema::dropIfExists('company_products');
    }
}
