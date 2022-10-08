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
        Schema::create('lender_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans');
            $table->foreignId('lender_id')->constrained('users');
            $table->float('offered_interest_rate');
            $table->integer('status')->comment('0 = pending; 1 = active; 2 = rejected; 3 = paid')->default(0);
            $table->integer('offered_amount');
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
