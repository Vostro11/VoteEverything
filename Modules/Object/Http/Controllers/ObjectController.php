<?php 

namespace Modules\Object\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Object\Repositories\ObjectRepository;


class ObjectController extends Controller{
	private $objectRepo;

	public function __construct(
		ObjectRepository $objectRepo
	){
		$this->objectRepo = $objectRepo;
	}

	public function index(){
		$objects = $this->objectRepo->getAllObject();
		return view('object::object.index',compact('objects'));
	}

	public function create(){
		return view('object::object.create');
	}

	public function store(Request $request){
		$this->objectRepo->createObject($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/object/object');
	}

	public function show(){
		return view('object::object.show');
	}

	public function edit($id){
		$object = $this->objectRepo->getObjectById($id);
		return view('object::object.edit',compact('object'));
	}

	public function update($id ,Request $request){
		$this->objectRepo->updateObject($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/object/object');
	}

	public function delete($id){
		$this->objectRepo->deleteObject($id);
		Session::flash('success','Operation Success');
		return redirect('admin/object/object');
	}

}