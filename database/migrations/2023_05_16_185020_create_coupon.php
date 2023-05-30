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
            $table->string('Utente', 50);
            $table->foreign('Utente')->references('Username')->on('utente');
            $table->bigInteger('IDOfferta')->unsigned();
            $table->foreign('IDOfferta')->references('IDOfferta')->on('offerta');
            $table->string('IDCoupon', 50);
            $table->text('QRCode')->nullable();
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
