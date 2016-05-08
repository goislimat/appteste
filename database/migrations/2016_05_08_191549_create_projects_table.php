<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
			
			$table->integer('subject_id')->unsigned();
			$table->foreign('subject_id')->references('id')->on('subjects');
			$table->string('title');
			$table->float('grade')->nullable();
			$table->text('description')->nullable();
			$table->datetime('due_date');

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
		Schema::drop('projects');
	}

}
