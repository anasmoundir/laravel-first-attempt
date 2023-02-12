<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function GuzzleHttp\default_ca_bundle;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('servant_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('total_price')->default(0);
            $table->decimal('total_recieved')->default(0);
            $table->decimal('change')->default();
            $table->string('payment_type')->default('cash');
            $table->string('payment_status')->default('paid');
            $table->timestamps();
            $table->foreign('servant_id')->references('id')->on('servants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
