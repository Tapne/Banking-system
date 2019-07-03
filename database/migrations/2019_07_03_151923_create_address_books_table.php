<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_acc');
            $table->foreign('id_acc', 'id_acc_in_abooks_to_id_on_users')->references('id')->on('users');
            $table->string('own_name', '30');
            $table->string('name');
            $table->string('surname');
            $table->bigInteger('num_acc_bank_another');
            $table->foreign('num_acc_bank_another')->references('num_acc_bank')->on('balances');
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
        Schema::dropIfExists('address_books');
    }
}
