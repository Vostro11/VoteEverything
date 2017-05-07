<?php 
namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model{
	protected $table='categories';
	protected $fillable=[
				'id',
				'category_name',
			];
	protected $hidden=[
	];
}