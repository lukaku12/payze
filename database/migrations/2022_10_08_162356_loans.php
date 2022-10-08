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
            $table->foreignId('lender_id')->nullable()->constrained('users');
            $table->tinyInteger('status')->comment('0 = pending; 1 = active; 2 = rejected; 3 = paid')->default(0);
            $table->float('demanded_interest_rate');
            $table->bigInteger('amount');
            $table->integer('currency');
            $table->timestamp('payment_due_date');
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
