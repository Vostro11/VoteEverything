<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThoughtsTable extends Migration {
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::create('thoughts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('object_id')->unsigned();
			$table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
			$table->integer('sender_id')->unsigned();
			$table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('thought');
			$table->enum('identity',['Visible','Hidden']);
			$table->timestamps();
		});
	}
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::drop('thoughts');
	}
}