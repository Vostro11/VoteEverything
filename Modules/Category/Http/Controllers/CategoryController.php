<?php 

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Category\Repositories\TagRepository;
use Modules\Object\Repositories\ObjectRepository;



class CategoryController extends Controller{
	private $categoryRepo;

	public function __construct(
		CategoryRepository $categoryRepo,
		TagRepository $tagRepo,
		ObjectRepository $objectRepo
	){
		$this->categoryRepo = $categoryRepo;
		$this->objectRepo = $objectRepo;
		$this->tagRepo = $tagRepo;
	}

	public function index(){
		
		$categories = $this->categoryRepo->getAllCategory();
		$objects = $this->objectRepo->getAllObject();
		$tags = $this->tagRepo->getAllTag();
		return view('category::index',compact('categories','objects','tags'));
	}

	public function create(){
		return view('category::category.create');
	}

	public function store(Request $request){
		$this->categoryRepo->createCategory($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/category');
	}

	public function store_tag(Request $request){
		$this->tagRepo->createTag($request->all());
		Session::flash('success','Operation Success');
		return redirect()->back();
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