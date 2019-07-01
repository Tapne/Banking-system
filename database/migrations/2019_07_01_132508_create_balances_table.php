<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabela zawierająca stan konta bankowego
        Schema::create('balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_acc');
            $table->foreign('id_acc', 'id_acc_to_id_on_users')->references('id')->on('users');
            $table->double('money', '8', '2')->default(0);
            $table->bigInteger('num_acc_bank')->unique();
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
        Schema::dropIfExists('balances');
    }
}
