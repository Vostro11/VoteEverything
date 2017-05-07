<?php 

namespace Modules\Operation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Operation\Repositories\ThoughtRepository;


class ThoughtController extends Controller{
	private $thoughtRepo;

	public function __construct(
		ThoughtRepository $thoughtRepo
	){
		$this->thoughtRepo = $thoughtRepo;
	}

	public function index(){
		$thoughts = $this->thoughtRepo->getAllThought();
		return view('operation::thought.index',compact('thoughts'));
	}

	public function create(){
		return view('operation::thought.create');
	}

	public function store(Request $request){
		$this->thoughtRepo->createThought($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/operation/thought');
	}

	public function show(){
		return view('operation::thought.show');
	}

	public function edit($id){
		$thought = $this->thoughtRepo->getThoughtById($id);
		return view('operation::thought.edit',compact('thought'));
	}

	public function update($id ,Request $request){
		$this->thoughtRepo->updateThought($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/operation/thought');
	}

	public function delete($id){
		$this->thoughtRepo->deleteThought($id);
		Session::flash('success','Operation Success');
		return redirect('admin/operation/thought');
	}

}