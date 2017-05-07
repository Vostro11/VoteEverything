<?php 
namespace Modules\Object\Repositories;

use Modules\Object\Entities\ObjectAttribute;

class ObjectAttributeEloquent implements ObjectAttributeRepository{
	private $objectAttribute;

	public function __construct(ObjectAttribute $objectAttribute){
		$this->objectAttribute = $objectAttribute;
	}
	public function getAllObjectAttribute(){
		return $this->objectAttribute->all();
	}

	public function getAttributeByObjectId($object_id){
		return $this->objectAttribute->where('object_id',$object_id);
	}

	public function getObjectAttributeById($id){
		return $this->objectAttribute->findorfail($id);
	}

	public function createObjectAttribute(array $attributes){
		return $this->objectAttribute->create($attributes);
	}

	public function updateObjectAttribute($id,array $attributes){
		return $this->objectAttribute->findorfail($id)->update($attributes);
	}

	public function deleteObjectAttribute($id){
		return $this->objectAttribute->findorfail($id)->delete();
	}

}