<?php 
namespace Modules\Operation\Repositories;

use Modules\Operation\Entities\Vote;

class VoteEloquent implements VoteRepository{
	private $vote;

	public function __construct(Vote $vote){
		$this->vote = $vote;
	}
	public function getAllVote(){
		return $this->vote->all();
	}

	public function getVoteById($id){
		return $this->vote->findorfail($id);
	}

	public function createVote(array $attributes){
		return $this->vote->create($attributes);
	}

	public function updateVote($id,array $attributes){
		return $this->vote->findorfail($id)->update($attributes);
	}

	public function deleteVote($id){
		return $this->vote->findorfail($id)->delete();
	}

}