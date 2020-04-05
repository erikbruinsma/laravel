<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {
         Schema::create('tasks', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->nullable();
             $table->string('title')->nullable();
             $table->tinyInteger('completed')->nullable();
             $table->timestamps();
         });
     }

     public function down() {
         Schema::dropIfExists('tasks');
     }
}
