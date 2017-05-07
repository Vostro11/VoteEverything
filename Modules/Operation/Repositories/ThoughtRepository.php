<?php 
namespace Modules\Operation\Repositories;

interface ThoughtRepository {

	function getAllThought();

	function getThoughtById($id);

	function createThought(array $attributes);

	function updateThought($id, array $attributes);

	function deleteThought($id);

}
