<?php 
namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
	protected $table='tags';
	protected $fillable=[
				'id',
				'object_id',
				'category_id',
				'tag_name',
			];
	protected $hidden=[
	];
}