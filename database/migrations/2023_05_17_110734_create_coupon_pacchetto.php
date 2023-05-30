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
        Schema::create('coupon_pacchetto', function (Blueprint $table) {
            $table->string('Utente', 30);
            $table->foreign('Utente')->references('Username')->on('utente');
            $table->bigInteger('Pacchetto')->unsigned();
            $table->foreign('Pacchetto')->references('IDPacchetto')->on('pacchetto');
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
        Schema::dropIfExists('coupon_pacchetto');
    }
};
