<?php 

namespace Modules\Operation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Session;
use Modules\Operation\Repositories\VoteRepository;


class VoteController extends Controller{
	private $voteRepo;

	public function __construct(
		VoteRepository $voteRepo
	){
		$this->voteRepo = $voteRepo;
	}

	public function index(){
		$votes = $this->voteRepo->getAllVote();
		return view('operation::vote.index',compact('votes'));
	}

	public function create(){
		return view('operation::vote.create');
	}

	public function store(Request $request){
		$this->voteRepo->createVote($request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/operation/vote');
	}

	public function show(){
		return view('operation::vote.show');
	}

	public function edit($id){
		$vote = $this->voteRepo->getVoteById($id);
		return view('operation::vote.edit',compact('vote'));
	}

	public function update($id ,Request $request){
		$this->voteRepo->updateVote($id,$request->all());
		Session::flash('success','Operation Success');
		return redirect('admin/operation/vote');
	}

	public function delete($id){
		$this->voteRepo->deleteVote($id);
		Session::flash('success','Operation Success');
		return redirect('admin/operation/vote');
	}

}