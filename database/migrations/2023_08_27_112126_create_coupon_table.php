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
        Schema::create('coupon', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean("attivo");
            $table->unsignedBigInteger("ClienteID");
            $table->foreign('ClienteID')->references('id')->on('cliente')->onDelete('cascade');
            $table->unsignedBigInteger("OffertaID");
            $table->foreign('OffertaID')->references('id')->on('offerta')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon');
    }
};

