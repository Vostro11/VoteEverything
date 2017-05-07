<?php 
namespace Modules\Category\Repositories;

use Modules\Category\Entities\Tag;

class TagEloquent implements TagRepository{
	private $tag;

	public function __construct(Tag $tag){
		$this->tag = $tag;
	}
	public function getAllTag(){
		return $this->tag->all();
	}

	public function getTagById($id){
		return $this->tag->findorfail($id);
	}

	public function createTag(array $attributes){
		return $this->tag->create($attributes);
	}

	public function updateTag($id,array $attributes){
		return $this->tag->findorfail($id)->update($attributes);
	}

	public function deleteTag($id){
		return $this->tag->findorfail($id)->delete();
	}

}