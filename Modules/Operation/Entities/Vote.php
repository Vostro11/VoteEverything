<?php 
namespace Modules\Operation\Entities;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model{
	protected $table='votes';
	protected $fillable=[
				'id',
				'object_id',
				'voter_id',
				'vote',
			];
	protected $hidden=[
	];
}