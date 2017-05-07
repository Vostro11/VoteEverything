<?php 

namespace Modules\Object\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Object\Repositories\ObjectAttributeRepository;


class ObjectAttributeController extends Controller{
	private $objectAttributeRepo;

	public function __construct(
		ObjectAttributeRepository $objectAttributeRepo
	){
		$this->objectAttributeRepo = $objectAttributeRepo;
	}

	public function index(){
		$objectAttributes = $this->objectAttributeRepo->getAllObjectAttribute();
		return view('object::objectAttribute.index',compact('objectAttributes'));
	}

	public function create(){
		return view('object::objectAttribute.create');
	}

	public function store(Request $request){
		$this->objectAttributeRepo->createObjectAttribute($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/object/objectAttribute');
	}

	public function show(){
		return view('object::objectAttribute.show');
	}

	public function edit($id){
		$objectAttribute = $this->objectAttributeRepo->getObjectAttributeById($id);
		return view('object::objectAttribute.edit',compact('objectAttribute'));
	}

	public function update($id ,Request $request){
		$this->objectAttributeRepo->updateObjectAttribute($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/object/objectAttribute');
	}

	public function delete($id){
		$this->objectAttributeRepo->deleteObjectAttribute($id);
		Session::flash('success','Operation Success');
		return redirect('admin/object/objectAttribute');
	}

}