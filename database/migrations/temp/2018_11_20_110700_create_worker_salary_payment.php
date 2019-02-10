<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerSalaryPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_salary_payment', function (Blueprint $table) {
            $table->string('payment_id',20)->unique();
            $table->string('project_id',20);
            $table->string('worker_id',20);
            $table->string('take_put',20);
            $table->date('date_info');
            $table->decimal('nominal',15,2);
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
        Schema::dropIfExists('worker_salary_payment');
    }
}
