<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSemestresTable extends Migration {

	public function up()
	{
		Schema::create('semestres', function(Blueprint $table) {
			$table->id();
			$table->string('semestre_name');
			$table->timestamps();
			
		});
	} 

	public function down()
	{
		Schema::drop('semestres');
	}
} 