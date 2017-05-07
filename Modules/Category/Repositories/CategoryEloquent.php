<?php 
namespace Modules\Category\Repositories;

use Modules\Category\Entities\Categorie;

class CategoryEloquent implements CategoryRepository{
	private $categorie;

	public function __construct(Categorie $categorie){
		$this->categorie = $categorie;
	}
	public function getAllCategory(){
		return $this->categorie->all();
	}

	public function getCategoryById($id){
		return $this->categorie->findorfail($id);
	}

	public function createCategory(array $attributes){
		return $this->categorie->create($attributes);
	}

	public function updateCategory($id,array $attributes){
		return $this->categorie->findorfail($id)->update($attributes);
	}

	public function deleteCategory($id){
		return $this->categorie->findorfail($id)->delete();
	}

}