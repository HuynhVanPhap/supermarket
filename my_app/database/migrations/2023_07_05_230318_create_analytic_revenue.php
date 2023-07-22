<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytic_revenue', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned();
            $table->smallInteger('date')->unsigned();
            $table->smallInteger('month')->unsigned();
            $table->smallInteger('year')->unsigned();
            $table->decimal('revenue', 15, 0)->unsigned();
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
        Schema::dropIfExists('analytic_revenue');
    }
};
