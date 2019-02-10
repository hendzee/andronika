<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_data', function (Blueprint $table) {
            $table->string('worker_id',20)->unique();
            $table->string('project_id',20);
            $table->string('name_worker',45);
            $table->text('address_worker');
            $table->string('telphone_worker',15);
            $table->string('gender',10);
            $table->date('brithday_worker');
            $table->string(devision,20);
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
        Schema::dropIfExists('worker_data');
    }
}
