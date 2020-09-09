<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')
                ->references('id')->on('payment_method')
                ->onDelete('cascade');
            $table->string('account_no');
            $table->string('name')->nullable();
            $table->string('branch')->nullable();
            $table->string('routing_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->integer('is_agent')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
