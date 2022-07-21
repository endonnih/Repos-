<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user');    
            $table->string('name');    
            $table->text('alamat');  
            $table->text('phone');    
            $table->string('pic'); 
            $table->string('flaq');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketing');
    }
}
