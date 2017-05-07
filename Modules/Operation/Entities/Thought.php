<?php 
namespace Modules\Operation\Entities;

use Illuminate\Database\Eloquent\Model;

class Thought extends Model{
	protected $table='thoughts';
	protected $fillable=[
				'id',
				'object_id',
				'sender_id',
				'thought',
				'identity',
			];
	protected $hidden=[
	];
}