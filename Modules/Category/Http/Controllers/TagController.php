<?php 

namespace Modules\Category\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Category\Repositories\TagRepository;


class TagController extends Controller{
	private $tagRepo;

	public function __construct(
		TagRepository $tagRepo
	){
		$this->tagRepo = $tagRepo;
	}

	public function index(){
		$tags = $this->tagRepo->getAllTag();
		return view('category::index',compact('tags'));
	}

	public function create(){
		return view('category::create');
	}

	public function store(Request $request){
		$this->tagRepo->createTag($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/tag');
	}

	public function show(){
		return view('category::show');
	}

	public function edit($id){
		$tag = $this->tagRepo->getTagById($id);
		return view('category::edit',compact('tag'));
	}

	public function update($id ,Request $request){
		$this->tagRepo->updateTag($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/tag');
	}

	public function delete($id){
		$this->tagRepo->deleteTag($id);
		Session::flash('success','Operation Success');
		return redirect('admin/category/');
	}

}