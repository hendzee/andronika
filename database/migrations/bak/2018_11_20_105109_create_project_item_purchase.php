<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectItemPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_item_purchase', function (Blueprint $table) {
            $table->string('transaction_id',20)->unique();
            $table->string('project_id',20);
            $table->string('name_item',20);
            $table->string('name_reseption',20);
            $table->date('transaction_Date');
            $table->tinyInteger('total_item');
            $table->decimal('harga_item',15,2);
            $table->decimal('total_purchase',15,2);
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
        Schema::dropIfExists('project_item_purchase');
    }
}
