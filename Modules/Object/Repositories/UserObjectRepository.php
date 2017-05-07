<?php 
namespace Modules\Object\Repositories;

interface UserObjectRepository {

	function getAllUser_object_maping();

	function getUser_object_mapingById($id);

	function createUser_object_maping(array $attributes);

	function updateUser_object_maping($id, array $attributes);

	function deleteUser_object_maping($id);

}
