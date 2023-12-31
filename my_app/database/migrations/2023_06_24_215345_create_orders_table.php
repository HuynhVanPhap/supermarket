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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100);
            $table->string('name', 50);
            $table->string('email', 30);
            $table->string('phone', 15);
            $table->string('address', 100);
            $table->tinyInteger('status')->default(0);
            $table->dateTime('date_receive')->nullable();
            $table->dateTime('date_payment')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->unique(['code', 'email', 'phone']);
            $table->index('user_id');
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};
