<?php 
namespace Modules\Object\Repositories;

use Modules\Object\Entities\User_object_maping;

class UserObjectEloquent implements UserObjectRepository{
	private $user_object_maping;

	public function __construct(User_object_maping $user_object_maping){
		$this->user_object_maping = $user_object_maping;
	}
	public function getAllUser_object_maping(){
		return $this->user_object_maping->all();
	}

	public function getUser_object_mapingById($id){
		return $this->user_object_maping->findorfail($id);
	}

	public function createUser_object_maping(array $attributes){
		return $this->user_object_maping->create($attributes);
	}

	public function updateUser_object_maping($id,array $attributes){
		return $this->user_object_maping->findorfail($id)->update($attributes);
	}

	public function deleteUser_object_maping($id){
		return $this->user_object_maping->findorfail($id)->delete();
	}

}