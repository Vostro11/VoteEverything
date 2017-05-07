<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration {
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::create('votes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('object_id')->unsigned();
			$table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
			$table->integer('voter_id')->unsigned();
			$table->foreign('voter_id')->references('id')->on('users')->onDelete('cascade');
			$table->enum('vote',['positive','negative']);
			$table->timestamps();
		});
	}
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::drop('votes');
	}
}