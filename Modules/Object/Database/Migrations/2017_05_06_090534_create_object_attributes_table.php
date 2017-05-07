<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectAttributesTable extends Migration {
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::create('object_attributes', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('object_id')->unsigned();
			$table->foreign('object_id')->references('id')->on('objects')->onDelete('cascade');
			$table->string('attribute_name');
			$table->string('attribute');
			$table->timestamps();
		});
	}
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::drop('object_attributes');
	}
}