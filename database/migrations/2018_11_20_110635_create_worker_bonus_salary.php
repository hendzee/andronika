<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerBonusSalary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_bonus_salary', function (Blueprint $table) {
            $table->string('project_id',20)->unique();
            $table->string('worker_id',20)->unique();
            $table->date('date_payment');
            $table->text('desciption');
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
        Schema::dropIfExists('worker_bonus_salary');
    }
}
