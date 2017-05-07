<?php 
namespace Modules\Object\Entities;

use Illuminate\Database\Eloquent\Model;

class Object extends Model{
	protected $table='objects';
	protected $fillable=[
				'id',
				'object_name',
				'cover_image',
				'category_id',
			];
	protected $hidden=[
	];
}