<?php 

namespace Modules\Object\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Object\Repositories\UserObjectRepository;


class UserObjectController extends Controller{
	private $userObjectRepo;

	public function __construct(
		UserObjectRepository $userObjectRepo
	){
		$this->userObjectRepo = $userObjectRepo;
	}

	public function index(){
		$userObjects = $this->userObjectRepo->getAllUserObject();
		return view('object::userObject.index',compact('userObjects'));
	}

	public function create(){
		return view('object::userObject.create');
	}

	public function store(Request $request){
		$this->userObjectRepo->createUserObject($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/object/userObject');
	}

	public function show(){
		return view('object::userObject.show');
	}

	public function edit($id){
		$userObject = $this->userObjectRepo->getUserObjectById($id);
		return view('object::userObject.edit',compact('userObject'));
	}

	public function update($id ,Request $request){
		$this->userObjectRepo->updateUserObject($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/object/userObject');
	}

	public function delete($id){
		$this->userObjectRepo->deleteUserObject($id);
		Session::flash('success','Operation Success');
		return redirect('admin/object/userObject');
	}

}