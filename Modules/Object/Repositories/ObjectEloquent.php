<?php 
namespace Modules\Object\Repositories;

use Modules\Object\Entities\Object;
use Image;

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
		// dd($attributes);
		return $this->object->create($attributes);
	}

	public function updateObject($id,array $attributes){
		
		return $this->object->findorfail($id)->update($attributes);
	}

	public function deleteObject($id){

		$oldimage = Object::findOrFail($id);
        $destinationpath='uploads/ObjectImage/';
        if(unlink($destinationpath.$oldimage['cover_image']))
        {
            echo 'old image is deleted';
        }else{
            echo 'unable to delete old image';
        }
		return $this->object->findorfail($id)->delete();
	}

}