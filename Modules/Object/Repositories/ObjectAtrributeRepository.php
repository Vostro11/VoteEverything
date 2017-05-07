<?php 
namespace Modules\Object\Repositories;

interface ObjectAtrributeRepository {

	function getAllObject_attribute();

	function getObject_attributeById($id);

	function createObject_attribute(array $attributes);

	function updateObject_attribute($id, array $attributes);

	function deleteObject_attribute($id);

}
