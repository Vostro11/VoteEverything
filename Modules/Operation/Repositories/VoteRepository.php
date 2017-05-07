<?php 
namespace Modules\Operation\Repositories;

interface VoteRepository {

	function getAllVote();

	function getVoteById($id);

	function createVote(array $attributes);

	function updateVote($id, array $attributes);

	function deleteVote($id);

}
