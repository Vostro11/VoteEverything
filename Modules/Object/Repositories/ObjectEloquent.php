<?php 
namespace Modules\Object\Repositories;

use Modules\Object\Entities\Object;

class ObjectEloquent implements ObjectRepository{
	private $object;

	public function __construct(Object $object){
		$this->object = $object;
	}
	public function getAllObject(){
		return $this->object->all();
	}

	public function getObjectById($id){
		return $this->object->findorfail($id);
	}

	public function createObject(array $attributes){
		return $this->object->create($attributes);
	}

	public function updateObject($id,array $attributes){
		return $this->object->findorfail($id)->update($attributes);
	}

	public function deleteObject($id){
		return $this->object->findorfail($id)->delete();
	}

}