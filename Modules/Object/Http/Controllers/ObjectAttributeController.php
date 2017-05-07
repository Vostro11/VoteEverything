<?php 

namespace Modules\Object\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Object\Repositories\ObjectAtrributeRepository;


class ObjectAttributeController extends Controller{
	private $objectAtrributeRepo;

	public function __construct(
		ObjectAtrributeRepository $objectAtrributeRepo
	){
		$this->objectAtrributeRepo = $objectAtrributeRepo;
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