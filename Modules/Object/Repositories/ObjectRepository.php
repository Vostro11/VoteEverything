<?php 
namespace Modules\Object\Repositories;

interface ObjectRepository {

	function getAllObject();

	function getObjectById($id);

	function createObject(array $attributes);

	function updateObject($id, array $attributes);

	function deleteObject($id);

}
