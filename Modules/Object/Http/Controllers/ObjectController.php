<?php 

namespace Modules\Object\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Object\Repositories\ObjectRepository;
use Modules\Object\Repositories\ObjectAttributeRepository;
use Modules\Category\Repositories\CategoryRepository;
use Image;


class ObjectController extends Controller{
	private $objectRepo;
	private $catagoryRepo;
	private $objectAttributeRepo;

	public function __construct(
		ObjectRepository $objectRepo,
		ObjectAttributeRepository $objectAttributeRepo,
		CategoryRepository $catagoryRepo
	){
		$this->objectRepo = $objectRepo;
		$this->catagoryRepo = $catagoryRepo;
		$this->objectAttributeRepo = $objectAttributeRepo;
	}

	public function index(){

		$objects = $this->objectRepo->getAllObject();
		$categories = $this->catagoryRepo->getAllCategory();
		$catagoryRepo = $this->catagoryRepo;
		return view('object::index',compact('categories','objects','catagoryRepo','attributes'));
	}

	public function create_attribute($object_id){
		$object = $this->objectRepo->getObjectById($object_id);
		$attributes = $this->objectAttributeRepo->getAttributeByObjectId($object_id);
		return view('object::add-attribute',compact('object','attributes'));
	}

	public function store(Request $request){
		$data = $request->all();
        $filename = '';
        if($request->file('cover_image')){
            $extension=$data['cover_image']->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $destinationpath='uploads/ObjectImage/';


            $data['cover_image']->move($destinationpath,$filename);
            Image::make($destinationpath.$filename)
                ->resize( 300, 300 )
                ->save($destinationpath.$filename);
        }else{
            echo 'cover_image not found';
        }
        $data = $request->except('cover_image');
        $data['cover_image'] = $filename;
        // return $data;
		$this->objectRepo->createObject($data);
		Session::flash('success','Operation Success');
		return redirect('admin/object');
	}

	public function store_attribute(Request $request){
		$this->objectAttributeRepo->createObjectAttribute($request->all());
		Session::flash('success','Operation Success');
		return redirect()->back();
	}


	public function show(){
		return view('object::show');
	}

	public function edit($id){
		$object = $this->objectRepo->getObjectById($id);
		$categories = $this->catagoryRepo->getAllCategory();
		return view('object::edit',compact('object','categories'));
	}

	public function update($id ,Request $request){
		$data = $request->all();
		$oldimage = $this->objectRepo->getObjectById($id);
        $filename = '';
        if($request->file('cover_image')){

        	$destinationpath='uploads/ObjectImage/';
        	unlink($destinationpath.$oldimage['cover_image']);

            $extension=$data['cover_image']->getClientOriginalExtension();
            $filename = time() . '.' .$extension;
            $destinationpath='uploads/ObjectImage/';


            $data['cover_image']->move($destinationpath,$filename);
            Image::make($destinationpath.$filename)
                ->resize( 300, 300 )
                ->save($destinationpath.$filename);
        }else{
            
            $filename = $oldimage['cover_image'];
        }
        $data = $request->except('cover_image');
        $data['cover_image'] = $filename;
		$this->objectRepo->updateObject($id,$data);
		Session::flash('success','Operation Success');
		return redirect('admin/object');
	}

	public function delete($id){
		$this->objectRepo->deleteObject($id);
		Session::flash('success','Operation Success');
		return redirect('admin/object');
	}

}