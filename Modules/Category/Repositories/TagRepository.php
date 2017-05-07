<?php 
namespace Modules\Category\Repositories;

interface TagRepository {

	function getAllTag();

	function getTagById($id);

	function createTag(array $attributes);

	function updateTag($id, array $attributes);

	function deleteTag($id);

}
