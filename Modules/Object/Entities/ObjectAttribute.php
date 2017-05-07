<?php 
namespace Modules\Object\Entities;

use Illuminate\Database\Eloquent\Model;

class ObjectAttribute extends Model{
	protected $table='object_attributes';
	protected $fillable=[
				'id',
				'object_id',
				'attribute_name',
				'attribute',
			];
	protected $hidden=[
	];
}