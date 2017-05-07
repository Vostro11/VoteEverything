<?php 
namespace Modules\Object\Entities;

use Illuminate\Database\Eloquent\Model;

class UserObject extends Model{
	protected $table='user_object_maping';
	protected $fillable=[
				'id',
				'object_id',
				'user_id',
			];
	protected $hidden=[
	];
}