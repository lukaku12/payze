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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receiver_id')->constrained('users');
            $table->foreignId('lender_id')->constrained('users');
            $table->tinyInteger('status')->comment('0 = pending; 1 = active; 2 = rejected; 3 = paid');
            $table->float('demanded_interest_rate');
            $table->bigInteger('amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
