<?php 

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Category\Repositories\CategoryRepository;


class CategoryController extends Controller{
	private $categoryRepo;

	public function __construct(
		CategoryRepository $categoryRepo
	){
		$this->categoryRepo = $categoryRepo;
	}

	public function index(){
		
		$categories = $this->categoryRepo->getAllCategory();
		return view('category::index',compact('categories'));
	}

	public function create(){
		return view('category::category.create');
	}

	public function store(Request $request){
		$this->categoryRepo->createCategory($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/category');
	}

	public function show(){
		return view('category::show');
	}

	public function edit($id){
		$category = $this->categoryRepo->getCategoryById($id);
		return view('category::edit',compact('category'));
	}

	public function update($id ,Request $request){
		$this->categoryRepo->updateCategory($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/category');
	}

	public function delete($id){
		$this->categoryRepo->deleteCategory($id);
		Session::flash('success','Operation Success');
		return redirect('admin/category');
	}

}