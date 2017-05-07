<?php 
namespace Modules\Object\Repositories;

interface ObjectAttributeRepository {

	function getAllObjectAttribute();

	function getAttributeByObjectId($object_id);

	function getObjectAttributeById($id);

	function createObjectAttribute(array $attributes);

	function updateObjectAttribute($id, array $attributes);

	function deleteObjectAttribute($id);

}
