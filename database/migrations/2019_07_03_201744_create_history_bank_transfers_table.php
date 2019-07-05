<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryBankTransfersTable extends Migration
{
    public function up()
    {
        // Table zawierająca historie transakcji
        Schema::create('history_bank_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_acc');
            $table->foreign('id_acc')->references('id')->on('users');
            $table->double('amount', 2);
            $table->bigInteger('num_acc_to');
            $table->foreign('num_acc_to')->references('num_acc_bank')->on('balances');
            $table->string('description', 200);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('history_bank_transfers');
    }
}
