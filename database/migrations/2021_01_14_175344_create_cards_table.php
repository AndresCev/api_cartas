<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    
    public function up()
    { 
      Schema::dropIfExists('cards');
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('coleccion');
            $table->timestamps();
        });
        
        Schema::table('ventas',function(Blueprint $table){
            $table->foreignId('cards_id')->nullable()->constrained();
        });
    }

    
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table){
            $table->dropForeign(['cards_id']);
            $table->dropColumn('cards_id');
        });
        Schema::dropIfExists('cards');
    }
}

