<?php 
namespace Modules\Operation\Repositories;

use Modules\Operation\Entities\Thought;

class ThoughtEloquent implements ThoughtRepository{
	private $thought;

	public function __construct(Thought $thought){
		$this->thought = $thought;
	}
	public function getAllThought(){
		return $this->thought->all();
	}

	public function getThoughtById($id){
		return $this->thought->findorfail($id);
	}

	public function createThought(array $attributes){
		return $this->thought->create($attributes);
	}

	public function updateThought($id,array $attributes){
		return $this->thought->findorfail($id)->update($attributes);
	}

	public function deleteThought($id){
		return $this->thought->findorfail($id)->delete();
	}

}