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
            $table->string('inv');
            $table->string('periode')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('kliens');
            $table->bigInteger('klien_id')->unsigned();
            $table->foreign('klien_id')->references('id')->on('kliens');
            $table->string('tipe')->default('Sablon');
            $table->text('judul')->nullable();
            $table->text('detail')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('ongkir')->nullable();
            $table->integer('total')->nullable();
            $table->string('stok')->default('READY');
            $table->string('status')->default('KONFRIM');
            $table->string('pembayaran')->default('LUNAS');
            $table->date('pengambilan')->nullable();
            $table->string('pengiriman')->default('Diambil');
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
