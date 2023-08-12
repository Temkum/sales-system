<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->bigInteger('price');
            $table->text('items');
            $table->integer('quantity');
            $table->bigInteger('advance');
            $table->date('due_date');
            $table->integer('balance');
            $table->enum('status', ['pending', 'processing', 'completed', 'due', 'cancelled'])->default('pending');
            $table->text('measurements');
            $table->text('description');
            $table->date('date_delivered')->nullable();
            $table->date('date_cancelled')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
}
