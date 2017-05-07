<?php 
namespace Modules\Object\Repositories;

use Modules\Object\Entities\Object_attribute;

class ObjectAtrributeEloquent implements ObjectAtrributeRepository{
	private $object_attribute;

	public function __construct(Object_attribute $object_attribute){
		$this->object_attribute = $object_attribute;
	}
	public function getAllObject_attribute(){
		return $this->object_attribute->all();
	}

	public function getObject_attributeById($id){
		return $this->object_attribute->findorfail($id);
	}

	public function createObject_attribute(array $attributes){
		return $this->object_attribute->create($attributes);
	}

	public function updateObject_attribute($id,array $attributes){
		return $this->object_attribute->findorfail($id)->update($attributes);
	}

	public function deleteObject_attribute($id){
		return $this->object_attribute->findorfail($id)->delete();
	}

}